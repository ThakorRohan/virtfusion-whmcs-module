<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# API_INDEX — VirtFusion Global API

Master navigation table, generated from `openapi.yaml`. One row per operation.
For a compact keyword lookup, use `ENDPOINTS.md` instead — this file is the full index.

| Domain | Method | Endpoint | Purpose | Auth | Path Params | Doc |
|---|---|---|---|---|---|---|
| General | GET | `/connect` | Test connection | Bearer | — | [domains/general.md](domains/general.md) |
| Hypervisor Groups | GET | `/compute/hypervisors/groups` | Retrieve hypervisor groups | Bearer | — | [domains/hypervisor-groups.md](domains/hypervisor-groups.md) |
| Hypervisor Groups | GET | `/compute/hypervisors/groups/{hypervisorGroupId}` | Retrieve a hypervisor group | Bearer | `hypervisorGroupId` | [domains/hypervisor-groups.md](domains/hypervisor-groups.md) |
| Hypervisor Groups | GET | `/compute/hypervisors/groups/{hypervisorGroupId}/resources` | Retrieve a hypervisor groups resources | Bearer | `hypervisorGroupId` | [domains/hypervisor-groups.md](domains/hypervisor-groups.md) |
| Servers/Network/Firewall | POST | `/servers/{serverId}/firewall/{interface}/disable` | Disable firewall | Bearer | `serverId`, `interface` | [domains/servers-network-firewall.md](domains/servers-network-firewall.md) |
| Servers/Network/Firewall | POST | `/servers/{serverId}/firewall/{interface}/enable` | Enable firewall | Bearer | `serverId`, `interface` | [domains/servers-network-firewall.md](domains/servers-network-firewall.md) |
| Servers/Network/Firewall | GET | `/servers/{serverId}/firewall/{interface}` | Retrieve firewall | Bearer | `serverId`, `interface` | [domains/servers-network-firewall.md](domains/servers-network-firewall.md) |
| Servers/Network/Firewall | POST | `/servers/{serverId}/firewall/{interface}/rules` | Apply firewall rulesets | Bearer | `serverId`, `interface` | [domains/servers-network-firewall.md](domains/servers-network-firewall.md) |
| Servers/Network/Traffic | GET | `/servers/{serverId}/traffic/blocks` | Retrieve a servers traffic blocks | Bearer | `serverId` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| Servers/Network/Traffic | POST | `/servers/{serverId}/traffic/blocks` | Add a traffic block to a server | Bearer | `serverId` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| Servers/Network/Traffic | DELETE | `/servers/{serverId}/traffic/blocks/{blockId}` | Remove a traffic block from a server | Bearer | `serverId`, `blockId` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| Servers/Network/Traffic | PUT | `/servers/{serverId}/modify/traffic` | Modify primary traffic allowance | Bearer | `serverId` | [domains/servers-network-traffic.md](domains/servers-network-traffic.md) |
| Servers/Network | POST | `/servers/{serverId}/networkWhitelist` | Add an address to the whitelist | Bearer | `serverId` | [domains/servers-network.md](domains/servers-network.md) |
| Servers/Network | DELETE | `/servers/{serverId}/networkWhitelist` | Remove an address from the whitelist | Bearer | `serverId` | [domains/servers-network.md](domains/servers-network.md) |
| Servers/Network | POST | `/servers/{serverId}/ipv4Qty` | Add a quantity of IPv4 addresses | Bearer | `serverId` | [domains/servers-network.md](domains/servers-network.md) |
| Servers/Network | POST | `/servers/{serverId}/ipv4` | Add an array of IPv4 addresses | Bearer | `serverId` | [domains/servers-network.md](domains/servers-network.md) |
| Servers/Network | DELETE | `/servers/{serverId}/ipv4` | Remove an array of IPv4 addresses | Bearer | `serverId` | [domains/servers-network.md](domains/servers-network.md) |
| Servers/Power | POST | `/servers/{serverId}/power/boot` | Boot a server | Bearer | `serverId` | [domains/servers-power.md](domains/servers-power.md) |
| Servers/Power | POST | `/servers/{serverId}/power/shutdown` | Shutdown a server | Bearer | `serverId` | [domains/servers-power.md](domains/servers-power.md) |
| Servers/Power | POST | `/servers/{serverId}/power/restart` | Restart a server | Bearer | `serverId` | [domains/servers-power.md](domains/servers-power.md) |
| Servers/Power | POST | `/servers/{serverId}/power/poweroff` | Poweroff a server | Bearer | `serverId` | [domains/servers-power.md](domains/servers-power.md) |
| Servers/Backup Manager | PUT | `/servers/{serverId}/backupManager/access` | Modify Access | Bearer | `serverId` | [domains/servers-backup-manager.md](domains/servers-backup-manager.md) |
| Servers | GET | `/servers/{serverId}` | Retrieve a server | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | DELETE | `/servers/{serverId}` | Delete a server | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/backups/plan/{planId}` | Add, remove or modify a backup plan | Bearer | `serverId`, `planId` | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers/{serverId}/build` | Build a server | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/package/{packageId}` | Change a server package | Bearer | `serverId`, `packageId` | [domains/servers.md](domains/servers.md) |
| Servers | GET | `/servers` | Retrieve servers | Bearer | — | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers` | Create a server | Bearer | — | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/modify/name` | Modify name | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers/{serverId}/resetPassword` | Reset a server password | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | GET | `/servers/user/{userId}` | Retrieve a users servers | Bearer | `userId` | [domains/servers.md](domains/servers.md) |
| Servers | GET | `/servers/{serverId}/templates` | Retrieve OS templates available to a server | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers/{serverId}/suspend` | Suspend a server | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/modify/cpuThrottle` | Throttle a servers CPU | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | GET | `/servers/{serverId}/traffic` | Retrieve a servers traffic statistics | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers/{serverId}/unsuspend` | Unsuspend a server | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | GET | `/servers/{serverId}/vnc` | Retrive VNC details | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers/{serverId}/vnc` | Enable or disable VNC | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/owner/{newOwnerId}` | Change owner | Bearer | `serverId`, `newOwnerId` | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/modify/memory` | Modify memory | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | PUT | `/servers/{serverId}/modify/cpuCores` | Modify CPU cores | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Servers | POST | `/servers/{serverId}/customXML` | Set custom XML | Bearer | `serverId` | [domains/servers.md](domains/servers.md) |
| Hypervisors | GET | `/compute/hypervisors` | Retrieve hypervisors | Bearer | — | [domains/hypervisors.md](domains/hypervisors.md) |
| Hypervisors | GET | `/compute/hypervisors/{hypervisorId}` | Retrive a Hypervisor | Bearer | `hypervisorId` | [domains/hypervisors.md](domains/hypervisors.md) |
| IP Blocks | POST | `/connectivity/ipblocks/{blockId}/ipv4` | Add an IPv4 range to an IP block | Bearer | `blockId` | [domains/ip-blocks.md](domains/ip-blocks.md) |
| IP Blocks | GET | `/connectivity/ipblocks` | Retrieve IP blocks | Bearer | — | [domains/ip-blocks.md](domains/ip-blocks.md) |
| IP Blocks | GET | `/connectivity/ipblocks/{blockId}` | Retrieve an IP block | Bearer | `blockId` | [domains/ip-blocks.md](domains/ip-blocks.md) |
| Backups | GET | `/backups/server/{serverId}` | Retrieve a server backups | Bearer | `serverId` | [domains/backups.md](domains/backups.md) |
| DNS | GET | `/dns/services/{serviceId}` | Retrieve a DNS service | Bearer | `serviceId` | [domains/dns.md](domains/dns.md) |
| Media | GET | `/media/iso/{isoId}` | Retrieve an ISO | Bearer | `isoId` | [domains/media.md](domains/media.md) |
| Media | GET | `/media/templates/fromServerPackageSpec/{serverPackageId}` | Retrieve operating system templates that are available for a package | Bearer | `serverPackageId` | [domains/media.md](domains/media.md) |
| Packages | GET | `/packages` | Retrieve packages | Bearer | — | [domains/packages.md](domains/packages.md) |
| Packages | GET | `/packages/{packageId}` | Retrieve a packge | Bearer | `packageId` | [domains/packages.md](domains/packages.md) |
| Queue & Tasks | GET | `/queue/{queueId}` | Retrieve a queue item | Bearer | `queueId` | [domains/queue-tasks.md](domains/queue-tasks.md) |
| SSH Keys | POST | `/ssh_keys` | Add an SSH key to a user account | Bearer | — | [domains/ssh-keys.md](domains/ssh-keys.md) |
| SSH Keys | GET | `/ssh_keys/{keyId}` | Retrieve an SSH key | Bearer | `keyId` | [domains/ssh-keys.md](domains/ssh-keys.md) |
| SSH Keys | DELETE | `/ssh_keys/{keyId}` | Delete an SSH key from a user | Bearer | `keyId` | [domains/ssh-keys.md](domains/ssh-keys.md) |
| SSH Keys | GET | `/ssh_keys/user/{userId}` | Retrieve a users SSH keys | Bearer | `userId` | [domains/ssh-keys.md](domains/ssh-keys.md) |
| Users/External Rel ID & Rel Str | GET | `/users/{extRelationId}/byExtRelation` | Retrieve a user | Bearer | `extRelationId` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| Users/External Rel ID & Rel Str | PUT | `/users/{extRelationId}/byExtRelation` | Modify a user | Bearer | `extRelationId` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| Users/External Rel ID & Rel Str | DELETE | `/users/{extRelationId}/byExtRelation` | Delete a user | Bearer | `extRelationId` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| Users/External Rel ID & Rel Str | POST | `/users/{extRelationId}/authenticationTokens` | Generate a set of login tokens | Bearer | `extRelationId` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| Users/External Rel ID & Rel Str | POST | `/users/{extRelationId}/serverAuthenticationTokens/{serverId}` | Generate a set of login tokens using a server ID | Bearer | `extRelationId`, `serverId` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| Users/External Rel ID & Rel Str | POST | `/users/{extRelationId}/byExtRelation/resetPassword` | Change a user passowrd | Bearer | `extRelationId` | [domains/users-external-rel.md](domains/users-external-rel.md) |
| Users | POST | `/users` | Create a user | Bearer | — | [domains/users.md](domains/users.md) |
| Self Service/External Relational ID | POST | `/selfService/credit/byUserExtRelationId/{extRelationId}` | Add credit to user | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | POST | `/selfService/hourlyGroupProfile/byUserExtRelationId/{extRelationId}` | Add an hourly group profile to a user | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | POST | `/selfService/resourceGroupProfile/byUserExtRelationId/{extRelationId}` | Add a resource group profile to a user | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | POST | `/selfService/resourcePack/byUserExtRelationId/{extRelationId}` | Add a resource pack to a user | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | GET | `/selfService/hourlyStats/byUserExtRelationId/{extRelationId}` | Retrieve hourly statistics | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | PUT | `/selfService/access/byUserExtRelationId/{extRelationId}` | Modify user access | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | DELETE | `/selfService/hourlyGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}` | Remove hourly group profile from a user | Bearer | `profileId`, `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | DELETE | `/selfService/resourceGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}` | Remove resource group from a user | Bearer | `profileId`, `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | GET | `/selfService/report/byUserExtRelationId/{extRelationId}` | Generate a report | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | PUT | `/selfService/hourlyResourcePack/byUserExtRelationId/{extRelationId}` | Set an hourly resource pack | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service/External Relational ID | GET | `/selfService/usage/byUserExtRelationId/{extRelationId}` | Retrieve a users usage | Bearer | `extRelationId` | [domains/self-service-external-rel.md](domains/self-service-external-rel.md) |
| Self Service | DELETE | `/selfService/credit/{creditId}` | Cancel credit that was applied to a user | Bearer | `creditId` | [domains/self-service.md](domains/self-service.md) |
| Self Service | DELETE | `/selfService/resourcePackServers/{packId}` | Delete all servers attached to a pack ID | Bearer | `packId` | [domains/self-service.md](domains/self-service.md) |
| Self Service | GET | `/selfService/resourcePack/{packId}` | Retrieve a user resource pack | Bearer | `packId` | [domains/self-service.md](domains/self-service.md) |
| Self Service | PUT | `/selfService/resourcePack/{packId}` | Modify user resource pack | Bearer | `packId` | [domains/self-service.md](domains/self-service.md) |
| Self Service | DELETE | `/selfService/resourcePack/{packId}` | Delete a user resource pack | Bearer | `packId` | [domains/self-service.md](domains/self-service.md) |
| Self Service | GET | `/selfService/currencies` | Retrieve currencies | Bearer | — | [domains/self-service.md](domains/self-service.md) |
| Self Service | POST | `/selfService/resourcePackServers/{packId}/suspend` | Suspend all servers assigned to a reosurce pack | Bearer | `packId` | [domains/self-service.md](domains/self-service.md) |
| Self Service | POST | `/selfService/resourcePackServers/{packId}/unsuspend` | Unsuspend all servers assigned to a reosurce pack | Bearer | `packId` | [domains/self-service.md](domains/self-service.md) |
