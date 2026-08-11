#!/usr/bin/env python3
"""
Generates domains/*.md, API_INDEX.md, and ENDPOINTS.md from openapi.yaml.

openapi.yaml is the only hand-maintained source of truth in this tree.
Everything this script writes is a derived view — re-run it after any
openapi.yaml change instead of hand-editing the generated files.

Usage: python3 scripts/generate_docs.py
(run from docs/vf-api/, or anywhere — paths are resolved relative to this file)
"""
import json
import re
import yaml
from pathlib import Path
from collections import defaultdict

ROOT = Path(__file__).resolve().parent.parent  # docs/vf-api/
SPEC_PATH = ROOT / "openapi.yaml"
DOMAINS_DIR = ROOT / "domains"
MAX_EXAMPLE_LINES = 30

METHOD_ORDER = ["get", "post", "put", "patch", "delete"]

TAG_SLUGS = {
    "General": "general",
    "Hypervisors": "hypervisors",
    "Hypervisor Groups": "hypervisor-groups",
    "Servers": "servers",
    "Servers/Network": "servers-network",
    "Servers/Network/Firewall": "servers-network-firewall",
    "Servers/Network/Traffic": "servers-network-traffic",
    "Servers/Power": "servers-power",
    "Servers/Backup Manager": "servers-backup-manager",
    "IP Blocks": "ip-blocks",
    "Backups": "backups",
    "DNS": "dns",
    "Media": "media",
    "Packages": "packages",
    "Queue & Tasks": "queue-tasks",
    "SSH Keys": "ssh-keys",
    "Users": "users",
    "Users/External Rel ID & Rel Str": "users-external-rel",
    "Self Service": "self-service",
    "Self Service/External Relational ID": "self-service-external-rel",
}


def load_spec():
    with open(SPEC_PATH) as f:
        return yaml.safe_load(f)


def collect_operations(spec):
    """Flatten spec['paths'] into a list of operation dicts, spec order preserved."""
    ops = []
    for path, methods in spec["paths"].items():
        for method in METHOD_ORDER:
            if method not in methods:
                continue
            op = methods[method]
            tag = (op.get("tags") or ["(untagged)"])[0]
            ops.append({
                "path": path,
                "method": method.upper(),
                "tag": tag,
                "op": op,
            })
    return ops


def path_params_from_op(path, op):
    declared = {p["name"]: p for p in op.get("parameters", []) if p.get("in") == "path"}
    names = re.findall(r"\{([^}]+)\}", path)
    out = []
    for n in names:
        p = declared.get(n, {})
        out.append({
            "name": n,
            "type": (p.get("schema") or {}).get("type", "string"),
            "description": p.get("description", "").strip() or "(no description in spec)",
        })
    return out


def query_params_from_op(op):
    return [p for p in op.get("parameters", []) if p.get("in") == "query"]


def request_body_fields(op):
    rb = op.get("requestBody")
    if not rb:
        return None, None
    schema = ((rb.get("content") or {}).get("application/json") or {}).get("schema", {})
    props = schema.get("properties", {})
    required = set(schema.get("required", []))
    example = ((rb.get("content") or {}).get("application/json") or {}).get("example")
    fields = []
    for name, pschema in props.items():
        desc = pschema.get("description", "").strip() or "(no description in spec)"
        if pschema.get("enum"):
            values = ", ".join(f"`{v}`" for v in pschema["enum"])
            desc += f" Allowed values: {values}."
        fields.append({
            "name": name,
            "type": pschema.get("type", "any"),
            "required": name in required,
            "description": desc,
        })
    return fields, example


def render_example(example, max_lines=MAX_EXAMPLE_LINES):
    if example is None:
        return None
    text = json.dumps(example, indent=2, default=str)
    lines = text.splitlines()
    if len(lines) <= max_lines:
        return text, False
    truncated = "\n".join(lines[:max_lines])
    return truncated, True


def responses_summary(op):
    out = []
    for code, resp in (op.get("responses") or {}).items():
        if "$ref" in resp:
            ref = resp["$ref"].split("/")[-1]
            out.append((code, f"See shared response `{ref}` in `openapi.yaml#/components/responses/{ref}`", None))
            continue
        desc = (resp.get("description") or "").strip()
        content = (resp.get("content") or {}).get("application/json", {})
        example = content.get("example")
        out.append((code, desc, example))
    return out


def strip_last_segment(path):
    """Parent path template one level up, or None for depth-1 paths (no meaningful parent)."""
    parts = [p for p in path.strip("/").split("/") if p]
    if len(parts) <= 1:
        return None
    return "/" + "/".join(parts[:-1])


def related_endpoints(all_ops, current):
    """
    Structural relations only, derived from the path template — no guessing:
      - same path, different method (e.g. GET/DELETE /servers/{serverId})
      - siblings: share the same parent path template
      - parent: the resource one level up
      - children: resources one level down
    """
    cur_path = current["path"]
    cur_parent = strip_last_segment(cur_path)
    related = []
    seen_ids = set()
    for o in all_ops:
        if o is current:
            continue
        o_path = o["path"]
        o_parent = strip_last_segment(o_path)
        is_related = (
            (o_path == cur_path and o["method"] != current["method"]) or
            (cur_parent is not None and o_parent == cur_parent) or
            (o_path == cur_parent) or
            (o_parent == cur_path)
        )
        if is_related:
            key = id(o)
            if key not in seen_ids:
                seen_ids.add(key)
                related.append(o)
    return related


def domain_file_link(tag):
    return f"domains/{TAG_SLUGS.get(tag, tag.lower().replace(' ', '-').replace('/', '-'))}.md"


def render_endpoint_md(op_entry, all_ops):
    path, method, op = op_entry["path"], op_entry["method"], op_entry["op"]
    summary = op.get("summary", "").strip() or f"{method} {path}"
    description = op.get("description", "").strip() or summary

    lines = [f"### {summary}", "", f"`{method} {path}`", ""]

    lines += ["**Purpose:**", description, ""]

    lines += ["**Authentication:**"]
    if op.get("security") == []:
        lines += ["None (this operation overrides the global security requirement)."]
    else:
        lines += ["Bearer token required — `Authorization: Bearer <VirtFusion API token>` "
                   "(global requirement, see `openapi.yaml#/security`)."]
    lines.append("")

    pparams = path_params_from_op(path, op)
    lines.append("**Path Parameters:**")
    if pparams:
        lines.append("| Name | Type | Description |")
        lines.append("|---|---|---|")
        for p in pparams:
            lines.append(f"| `{p['name']}` | {p['type']} | {p['description']} |")
    else:
        lines.append("None.")
    lines.append("")

    qparams = query_params_from_op(op)
    lines.append("**Query Parameters:**")
    if qparams:
        lines.append("| Name | Type | Required | Description |")
        lines.append("|---|---|---|---|")
        for p in qparams:
            schema = p.get("schema") or {}
            t = schema.get("type", "string")
            req = "Yes" if p.get("required") else "No"
            desc = (p.get("description") or "").strip() or "(no description in spec)"
            if schema.get("enum"):
                values = ", ".join(f"`{v}`" for v in schema["enum"])
                desc += f" Allowed values: {values}."
            lines.append(f"| `{p['name']}` | {t} | {req} | {desc} |")
    else:
        lines.append("None.")
    lines.append("")

    fields, req_example = request_body_fields(op)
    lines.append("**Request Body:**")
    if fields:
        lines.append("| Field | Type | Required | Description |")
        lines.append("|---|---|---|---|")
        for f in fields:
            req = "Yes" if f["required"] else "No"
            lines.append(f"| `{f['name']}` | {f['type']} | {req} | {f['description']} |")
    else:
        lines.append("None — this operation takes no request body.")
    lines.append("")

    if req_example is not None:
        rendered = render_example(req_example)
        if rendered:
            text, was_truncated = rendered
            lines.append("**Example Request Body:**")
            lines.append("```json")
            lines.append(text)
            lines.append("```")
            if was_truncated:
                lines.append(f"_(truncated — full example in `openapi.yaml` under `paths.{path}.{method.lower()}.requestBody`)_")
            lines.append("")

    lines.append("**Response:**")
    resp_summaries = responses_summary(op)
    if resp_summaries:
        lines.append("| Status | Meaning |")
        lines.append("|---|---|")
        for code, desc, _ in resp_summaries:
            desc_clean = desc if desc else "(no description in spec)"
            lines.append(f"| `{code}` | {desc_clean} |")
    lines.append("")

    example_block_written = False
    for code, desc, example in resp_summaries:
        if example is None:
            continue
        rendered = render_example(example)
        if not rendered:
            continue
        text, was_truncated = rendered
        lines.append(f"**Example Response (`{code}`):**")
        lines.append("```json")
        lines.append(text)
        lines.append("```")
        if was_truncated:
            lines.append(f"_(truncated — full example in `openapi.yaml` under `paths.{path}.{method.lower()}.responses.{code}`)_")
        lines.append("")
        example_block_written = True
    if not example_block_written:
        lines.append("_No example response documented in `openapi.yaml` for this operation._")
        lines.append("")

    lines.append("**Important Notes:**")
    notes = []
    for p in op.get("parameters", []):
        if p.get("in") == "query" and p.get("description"):
            pass  # already covered above
    if op.get("deprecated"):
        notes.append("Marked `deprecated: true` in the spec.")
    if not notes:
        notes.append("None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.")
    lines += notes
    lines.append("")

    rel = related_endpoints(all_ops, op_entry)
    lines.append("**Related Endpoints:**")
    if rel:
        for r in rel:
            rsum = r["op"].get("summary", "").strip() or f"{r['method']} {r['path']}"
            lines.append(f"- `{r['method']} {r['path']}` — {rsum} ({domain_file_link(r['tag'])})")
    else:
        lines.append("None sharing this path prefix in the spec.")
    lines.append("")
    lines.append("---")
    lines.append("")

    return "\n".join(lines)


def write_domain_files(ops_by_tag, all_ops):
    DOMAINS_DIR.mkdir(exist_ok=True)
    for tag, ops in ops_by_tag.items():
        slug = TAG_SLUGS.get(tag, tag.lower().replace(" ", "-").replace("/", "-"))
        out_path = DOMAINS_DIR / f"{slug}.md"
        parts = [
            f"<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->",
            f"<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->",
            "",
            f"# {tag}",
            "",
            f"{len(ops)} operation(s). Canonical spec: `openapi.yaml` (tag: `{tag}`).",
            "",
            "[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)",
            "",
        ]
        for op_entry in ops:
            parts.append(render_endpoint_md(op_entry, all_ops))
        out_path.write_text("\n".join(parts))
        print(f"wrote {out_path.relative_to(ROOT)} ({len(ops)} ops)")


def write_api_index(ops_by_tag):
    lines = [
        "<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->",
        "<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->",
        "",
        "# API_INDEX — VirtFusion Global API",
        "",
        "Master navigation table, generated from `openapi.yaml`. One row per operation.",
        "For a compact keyword lookup, use `ENDPOINTS.md` instead — this file is the full index.",
        "",
        "| Domain | Method | Endpoint | Purpose | Auth | Path Params | Doc |",
        "|---|---|---|---|---|---|---|",
    ]
    for tag, ops in ops_by_tag.items():
        for entry in ops:
            path, method, op = entry["path"], entry["method"], entry["op"]
            summary = (op.get("summary") or "").strip() or f"{method} {path}"
            auth = "None" if op.get("security") == [] else "Bearer"
            pparams = ", ".join(f"`{p}`" for p in re.findall(r"\{([^}]+)\}", path)) or "—"
            doc = domain_file_link(tag)
            lines.append(f"| {tag} | {method} | `{path}` | {summary} | {auth} | {pparams} | [{doc}]({doc}) |")
    lines.append("")
    (ROOT / "API_INDEX.md").write_text("\n".join(lines))
    print(f"wrote API_INDEX.md ({sum(len(v) for v in ops_by_tag.values())} rows)")


KEYWORD_RULES = [
    # (keyword, matcher(path, method, summary) -> bool)
    ("create server", lambda p, m, s: p == "/servers" and m == "POST"),
    ("deploy server", lambda p, m, s: p == "/servers" and m == "POST"),
    ("delete server", lambda p, m, s: p == "/servers/{serverId}" and m == "DELETE"),
    ("terminate server", lambda p, m, s: p == "/servers/{serverId}" and m == "DELETE"),
    ("suspend server", lambda p, m, s: p == "/servers/{serverId}/suspend"),
    ("unsuspend server", lambda p, m, s: p == "/servers/{serverId}/unsuspend"),
    ("rebuild server", lambda p, m, s: p == "/servers/{serverId}/build"),
    ("reinstall", lambda p, m, s: p == "/servers/{serverId}/build"),
    ("rename server", lambda p, m, s: p == "/servers/{serverId}/modify/name"),
    ("boot", lambda p, m, s: "power/boot" in p),
    ("power on", lambda p, m, s: "power/boot" in p),
    ("power off", lambda p, m, s: "power/poweroff" in p),
    ("poweroff", lambda p, m, s: "power/poweroff" in p),
    ("reboot", lambda p, m, s: "power/restart" in p),
    ("restart", lambda p, m, s: "power/restart" in p),
    ("shutdown", lambda p, m, s: "power/shutdown" in p),
    ("graceful shutdown", lambda p, m, s: "power/shutdown" in p),
    ("assign ip", lambda p, m, s: p == "/servers/{serverId}/ipv4" and m == "POST"),
    ("remove ip", lambda p, m, s: p == "/servers/{serverId}/ipv4" and m == "DELETE"),
    ("ip quantity", lambda p, m, s: p == "/servers/{serverId}/ipv4Qty"),
    ("firewall", lambda p, m, s: "firewall" in p),
    ("network whitelist", lambda p, m, s: "networkWhitelist" in p),
    ("traffic", lambda p, m, s: p == "/servers/{serverId}/traffic" and m == "GET"),
    ("traffic block", lambda p, m, s: "traffic/blocks" in p),
    ("backup", lambda p, m, s: p == "/backups/server/{serverId}"),
    ("backup plan", lambda p, m, s: "backups/plan" in p),
    ("backup manager", lambda p, m, s: "backupManager" in p),
    # No standalone "restore" endpoint is documented — restore is exposed only as the
    # `view_restore` value of the backup-manager `type` field (see backupManager/access).
    ("restore", lambda p, m, s: "backupManager" in p),
    ("change package", lambda p, m, s: p == "/servers/{serverId}/package/{packageId}"),
    ("resize", lambda p, m, s: "/modify/" in p),
    ("modify resource", lambda p, m, s: "/modify/" in p),
    ("change owner", lambda p, m, s: "owner" in p),
    ("vnc", lambda p, m, s: "vnc" in p),
    ("console", lambda p, m, s: "vnc" in p),
    ("reset password", lambda p, m, s: "resetPassword" in p),
    ("user", lambda p, m, s: p.startswith("/users")),
    ("create user", lambda p, m, s: p == "/users" and m == "POST"),
    ("package", lambda p, m, s: p.startswith("/packages")),
    ("hypervisor", lambda p, m, s: p.startswith("/compute/hypervisors") and "groups" not in p),
    ("hypervisor group", lambda p, m, s: "/compute/hypervisors/groups" in p),
    ("ssh key", lambda p, m, s: p.startswith("/ssh_keys")),
    ("dns", lambda p, m, s: p.startswith("/dns")),
    ("media", lambda p, m, s: p.startswith("/media")),
    ("iso", lambda p, m, s: "iso" in p.lower().split("/")),
    ("os template", lambda p, m, s: "templates" in p),
    ("queue", lambda p, m, s: p.startswith("/queue")),
    ("task", lambda p, m, s: p.startswith("/queue")),
    ("self service", lambda p, m, s: p.startswith("/selfService")),
    ("credit", lambda p, m, s: "credit" in p.lower()),
    ("ip block", lambda p, m, s: p.startswith("/connectivity/ipblocks")),
    ("test connection", lambda p, m, s: p == "/connect"),
    ("connectivity check", lambda p, m, s: p == "/connect"),
]


def write_endpoints_lookup(all_ops):
    lines = [
        "<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->",
        "<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->",
        "",
        "# ENDPOINTS — compact AI lookup",
        "",
        "Load this file, not `openapi.yaml`, to find which endpoint covers a task. "
        "Search by keyword below, then open the linked domain doc for full detail. "
        "This file only maps keyword → endpoint → doc; it carries no schema detail.",
        "",
        "| Keyword | Method | Endpoint | Domain doc |",
        "|---|---|---|---|",
    ]
    seen = set()
    for keyword, matcher in KEYWORD_RULES:
        hit = None
        for entry in all_ops:
            if matcher(entry["path"], entry["method"], (entry["op"].get("summary") or "")):
                hit = entry
                break
        if not hit:
            continue
        key = (keyword, hit["path"], hit["method"])
        if key in seen:
            continue
        seen.add(key)
        doc = domain_file_link(hit["tag"])
        lines.append(f"| {keyword} | {hit['method']} | `{hit['path']}` | [{doc}]({doc}) |")
    lines.append("")
    lines.append("If a keyword isn't listed above, check `API_INDEX.md` (full table, one row per operation) "
                 "before falling back to `openapi.yaml`.")
    lines.append("")
    (ROOT / "ENDPOINTS.md").write_text("\n".join(lines))
    print(f"wrote ENDPOINTS.md ({len(seen)} keyword rows)")


def main():
    spec = load_spec()
    all_ops = collect_operations(spec)
    ops_by_tag = defaultdict(list)
    for entry in all_ops:
        ops_by_tag[entry["tag"]].append(entry)

    write_domain_files(ops_by_tag, all_ops)
    write_api_index(ops_by_tag)
    write_endpoints_lookup(all_ops)
    print(f"\nTotal: {len(all_ops)} operations across {len(ops_by_tag)} domains.")


if __name__ == "__main__":
    main()
