# Workflow: Server Unsuspension

**WHMCS trigger:** Invoice paid / manual unsuspend → `VirtFusionDirect_UnsuspendAccount()`

**Module code:** `lib/ModuleFunctions.php::unsuspendAccount()`

## Sequence

1. Resolve the service's VirtFusion `server_id`.
2. **Unsuspend** — `POST /servers/{serverId}/unsuspend`
   → [domains/servers.md](../domains/servers.md)

Single-call workflow, no request body, mirrors `server-suspension.md` exactly.

## Required identifiers

`serviceID` (WHMCS) → `server_id`.
