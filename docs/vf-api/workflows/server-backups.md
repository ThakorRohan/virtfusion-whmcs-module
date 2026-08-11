# Workflow: Server Backups

**Trigger:** `client.php` action `backups` (client area backups list)

**Module code:** `lib/Module.php::getServerBackups($serviceID)`

## Sequence

1. Resolve service context (`server_id`, control panel).
2. **List backups** — `GET /backups/server/{serverId}`
   → [domains/backups.md](../domains/backups.md)

That's the entire implemented workflow — read-only backup listing.

## What the spec supports but the module does not currently expose

Grepped and confirmed absent from every `.php` file in this module:

- `PUT /servers/{serverId}/backupManager/access` — sets the backup manager access `type`
  (`inherit`/`disabled`/`scheduled`/`view_restore`/`full`/`manual`). This is the only
  restore-adjacent operation the spec documents (see `RELATIONSHIPS.md`), and it is not called
  anywhere in this module.
  → [domains/servers-backup-manager.md](../domains/servers-backup-manager.md)
- `PUT /servers/{serverId}/backups/plan/{planId}` — add/remove/modify a backup plan. Not called
  anywhere in this module.
  → [domains/servers.md](../domains/servers.md)

If a task asks for backup-plan management or a restore/access-mode toggle in the WHMCS client
area, there's no existing code path to extend — this would be new functionality. Re-confirm
this gap by grepping the codebase before assuming it (`grep -rn "backupManager\|backups/plan"`
from the submodule root) — it can go stale faster than the generated docs.

## Required identifiers

`serviceID` (WHMCS) → `server_id`. Backup plan management would additionally need `planId`,
which the spec does not document an enumeration endpoint for — see `RELATIONSHIPS.md`.
