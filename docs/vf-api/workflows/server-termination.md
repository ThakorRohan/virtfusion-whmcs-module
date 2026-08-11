# Workflow: Server Termination

**WHMCS trigger:** Service termination (cancellation, non-payment) → `VirtFusionDirect_TerminateAccount()`

**Module code:** `lib/ModuleFunctions.php::terminateAccount()`

## Sequence

1. Resolve the service's VirtFusion `server_id`.
2. **Delete the server** — `DELETE /servers/{serverId}`
   → [domains/servers.md](../domains/servers.md)
3. **On `204`** (success) or **`404` with `msg == "server not found"`** (already gone —
   treated as success, idempotent):
   - `cleanupPowerDnsForService()` — deletes any PTR records owned by this service, read from
     the locally-stored `server_object` JSON before it's erased. Local PowerDNS operation, not
     a VirtFusion API call. Non-fatal: DNS cleanup failures never block termination.
   - Delete the local module DB record (`Database::deleteSystemService()`).
   - Clear the WHMCS-side service fields (`updateWhmcsServiceParamsOnDestroy()`).
4. **On any other `404`** or non-204 status: termination is reported as failed with the
   VirtFusion error message, and local records are left intact so a retry is possible.

## Required identifiers

`serviceID` (WHMCS) → `server_id`.

## Important notes

- No grace period or confirmation step exists at the module level — this is a hard delete call.
  (`openapi.yaml`'s description for `DELETE /servers/{serverId}` doesn't itself document a
  grace period; a docblock elsewhere in the module code mentions "the default 5-minute grace
  period before destruction" as VirtFusion server-side behavior, but that's not something
  `openapi.yaml` states — treat it as undocumented-by-the-spec until confirmed.)
- The `server not found` string match on 404 is exact-string, case-sensitive, and comes from
  the VirtFusion response body — if VirtFusion changes that message, the idempotent-termination
  path silently stops matching and the call is reported as failed instead of already-succeeded.
