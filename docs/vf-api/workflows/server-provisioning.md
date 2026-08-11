# Workflow: Server Provisioning

**WHMCS trigger:** Order activation → `VirtFusionDirect_CreateAccount()`

**Module code:** `lib/ModuleFunctions.php::createAccount()`, then `lib/ConfigureService.php::initServerBuild()`

This sequence is read directly from the running code (`grep`-confirmed), not inferred from the
spec alone — the spec establishes that these endpoints exist and what they accept; the *order*
comes from the module.

## Sequence

1. **Check for an existing user link** — `GET /users/{userid}/byExtRelation`
   (`userid` = WHMCS client ID, used as VirtFusion's `extRelationId`)
   → [domains/users-external-rel.md](../domains/users-external-rel.md)

2. **If 404, create the VirtFusion user** — `POST /users`
   Body includes `name`, `email`, `extRelationId` (= WHMCS client ID), and optionally
   `selfService` / `selfServiceHourlyCredit` if self-service billing is configured on the product.
   → [domains/users.md](../domains/users.md)

3. **Create the server** — `POST /servers`
   Required body: `packageId`, `userId` (VirtFusion's, from step 1 or 2), `hypervisorId`
   (actually a **hypervisor group ID** — see `RELATIONSHIPS.md` naming gotcha), `ipv4`.
   Optional resource fields (`storage`, `memory`, `cpuCores`, `traffic`,
   `networkSpeedInbound/Outbound`, `storageProfile`, `networkProfile`, etc.) are populated from
   WHMCS configurable options via `configOptionDefaultNaming`, overridable per-install through
   `config/ConfigOptionMapping.php`.
   → [domains/servers.md](../domains/servers.md)

4. **On success (HTTP 201):**
   - Persist `server_id` + full server object to the module's local DB (`Database::systemOnServerCreate()`) — not a VirtFusion API call.
   - Write IP/hostname back to `tblhosting` (`updateWhmcsServiceParamsOnServerObject()`) — local.
   - If PowerDNS is enabled, sync PTR records for the assigned IPs (`PowerDns\PtrManager::syncServer()`) — local, not a VirtFusion API call. Runs **before** step 5 deliberately, so reverse DNS is in place before first boot.
   - **Trigger OS build** — `POST /servers/{serverId}/build` via `ConfigureService::initServerBuild()`.
     Body: `operatingSystemId` (from the order's "Initial Operating System" custom field),
     generated `name` (`vps-<8 hex chars>`), `email: true`, and optionally `sshKeys: [id]`.
     → [domains/servers.md](../domains/servers.md)
     - If the "Initial SSH Key" custom field holds a raw public key (not a numeric key ID),
       it's created first via `POST /ssh_keys` (`ConfigureService::createUserSshKey()`)
       → [domains/ssh-keys.md](../domains/ssh-keys.md)

5. On failure at any step, the WHMCS-side create-account hook returns the VirtFusion error
   message (from `errors[0]` or `msg` in the response body) or a generic HTTP-code message.
   No rollback of a partially-created VirtFusion user/server is performed by this code path —
   the spec doesn't document a rollback endpoint, and the module doesn't attempt to delete a
   user it just created if server creation subsequently fails.

## Required identifiers going in

`userid` (WHMCS client ID) → `hypervisorId` (hypervisor **group** ID) → `packageId` → resource
config options. See `RELATIONSHIPS.md` for the full hierarchy.

## Related, order-time only

- Order-form dropdowns (package/template/hypervisor choices) are populated separately, before
  checkout, via `ConfigureService::fetchPackageId()` / `fetchTemplates()` — see
  `MODULE_API_MAP.md`.
- Admin "Validate Server Config" button runs the same options through
  `POST /servers?dryRun=true` without creating anything — see `ModuleFunctions::validateServerConfig()`.

## Failure states documented by the API

`openapi.yaml` documents `401` (auth) and `422` (validation, e.g. "Invalid or disabled firewall
ruleset") for `POST /servers`. It does not document what happens to a `dryRun=true` request
beyond the same response shape, nor any specific error taxonomy for `POST /servers/{id}/build`
beyond the shared `401` response — see `domains/servers.md` for exact response codes per
operation.
