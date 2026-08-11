# VirtFusion API Knowledge Base

AI-optimized documentation for the VirtFusion Global API, built specifically so coding
agents working on `modules/servers/VirtFusionDirect` don't have to parse an 8,000+ line
`openapi.yaml` to find one endpoint.

## Canonical source

`openapi.yaml` (OpenAPI 3.0.1, VirtFusion Global API v1.0.0) is the **only** authoritative
spec. Everything else in this directory is a derived or hand-written view on top of it.

**If any Markdown file here conflicts with `openapi.yaml`, `openapi.yaml` wins.** Do not
trust a table or example in this tree over the raw spec when exact schema verification
matters — go read the spec section directly.

## Layout

```
docs/vf-api/
├── README.md              ← you are here
├── AI_GUIDE.md             ← START HERE if you're an agent. How to navigate this tree.
├── ENDPOINTS.md            ← compact keyword → endpoint lookup (load this cheaply, first)
├── API_INDEX.md            ← full table, one row per operation (85 rows)
├── RELATIONSHIPS.md        ← resource hierarchy + identifier flow across endpoints
├── MODULE_API_MAP.md       ← WHMCS function → module file → VirtFusion endpoint → doc
├── openapi.yaml            ← canonical raw spec — verify exact schemas here
├── domains/                ← one file per OpenAPI tag (20 files), full endpoint docs
│   ├── general.md
│   ├── hypervisors.md
│   ├── hypervisor-groups.md
│   ├── servers.md
│   ├── servers-network.md
│   ├── servers-network-firewall.md
│   ├── servers-network-traffic.md
│   ├── servers-power.md
│   ├── servers-backup-manager.md
│   ├── ip-blocks.md
│   ├── backups.md
│   ├── dns.md
│   ├── media.md
│   ├── packages.md
│   ├── queue-tasks.md
│   ├── ssh-keys.md
│   ├── users.md
│   ├── users-external-rel.md
│   ├── self-service.md
│   └── self-service-external-rel.md
├── workflows/               ← task-oriented sequences (WHMCS action → API calls → module code)
│   ├── server-provisioning.md
│   ├── server-suspension.md
│   ├── server-unsuspension.md
│   ├── server-termination.md
│   ├── server-rebuild.md
│   ├── server-power.md
│   ├── server-network.md
│   ├── server-backups.md
│   └── user-management.md
└── scripts/
    └── generate_docs.py    ← regenerates domains/*.md, API_INDEX.md, ENDPOINTS.md
```

`domains/` mirrors the spec's own 20 `tags:` entries exactly — this is not an arbitrary
split. VirtFusion already separates `Servers`, `Servers/Network`, `Servers/Network/Firewall`,
`Servers/Network/Traffic`, `Servers/Power`, and `Servers/Backup Manager` as distinct tags, so
that's the boundary used here too.

## What's generated vs. hand-written

| File | Origin |
|---|---|
| `domains/*.md` | Generated from `openapi.yaml` by `scripts/generate_docs.py` |
| `API_INDEX.md` | Generated |
| `ENDPOINTS.md` | Generated (keyword rules are hand-curated in the script, matches are mechanical) |
| `README.md`, `AI_GUIDE.md`, `RELATIONSHIPS.md`, `MODULE_API_MAP.md`, `workflows/*.md` | Hand-written |
| `openapi.yaml` | Not touched by anything in this repo — upstream VirtFusion spec |

Generated files carry an HTML comment header (`<!-- GENERATED FILE — do not hand-edit -->`).
After any `openapi.yaml` change, re-run:

```bash
cd docs/vf-api
python3 scripts/generate_docs.py
```

This keeps `API_INDEX.md`, `ENDPOINTS.md`, and `domains/*.md` from drifting out of sync with
the spec. The hand-written files (`RELATIONSHIPS.md`, `MODULE_API_MAP.md`, `workflows/*.md`)
are not auto-generated — if an endpoint they reference changes shape, they need a manual pass.

## Scope note

Everything under this documentation architecture lives inside `docs/vf-api/`. Nothing outside
this directory was created or modified to support it.
