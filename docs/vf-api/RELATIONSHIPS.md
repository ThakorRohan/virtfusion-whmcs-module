# RELATIONSHIPS — resource hierarchy and identifier flow

Everything below is derived directly from `openapi.yaml` request/response schemas and, where
noted, from how `modules/servers/VirtFusionDirect` actually uses the API. Nothing here is
inferred VirtFusion internals beyond what the spec documents — where the spec is silent, that's
called out explicitly rather than filled in.

## Resource hierarchy

This is the creation-order dependency chain established by `POST /servers`'s request schema
(`domains/servers.md`) and the identifiers it requires:

```
Hypervisor Group  (compute/hypervisors/groups)
      │  hypervisorId — POST /servers requires a "hypervisorId" that the spec
      │  describes as "A valid hypervisor group ID" (not a plain hypervisor ID —
      │  see the naming gotcha below)
      ▼
Package  (packages)
      │  packageId — POST /servers requires a "valid package ID"
      ▼
User  (users / users/{extRelationId}/byExtRelation)
      │  userId — POST /servers requires a "valid user ID" (the VirtFusion-side user,
      │  not the WHMCS client — see identifier table below)
      ▼
Server  (servers)
      │  serverId — everything under /servers/{serverId}/* depends on a created server
      ├─→ Network / IP  (servers-network, ip-blocks)
      ├─→ Firewall  (servers-network-firewall)
      ├─→ Traffic  (servers-network-traffic)
      ├─→ Power  (servers-power)
      └─→ Backup Manager / Backups  (servers-backup-manager, backups)
```

`Media` (OS templates, ISOs) and `SSH Keys` feed into server **build/rebuild**
(`POST /servers/{serverId}/build`) but aren't part of the creation-order chain above — they're
looked up independently and passed into the build request body.

`Queue & Tasks` sits outside this hierarchy: several server mutations (power actions, build)
return a `queueId` in their response, which `GET /queue/{queueId}` can then poll. The spec does
not document what queue states exist or how long a task takes — only that a `queueId` is
returned and can be queried.

`Self Service` and `Self Service/External Relational ID` operate on a **user**, addressed by
`extRelationId`, not directly on a server. They're a parallel tree (usage, credits, resource
packs, hourly billing profiles) that the spec does not link back to specific server IDs.

## Identifier reference

| Identifier | Where it comes from | Where it's used | Notes |
|---|---|---|---|
| `serverId` | Response `data.id` from `POST /servers` | Path param on nearly every `/servers/{serverId}/*` endpoint | The module persists this as `server_id` against the WHMCS service (see `MODULE_API_MAP.md`) |
| `userId` | VirtFusion-side user, created via `POST /users` | Request body field on `POST /servers` | **Not** the same as WHMCS's client ID — see `extRelationId` below for the bridge |
| `extRelationId` | Supplied by the caller when creating the VirtFusion user via `POST /users` | Path param on every `.../byExtRelation`, `.../byUserExtRelationId/{extRelationId}` endpoint (Users/External Rel, Self Service/External Rel) | This is VirtFusion's mechanism for a third-party system (WHMCS) to reference its own user without tracking VirtFusion's internal `userId`. The module sets this to the WHMCS `userid` — see `MODULE_API_MAP.md` |
| `hypervisorId` (path, e.g. `GET /compute/hypervisors/{hypervisorId}`) | `compute/hypervisors` list | Identifies a single physical hypervisor | **Distinct from** the `hypervisorId` field inside `POST /servers`'s request body, which the spec explicitly documents as a hypervisor **group** ID, not this one. Same field name, two different resources — verify against `domains/hypervisors.md` vs `domains/hypervisor-groups.md` before assuming which one an endpoint wants |
| `hypervisorGroupId` | `compute/hypervisors/groups` list | `GET /compute/hypervisors/groups/{hypervisorGroupId}`, `.../resources` | See above — this is what `POST /servers`'s `hypervisorId` body field actually refers to |
| `packageId` | `packages` list | `POST /servers` body, `GET /packages/{packageId}`, `PUT /servers/{serverId}/package/{packageId}` | |
| `blockId` (IP Blocks) | `connectivity/ipblocks` list | `GET /connectivity/ipblocks/{blockId}`, `POST .../ipv4` | |
| `blockId` (Traffic Blocks) | `POST /servers/{serverId}/traffic/blocks` response | `DELETE /servers/{serverId}/traffic/blocks/{blockId}` | **Naming collision** — this is a different resource from the IP-block `blockId` above. Same param name, unrelated to IP allocation. Confirm which domain doc you're in (`ip-blocks.md` vs `servers-network-traffic.md`) before treating a `blockId` as one or the other |
| `planId` | Not documented as listable in this spec | `PUT /servers/{serverId}/backups/plan/{planId}` | No `GET` to enumerate backup plans is present in `openapi.yaml` — how a caller is expected to discover valid `planId` values is not documented |
| `keyId` | `POST /ssh_keys` response | `GET`/`DELETE /ssh_keys/{keyId}` | |
| `queueId` | Response `data.queueId` from async mutations (power actions, build) | `GET /queue/{queueId}` | |
| `isoId` | Not documented as listable in this spec | `GET /media/iso/{isoId}` | Same gap as `planId` — no enumeration endpoint present |
| `creditId` | Implied by `POST /selfService/credit/byUserExtRelationId/{extRelationId}` | `DELETE /selfService/credit/{creditId}` | |
| `profileId` | Implied by the corresponding `POST` create calls | `DELETE /selfService/hourlyGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}`, `DELETE /selfService/resourceGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}` | |
| `packId` | Implied by `POST /selfService/resourcePack/byUserExtRelationId/{extRelationId}` | `GET`/`PUT`/`DELETE /selfService/resourcePack/{packId}`, `/selfService/resourcePackServers/{packId}` | |
| `newOwnerId` | A `userId` | `PUT /servers/{serverId}/owner/{newOwnerId}` | Transfers server ownership to a different VirtFusion user |
| `interface` | Not a lookup identifier — it's a fixed string | `GET/POST /servers/{serverId}/firewall/{interface}[/enable\|disable\|rules]` | Spec describes it as `"primary or secondary."` with example `primary` — not an ID pulled from another endpoint's response |
| `serviceId` (DNS) | External — not derived from any other endpoint in this spec | `GET /dns/services/{serviceId}` | **Do not confuse with the WHMCS "Service ID"** (`tblhosting.id`) used throughout the module's own code and docs — same word, unrelated systems. VirtFusion's DNS `serviceId` refers to a DNS service record; WHMCS's service ID is the hosting product instance |

## What the spec does NOT establish

Per the source-of-truth rule, these are explicitly *not* documented relationships — don't
assume them:

- No endpoint enumerates valid `planId` (backup plan) or `isoId` values.
- No endpoint ties a `queueId` back to which server or action it belongs to beyond what the
  caller already knows from the request that produced it.
- There is no standalone "restore from backup" endpoint. The only restore-adjacent behavior is
  the `view_restore` enum value on `PUT /servers/{serverId}/backupManager/access`'s `type`
  field — see `domains/servers-backup-manager.md`. What `view_restore` actually does beyond
  being a named access mode is not described in the spec.
- The spec does not document queue task states, retry behavior, or timeouts for async
  operations (power actions, build).
