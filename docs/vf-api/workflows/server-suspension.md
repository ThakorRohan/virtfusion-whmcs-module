# Workflow: Server Suspension

**WHMCS trigger:** Overdue invoice / manual suspend → `VirtFusionDirect_SuspendAccount()`

**Module code:** `lib/ModuleFunctions.php::suspendAccount()`

## Sequence

1. Resolve the service's VirtFusion `server_id` from the local module DB and control panel config.
2. **Suspend** — `POST /servers/{serverId}/suspend`
   → [domains/servers.md](../domains/servers.md)

No request body, no other endpoint calls. This is a single-call workflow.

## Required identifiers

`serviceID` (WHMCS) → `server_id` (stored locally, resolved via `resolveServiceContext()`).

## Failure states documented by the API

`domains/servers.md` lists the documented response codes for this operation directly — check
there for the exact set (this spec's suspend/unsuspend endpoints share the shallow response
documentation pattern of most `Servers` mutations: a success code plus the shared `401`).
