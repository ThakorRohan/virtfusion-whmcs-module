# Workflow: Server Network

Unlike the other workflow files, this one is mostly a **gap map**, not a sequence — most of the
VirtFusion networking surface (`domains/servers-network.md`,
`domains/servers-network-firewall.md`, `domains/ip-blocks.md`) is **not currently called by this
module**. This is checked by grepping every `$request->` / `->initCurl(` call site in the
codebase, not assumed.

## What the module actually does today

| Action | Endpoint | Module code |
|---|---|---|
| Read a server's traffic stats (client area, cron usage sync) | `GET /servers/{serverId}/traffic` | `Module::getTrafficStats()`, inlined again in `VirtFusionDirect_UsageUpdate()` |
| Read full server state including network interfaces | `GET /servers/{serverId}?remoteState=true` | `Module::fetchServerData()` — the response includes `network.interfaces[].ipv4[]`, which `client.php`'s `rdnsList`/`rdnsUpdate` actions read to drive **local** PowerDNS PTR management (not a VirtFusion network mutation) |

→ [domains/servers.md](../domains/servers.md), [domains/servers-network-traffic.md](../domains/servers-network-traffic.md)

## What the spec supports but the module does not currently expose

No WHMCS action in `client.php` or `admin.php` currently calls any of:

- `POST/DELETE /servers/{serverId}/ipv4` (assign/remove IPv4 addresses)
- `POST /servers/{serverId}/ipv4Qty` (bulk IP quantity change)
- `POST/DELETE /servers/{serverId}/networkWhitelist`
- Any `/servers/{serverId}/firewall/{interface}/*` endpoint
- `GET /connectivity/ipblocks*` or `POST /connectivity/ipblocks/{blockId}/ipv4`
- `GET/POST /servers/{serverId}/traffic/blocks` (traffic blocks, distinct from traffic stats — see `RELATIONSHIPS.md`'s `blockId` naming-collision note)
- `PUT /servers/{serverId}/modify/traffic` (primary traffic allowance resize)

If a task asks you to add IP assignment, firewall management, or traffic-limit editing to the
module, there is **no existing implementation to extend** — you'd be adding new functionality
against `domains/servers-network.md`, `domains/servers-network-firewall.md`,
`domains/servers-network-traffic.md`, and/or `domains/ip-blocks.md` from scratch. Confirm this
gap still holds (re-grep the codebase) before assuming it — this file can go stale faster than
the generated docs.
