# MODULE_API_MAP — WHMCS function → module code → VirtFusion endpoint

Derived by reading the actual module source (`VirtFusionDirect.php`, `client.php`, `admin.php`,
`lib/Module.php`, `lib/ModuleFunctions.php`, `lib/ConfigureService.php`, `lib/StockControl.php`)
— not assumed from function names. Every endpoint listed here is a `grep`-confirmed call site
as of this writing. If the code changes, this file goes stale before `domains/*.md` does (those
regenerate from `openapi.yaml`; this doesn't) — re-verify with a grep for `$request->` /
`->initCurl(` before trusting an old mapping.

All API calls in this module go through exactly **three** files. Everything else (`client.php`,
`admin.php`, `VirtFusionDirect.php`) is a thin router that calls into one of these:

- **`lib/Module.php`** — base class; service-scoped operations resolved via `resolveServiceContext($serviceID)`
- **`lib/ModuleFunctions.php`** — WHMCS lifecycle hooks (create/suspend/unsuspend/terminate/change-package)
- **`lib/ConfigureService.php`** — order-time/catalogue operations, resolves "any available" VirtFusion server since no WHMCS service exists yet at order time

## WHMCS lifecycle hooks (`VirtFusionDirect.php` → `ModuleFunctions`)

| WHMCS Function | Module File | Method | VirtFusion Endpoint(s) | Doc |
|---|---|---|---|---|
| `VirtFusionDirect_CreateAccount` | `lib/ModuleFunctions.php` | `createAccount()` | `GET /users/{userid}/byExtRelation` → `POST /users` (if 404) → `POST /servers` → `POST /servers/{id}/build` (via `ConfigureService::initServerBuild()`, see below) | [domains/users-external-rel.md](domains/users-external-rel.md), [domains/users.md](domains/users.md), [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_SuspendAccount` | `lib/ModuleFunctions.php` | `suspendAccount()` | `POST /servers/{serverId}/suspend` | [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_UnsuspendAccount` | `lib/ModuleFunctions.php` | `unsuspendAccount()` | `POST /servers/{serverId}/unsuspend` | [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_TerminateAccount` | `lib/ModuleFunctions.php` | `terminateAccount()` | `DELETE /servers/{serverId}` | [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_ChangePackage` | `lib/ModuleFunctions.php` | `changePackage()` | `PUT /servers/{serverId}/package/{packageId}` → then `PUT /servers/{serverId}/modify/{resource}` per configurable option (via `Module::modifyResource()`) | [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_updateServerObject` (admin custom button) | `lib/ModuleFunctions.php` | `updateServerObject()` | `GET /servers/{serverId}` | [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_validateServerConfig` (admin custom button) | `lib/ModuleFunctions.php` | `validateServerConfig()` | `GET /users/{userid}/byExtRelation` → `POST /servers?dryRun=true` (via `Module::validateServerCreation()`) | [domains/users-external-rel.md](domains/users-external-rel.md), [domains/servers.md](domains/servers.md) |
| `VirtFusionDirect_AdminServicesTabFields` / `...Save` | `lib/ModuleFunctions.php` | `adminServicesTabFields()` / `adminServicesTabFieldsSave()` | None — local DB only (renders/saves the module's own `server_id`/`server_object` record) | — |
| `VirtFusionDirect_ClientArea` | `lib/ModuleFunctions.php` | `clientArea()` | None — local `tblhosting` read only, no VirtFusion call | — |
| `VirtFusionDirect_ServiceSingleSignOn` | `lib/Module.php` | `fetchLoginTokens()` | `POST /users/{userid}/serverAuthenticationTokens/{serverId}` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| `VirtFusionDirect_TestConnection` | `VirtFusionDirect.php` (inline) | — | `GET /connect` → `GET /compute/hypervisors/groups?results=1` (scope probe) | [domains/general.md](domains/general.md), [domains/hypervisor-groups.md](domains/hypervisor-groups.md) |
| `VirtFusionDirect_UsageUpdate` (daily cron) | `VirtFusionDirect.php` (inline) | — | `GET /servers/{serverId}?remoteState=true` → `GET /servers/{serverId}/traffic` → (self-service auto top-off, if configured) `GET /selfService/usage/byUserExtRelationId/{id}` → `POST /selfService/credit/byUserExtRelationId/{id}` (via `Module::getSelfServiceUsage()` / `addSelfServiceCredit()`) | [domains/servers.md](domains/servers.md), [domains/servers-network-traffic.md](domains/servers-network-traffic.md), [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |

## Order-time / catalogue operations (`lib/ConfigureService.php`)

Runs during checkout (populates order-form dropdowns via the `ClientAreaFooterOutput` hook) and
immediately after account creation. Resolves "any available" VirtFusion server since no WHMCS
service exists yet.

| Method | VirtFusion Endpoint | Called from | Doc |
|---|---|---|---|
| `fetchPackageId($name)` | `GET /packages` (searches by name client-side; 10-min cache) | Order form / product config | [domains/packages.md](domains/packages.md) |
| `fetchPackageByDbId($productId)` | None — reads `tblproducts.configoption2` locally | Order form | — |
| `fetchTemplates($serverPackageId)` | `GET /media/templates/fromServerPackageSpec/{serverPackageId}` (10-min cache) | Order form OS dropdown | [domains/media.md](domains/media.md) |
| `getVFUserDetails($whmcsClientId)` | `GET /users/{id}/byExtRelation` | `getUserSshKeys()`, `initServerBuild()` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| `getUserSshKeys($user)` | `GET /ssh_keys/user/{vfUserId}` (after resolving the VF user via `getVFUserDetails()`) | `client.php` `sshKeys` action | [domains/ssh-keys.md](domains/ssh-keys.md) |
| `initServerBuild($id, $vars, $vfUserId)` | `POST /servers/{id}/build` (optionally preceded by `createUserSshKey()` if a raw public key was submitted) | `ModuleFunctions::createAccount()`, right after `POST /servers` succeeds | [domains/servers.md](domains/servers.md) |
| `createUserSshKey($userId, $publicKey)` | `POST /ssh_keys` | `initServerBuild()`, when the order form's SSH key custom field holds a raw public key rather than an existing key ID | [domains/ssh-keys.md](domains/ssh-keys.md) |

## Client-area AJAX actions (`client.php` → `lib/Module.php` methods)

`client.php` is a `switch ($action)` router. Every mutating action is gated by
`validateUserOwnsService()` + `requireProvisionedService()`; nothing here calls the VirtFusion
API directly — it all goes through `Module` methods.

| `client.php` action | Module Method | VirtFusion Endpoint(s) | Doc |
|---|---|---|---|
| `resetPassword` | `Module::resetUserPassword()` | `POST /users/{clientID}/byExtRelation/resetPassword` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| `serverData` | `Module::fetchServerData()` | `GET /servers/{serverId}?remoteState=true` (+ `GET /servers/{serverId}/traffic`) | [domains/servers.md](domains/servers.md), [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| `loginAsServerOwner` | `Module::fetchLoginTokens()` | `POST /users/{userid}/serverAuthenticationTokens/{serverId}` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| `powerAction` | `Module::serverPowerAction()` | `POST /servers/{serverId}/power/{boot\|shutdown\|restart\|poweroff}` | [domains/servers-power.md](domains/servers-power.md) |
| `rebuild` | `Module::rebuildServer()` | `POST /servers/{serverId}/build` | [domains/servers.md](domains/servers.md) |
| `sshKeys` | `ConfigureService::getUserSshKeys()` | `GET /users/{id}/byExtRelation` → `GET /ssh_keys/user/{vfUserId}` | [domains/ssh-keys.md](domains/ssh-keys.md) |
| `rename` | `Module::renameServer()` | `PUT /servers/{serverId}/modify/name` | [domains/servers.md](domains/servers.md) |
| `osTemplates` | `Module::fetchOsTemplates()` | `GET /media/templates/fromServerPackageSpec/{packageSpecId}` | [domains/media.md](domains/media.md) |
| `resetServerPassword` | `Module::resetServerPassword()` | `POST /servers/{serverId}/resetPassword` | [domains/servers.md](domains/servers.md) |
| `backups` | `Module::getServerBackups()` | `GET /backups/server/{serverId}` | [domains/backups.md](domains/backups.md) |
| `trafficStats` | `Module::getTrafficStats()` | `GET /servers/{serverId}/traffic` | [domains/servers.md](domains/servers.md) |
| `vnc` | `Module::getVncConsole()` | `GET /servers/{serverId}/vnc` | [domains/servers.md](domains/servers.md) |
| `vncViewer` | `Module::toggleVnc(true)` then `getVncConsole()` | `POST /servers/{serverId}/vnc` → `GET /servers/{serverId}/vnc` | [domains/servers.md](domains/servers.md) |
| `toggleVnc` | `Module::toggleVnc()` | `POST /servers/{serverId}/vnc` | [domains/servers.md](domains/servers.md) |
| `selfServiceUsage` | `Module::getSelfServiceUsage()` | `GET /selfService/usage/byUserExtRelationId/{id}` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| `selfServiceReport` | `Module::getSelfServiceReport()` | `GET /selfService/report/byUserExtRelationId/{id}` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| `selfServiceAddCredit` | `Module::addSelfServiceCredit()` | `POST /selfService/credit/byUserExtRelationId/{id}` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| `rdnsList`, `rdnsUpdate` | `Module::fetchServerData()` for IP data, then `lib/PowerDns/*` | `GET /servers/{serverId}?remoteState=true` — the rest is local PowerDNS management, not VirtFusion API | [domains/servers.md](domains/servers.md) |

## Admin AJAX actions (`admin.php`)

Same dispatch pattern as `client.php`, gated by `adminOnly()` instead of ownership checks. Mostly
reuses the same `Module` methods; one action (`impersonateServerOwner`) makes an inline API call
directly rather than going through a `Module`/`ModuleFunctions`/`ConfigureService` method — see
below.

| `admin.php` action | Module Method | VirtFusion Endpoint(s) | Doc |
|---|---|---|---|
| `serverData` | `Module::fetchServerData()` | `GET /servers/{serverId}?remoteState=true` | [domains/servers.md](domains/servers.md) |
| `impersonateServerOwner` | Inline in `admin.php` (calls `$vf->initCurl()` directly — the one place outside `lib/Module.php`, `lib/ModuleFunctions.php`, `lib/ConfigureService.php` that makes a raw API call) | `GET /users/{userid}/byExtRelation` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| `rdnsStatus`, `rdnsReconcile` | `lib/PowerDns/*` | None — local PowerDNS reconciliation only | — |
| `stockRecalculate` | `StockControl::recalculateAll()` | `GET /packages/{id}` (`Module::fetchPackage()`), `GET /compute/hypervisors/groups/{id}/resources` (`Module::fetchGroupResources()`) | [domains/packages.md](domains/packages.md), [domains/hypervisor-groups.md](domains/hypervisor-groups.md) |

## Defined but not currently called from any WHMCS entry point

| Method | Location | Endpoint | Notes |
|---|---|---|---|
| `getQueueTask()` | `lib/Module.php` | `GET /queue/{queueId}` | Never invoked by `client.php`, `admin.php`, or any hook — reserved for future polling of the `queueId` returned by async operations (power actions, build). See `RELATIONSHIPS.md` for what the spec does and doesn't document about queue state. |
