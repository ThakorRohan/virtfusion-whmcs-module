# AI_GUIDE — how to use this documentation

You are an AI coding agent working on `modules/servers/VirtFusionDirect`, a WHMCS server
module that provisions and manages VPS instances via the VirtFusion Global API. This guide
tells you how to navigate `docs/vf-api/` without loading the whole spec.

## The rule

**Never open `openapi.yaml` first.** It's 8,000+ lines. Use it only as a last resort, for
exact schema/enum verification, once you already know which endpoint you need.

## Progressive loading order

```
1. AI_GUIDE.md            (this file)         — how to navigate
2. ENDPOINTS.md                                 — find the endpoint by keyword
3. domains/<tag>.md                             — full detail on that endpoint
4. workflows/<task>.md                          — multi-endpoint sequence, if the task spans several calls
5. MODULE_API_MAP.md                            — where in our code this is already implemented
6. openapi.yaml                                 — only if you need to verify exact schema/enum
```

Stop as soon as you have what you need. Most tasks resolve at step 3 or 5.

## Decision table

| If the task is about... | Read | Then |
|---|---|---|
| Server provisioning (create/deploy) | `workflows/server-provisioning.md` | `domains/servers.md`, `domains/packages.md` if package IDs are involved, `domains/servers-network.md` if IP allocation is involved |
| Power controls (boot/reboot/shutdown/poweroff) | `workflows/server-power.md` + `domains/servers-power.md` only | Nothing else — this domain is fully self-contained |
| Suspension | `workflows/server-suspension.md` + `domains/servers.md` (`/servers/{serverId}/suspend`) | — |
| Unsuspension | `workflows/server-unsuspension.md` + `domains/servers.md` (`/servers/{serverId}/unsuspend`) | — |
| Termination | `workflows/server-termination.md` + `domains/servers.md` (`DELETE /servers/{serverId}`) | — |
| Rebuild / reinstall OS | `workflows/server-rebuild.md` + `domains/servers.md` (`/servers/{serverId}/build`) | `domains/media.md` if OS template lookup is involved, `domains/ssh-keys.md` if SSH key injection is involved |
| Backups / backup manager access | `workflows/server-backups.md` + `domains/servers-backup-manager.md` + `domains/backups.md` | — |
| Networking (IPs, whitelist, traffic limits) | `domains/servers-network.md` | `domains/servers-network-traffic.md` for traffic blocks/limits, `domains/ip-blocks.md` if allocating from a specific block |
| Firewall | `domains/servers-network-firewall.md` only | — |
| Traffic stats / traffic blocks | `domains/servers-network-traffic.md` for blocks, `domains/servers.md` (`GET /servers/{serverId}/traffic`) for the primary stats endpoint | — |
| Customer / user management | `workflows/user-management.md` | `domains/users.md`, `domains/users-external-rel.md`, `domains/self-service.md` and `domains/self-service-external-rel.md` if self-service is involved |
| Package changes / resizing | `domains/servers.md` (`PUT /servers/{serverId}/package/{packageId}`) | `domains/packages.md` to inspect the target package first |
| VNC console | `domains/servers.md` (`GET`/`POST` `/servers/{serverId}/vnc`) | — |
| SSH keys | `domains/ssh-keys.md` | — |
| DNS (PowerDNS/PTR integration) | `domains/dns.md` | Also read `lib/PowerDns/*` in the module — DNS/PTR handling is mostly local, not VirtFusion API-driven |
| Hypervisors / hypervisor groups / stock checks | `domains/hypervisors.md`, `domains/hypervisor-groups.md` | `lib/StockControl.php` for how the module uses `fetchGroupResources`/`fetchPackage` for capacity checks |
| Queue / async task status | `domains/queue-tasks.md` | Note: `getQueueTask()` exists in `lib/Module.php` but is not currently called from any WHMCS entry point — see `MODULE_API_MAP.md` |

Before changing any API integration, **always inspect the existing implementation** —
`MODULE_API_MAP.md` tells you exactly which file and method already calls the endpoint you're
about to touch. Don't re-derive from scratch what's already wired up.

## Hard rules for this codebase

- **Do not guess VirtFusion endpoints.** If it's not in `ENDPOINTS.md` or `API_INDEX.md`, it's
  not documented — check `openapi.yaml` directly before assuming it exists.
- **Do not invent request parameters or response fields.** Every field this documentation
  shows comes straight out of `openapi.yaml`. If a field has "(no description in spec)", that's
  VirtFusion's own spec being sparse — don't fill in a guessed explanation and present it as
  fact.
- **Never assume upstream VirtFusion behavior from generic KVM/virtualization knowledge.**
  VirtFusion's API semantics (e.g. what `dryRun` actually validates, what `view_restore` means
  for backup manager access) are only what `openapi.yaml` documents. If it's not stated, treat
  it as unknown and say so.
- **FlashRDP's fork intentionally differs from the upstream VirtFusion WHMCS module.** Don't
  "fix" FlashRDP-specific behavior in `lib/` or `VirtFusionDirect.php` back toward upstream
  conventions without being asked — see `SUBMODULE_AI_INSTRUCTIONS.md` and the parent repo's
  `CLAUDE.md` for the submodule boundary rules.
- **All VirtFusion API calls in this module go through `lib/Curl.php`**, a thin Bearer-token
  cURL wrapper (30s timeout, full TLS verification, single-use instance per request). If you're
  adding a new API call, follow the existing pattern in `lib/Module.php` or
  `lib/ModuleFunctions.php` — don't introduce a second HTTP client.
- **Every VirtFusion API call in this module currently lives in exactly three files**:
  `lib/Module.php` (lifecycle/service-scoped operations), `lib/ModuleFunctions.php` (WHMCS
  lifecycle hooks — create/suspend/unsuspend/terminate/change-package), and
  `lib/ConfigureService.php` (order-time/catalogue operations — package and template lookups,
  SSH key creation, initial build trigger; runs before a WHMCS service exists, so it resolves
  "any available" VirtFusion server rather than a service-specific one). `client.php` and
  `admin.php` are thin AJAX routers that call into those; they make no direct HTTP calls of
  their own, with one exception: `admin.php`'s `impersonateServerOwner` action calls
  `$vf->initCurl()` inline (`GET /users/{userid}/byExtRelation`) rather than going through a
  method — see `MODULE_API_MAP.md`. If you find yourself adding a raw `Curl` call anywhere
  else, stop and reconsider.
- **This documentation can go stale.** It's generated from a snapshot of `openapi.yaml`. If
  something here looks wrong, verify against the live `openapi.yaml` in this same directory
  before trusting it — see `README.md` for the drift policy.
