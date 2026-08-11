# Workflow: User Management

Unlike the server-lifecycle workflows, user management isn't one linear sequence — it's a set
of independent operations that all key off the same bridge: **WHMCS client ID used as
VirtFusion's `extRelationId`**. Read `RELATIONSHIPS.md`'s identifier table first if this is new
to you.

## The core bridge

Every user-scoped call in this module resolves the VirtFusion user the same way:

`GET /users/{extRelationId}/byExtRelation` where `extRelationId` = WHMCS client ID
(`whmcsService->userid` / `params['userid']` depending on call site).
→ [domains/users-external-rel.md](../domains/users-external-rel.md)

This is called independently, on demand, by several different code paths — it is **not**
cached across requests at the module level (only order-time package/template lookups use the
`Cache` class; user lookups do not).

## Operations, by trigger

| Operation | Endpoint | Module code |
|---|---|---|
| Create VirtFusion user (only if `byExtRelation` returns 404) | `POST /users` | `ModuleFunctions::createAccount()` — see `workflows/server-provisioning.md` |
| Client-area password reset (for the VirtFusion user, not the server OS) | `POST /users/{clientID}/byExtRelation/resetPassword` | `Module::resetUserPassword()`, `client.php` action `resetPassword` |
| Single sign-on into the VirtFusion panel as this user | `POST /users/{userid}/serverAuthenticationTokens/{serverId}` | `Module::fetchLoginTokens()` — used by `VirtFusionDirect_ServiceSingleSignOn()` (client SSO button) and `client.php`'s `loginAsServerOwner` action |
| Admin impersonation lookup | `GET /users/{userid}/byExtRelation` | Inline in `admin.php`'s `impersonateServerOwner` action — see `MODULE_API_MAP.md` for why this is the one non-`Module`-method call site |
| SSH key lookup for a user | `GET /users/{id}/byExtRelation` → `GET /ssh_keys/user/{vfUserId}` | `ConfigureService::getVFUserDetails()` → `getUserSshKeys()`, `client.php` action `sshKeys` |
| SSH key creation for a user | `POST /ssh_keys` | `ConfigureService::createUserSshKey()` — called from `initServerBuild()` (provisioning) and `Module::rebuildServer()` (rebuild) when a raw public key is submitted |
| Self-service usage snapshot | `GET /selfService/usage/byUserExtRelationId/{extRelationId}` | `Module::getSelfServiceUsage()`, `client.php` action `selfServiceUsage`; also read internally by the daily cron for auto top-off |
| Self-service historical report | `GET /selfService/report/byUserExtRelationId/{extRelationId}` | `Module::getSelfServiceReport()`, `client.php` action `selfServiceReport` |
| Self-service credit top-up | `POST /selfService/credit/byUserExtRelationId/{extRelationId}` | `Module::addSelfServiceCredit()`, `client.php` action `selfServiceAddCredit`; also called automatically by `VirtFusionDirect_UsageUpdate()` when a product's configured auto-top-off threshold is crossed |

→ [domains/self-service-external-rel.md](../domains/self-service-external-rel.md),
[domains/ssh-keys.md](../domains/ssh-keys.md)

## What the spec supports but the module does not currently expose

The `Self Service` domain (`domains/self-service.md`) and much of
`Self Service/External Relational ID` (`domains/self-service-external-rel.md`) go well beyond
what this module calls — hourly billing profiles, resource-group profiles, resource packs
(create/modify/delete/suspend/unsuspend), and currency listing all have documented endpoints
with no corresponding module code. Confirmed absent via `grep -rn "selfService" lib/*.php
client.php admin.php` — only `usage`, `report`, and `credit` (create) are actually called.

## Required identifiers

WHMCS client ID (`userid`) ⇄ VirtFusion `extRelationId` (same value, different name depending
on which side of the API boundary you're looking from) → VirtFusion `userId` (VirtFusion's own
internal ID, returned by `byExtRelation`/`POST /users`, used where the API wants `userId`
rather than `extRelationId` — e.g. `POST /servers`'s `userId` field, `POST /ssh_keys`'s `userId`
field).
