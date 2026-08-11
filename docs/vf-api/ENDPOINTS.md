<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# ENDPOINTS — compact AI lookup

Load this file, not `openapi.yaml`, to find which endpoint covers a task. Search by keyword below, then open the linked domain doc for full detail. This file only maps keyword → endpoint → doc; it carries no schema detail.

| Keyword | Method | Endpoint | Domain doc |
|---|---|---|---|
| create server | POST | `/servers` | [domains/servers.md](domains/servers.md) |
| deploy server | POST | `/servers` | [domains/servers.md](domains/servers.md) |
| delete server | DELETE | `/servers/{serverId}` | [domains/servers.md](domains/servers.md) |
| terminate server | DELETE | `/servers/{serverId}` | [domains/servers.md](domains/servers.md) |
| suspend server | POST | `/servers/{serverId}/suspend` | [domains/servers.md](domains/servers.md) |
| unsuspend server | POST | `/servers/{serverId}/unsuspend` | [domains/servers.md](domains/servers.md) |
| rebuild server | POST | `/servers/{serverId}/build` | [domains/servers.md](domains/servers.md) |
| reinstall | POST | `/servers/{serverId}/build` | [domains/servers.md](domains/servers.md) |
| rename server | PUT | `/servers/{serverId}/modify/name` | [domains/servers.md](domains/servers.md) |
| boot | POST | `/servers/{serverId}/power/boot` | [domains/servers-power.md](domains/servers-power.md) |
| power on | POST | `/servers/{serverId}/power/boot` | [domains/servers-power.md](domains/servers-power.md) |
| power off | POST | `/servers/{serverId}/power/poweroff` | [domains/servers-power.md](domains/servers-power.md) |
| poweroff | POST | `/servers/{serverId}/power/poweroff` | [domains/servers-power.md](domains/servers-power.md) |
| reboot | POST | `/servers/{serverId}/power/restart` | [domains/servers-power.md](domains/servers-power.md) |
| restart | POST | `/servers/{serverId}/power/restart` | [domains/servers-power.md](domains/servers-power.md) |
| shutdown | POST | `/servers/{serverId}/power/shutdown` | [domains/servers-power.md](domains/servers-power.md) |
| graceful shutdown | POST | `/servers/{serverId}/power/shutdown` | [domains/servers-power.md](domains/servers-power.md) |
| assign ip | POST | `/servers/{serverId}/ipv4` | [domains/servers-network.md](domains/servers-network.md) |
| remove ip | DELETE | `/servers/{serverId}/ipv4` | [domains/servers-network.md](domains/servers-network.md) |
| ip quantity | POST | `/servers/{serverId}/ipv4Qty` | [domains/servers-network.md](domains/servers-network.md) |
| firewall | POST | `/servers/{serverId}/firewall/{interface}/disable` | [domains/servers-network-firewall.md](domains/servers-network-firewall.md) |
| network whitelist | POST | `/servers/{serverId}/networkWhitelist` | [domains/servers-network.md](domains/servers-network.md) |
| traffic | GET | `/servers/{serverId}/traffic` | [domains/servers.md](domains/servers.md) |
| traffic block | GET | `/servers/{serverId}/traffic/blocks` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| backup | GET | `/backups/server/{serverId}` | [domains/backups.md](domains/backups.md) |
| backup plan | PUT | `/servers/{serverId}/backups/plan/{planId}` | [domains/servers.md](domains/servers.md) |
| backup manager | PUT | `/servers/{serverId}/backupManager/access` | [domains/servers-backup-manager.md](domains/servers-backup-manager.md) |
| restore | PUT | `/servers/{serverId}/backupManager/access` | [domains/servers-backup-manager.md](domains/servers-backup-manager.md) |
| change package | PUT | `/servers/{serverId}/package/{packageId}` | [domains/servers.md](domains/servers.md) |
| resize | PUT | `/servers/{serverId}/modify/traffic` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| modify resource | PUT | `/servers/{serverId}/modify/traffic` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| change owner | PUT | `/servers/{serverId}/owner/{newOwnerId}` | [domains/servers.md](domains/servers.md) |
| vnc | GET | `/servers/{serverId}/vnc` | [domains/servers.md](domains/servers.md) |
| console | GET | `/servers/{serverId}/vnc` | [domains/servers.md](domains/servers.md) |
| reset password | POST | `/servers/{serverId}/resetPassword` | [domains/servers.md](domains/servers.md) |
| user | GET | `/users/{extRelationId}/byExtRelation` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| create user | POST | `/users` | [domains/users.md](domains/users.md) |
| package | GET | `/packages` | [domains/packages.md](domains/packages.md) |
| hypervisor | GET | `/compute/hypervisors` | [domains/hypervisors.md](domains/hypervisors.md) |
| hypervisor group | GET | `/compute/hypervisors/groups` | [domains/hypervisor-groups.md](domains/hypervisor-groups.md) |
| ssh key | POST | `/ssh_keys` | [domains/ssh-keys.md](domains/ssh-keys.md) |
| dns | GET | `/dns/services/{serviceId}` | [domains/dns.md](domains/dns.md) |
| media | GET | `/media/iso/{isoId}` | [domains/media.md](domains/media.md) |
| iso | GET | `/media/iso/{isoId}` | [domains/media.md](domains/media.md) |
| os template | GET | `/servers/{serverId}/templates` | [domains/servers.md](domains/servers.md) |
| queue | GET | `/queue/{queueId}` | [domains/queue-tasks.md](domains/queue-tasks.md) |
| task | GET | `/queue/{queueId}` | [domains/queue-tasks.md](domains/queue-tasks.md) |
| self service | POST | `/selfService/credit/byUserExtRelationId/{extRelationId}` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| credit | POST | `/selfService/credit/byUserExtRelationId/{extRelationId}` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| ip block | POST | `/connectivity/ipblocks/{blockId}/ipv4` | [domains/ip-blocks.md](domains/ip-blocks.md) |
| test connection | GET | `/connect` | [domains/general.md](domains/general.md) |
| connectivity check | GET | `/connect` | [domains/general.md](domains/general.md) |

If a keyword isn't listed above, check `API_INDEX.md` (full table, one row per operation) before falling back to `openapi.yaml`.
