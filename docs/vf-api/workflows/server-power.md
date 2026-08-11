# Workflow: Server Power Actions

**Trigger:** `client.php` action `powerAction` (client area power buttons)

**Module code:** `lib/Module.php::serverPowerAction($serviceID, $action)`

## Sequence

1. Validate `$action` against a fixed allow-list: `boot`, `shutdown`, `restart`, `poweroff`.
   Anything else is rejected locally before any API call is made.
2. Resolve service context (`server_id`, control panel).
3. **Perform the action** — `POST /servers/{serverId}/power/{action}`
   → [domains/servers-power.md](../domains/servers-power.md) (all 4 actions, self-contained domain)
4. Success is `200` or `204`. The response, when present, includes a `queueId` (VirtFusion
   queues power actions as async tasks) — the module does not currently poll
   `GET /queue/{queueId}` to confirm completion; it treats HTTP success as action-accepted, not
   action-completed. See `RELATIONSHIPS.md` for what the spec does/doesn't say about queue state.

This is the only workflow where `AI_GUIDE.md`'s domain-only guidance fully applies — power
actions never touch any other API domain. No package, network, or user lookups are involved.

## Required identifiers

`serviceID` (WHMCS) → `server_id`.

## Failure states documented by the API

`domains/servers-power.md` lists the `401` shared response for each action; beyond that,
`openapi.yaml` doesn't document action-specific failure codes (e.g. what happens calling `boot`
on an already-running server) — the module only branches on HTTP 200/204 vs. everything else.
