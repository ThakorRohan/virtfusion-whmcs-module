# Workflow: Server Rebuild / Reinstall

Two distinct trigger paths call the same underlying endpoint. Don't conflate them.

## Path A — initial build during provisioning

**Trigger:** Immediately after `POST /servers` succeeds, as part of `CreateAccount`.
**Module code:** `lib/ConfigureService.php::initServerBuild()`
**See:** `workflows/server-provisioning.md` (step 5) for the full sequence.

## Path B — customer/admin-triggered rebuild on an existing server

**Trigger:** `client.php` action `rebuild` (client area "Reinstall OS" button)
**Module code:** `lib/Module.php::rebuildServer($serviceID, $osId, $hostname, $sshKey)`

### Sequence

1. Resolve service context (`server_id`, control panel).
2. **Optional: resolve an SSH key.**
   - If `$sshKey` is numeric → treated as an existing VirtFusion key ID directly.
   - If `$sshKey` matches a public-key prefix (`ssh-`, `ecdsa-sha2-`, `sk-ssh-`, `sk-ecdsa-`) →
     resolve the service owner's VirtFusion user via
     `ConfigureService::getVFUserDetails()` (`GET /users/{id}/byExtRelation`), then create the
     key via `ConfigureService::createUserSshKey()` (`POST /ssh_keys`)
     → [domains/ssh-keys.md](../domains/ssh-keys.md), [domains/users-external-rel.md](../domains/users-external-rel.md)
   - Key resolution is **non-fatal** — if it fails, the rebuild proceeds without a key rather
     than aborting.
3. **Rebuild** — `POST /servers/{serverId}/build`
   Body: `operatingSystemId` (required), `email: true`, optional `hostname`, optional
   `sshKeys: [id]`.
   → [domains/servers.md](../domains/servers.md)
4. On `200`/`201`, the module invalidates its local backups cache for this server
   (`Cache::forget('backups:' . $serverId)`) — local only, not a VirtFusion call. No other
   endpoint is touched.

## Required identifiers

`serviceID` (WHMCS) → `server_id` → `operatingSystemId` (from `domains/media.md`'s OS template
lookup, `GET /media/templates/fromServerPackageSpec/{serverPackageId}`) → optionally `sshKeys[]`.

## Important notes

- The VirtFusion user resolved for SSH-key creation in Path B is **always the service owner
  derived server-side from `whmcsService->userid`**, never taken from client input — this is a
  deliberate security control (a customer can only attach a key to their own account), not
  something the OpenAPI spec itself enforces.
- `openapi.yaml` does not document what happens to existing server data (disks, network config)
  on rebuild beyond accepting the new `operatingSystemId` — verify destructive-vs-preserving
  behavior against a live test before assuming either way.
