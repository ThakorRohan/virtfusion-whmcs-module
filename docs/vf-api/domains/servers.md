<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Servers

21 operation(s). Canonical spec: `openapi.yaml` (tag: `Servers`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve a server

`GET /servers/{serverId}`

**Purpose:**
Retrieve a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `remoteState` | boolean | No | Return the remote state of the server. |

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "id": 69,
    "ownerId": 1,
    "hypervisorId": 6,
    "arch": 1,
    "name": "Elliptical Way",
    "selfService": 0,
    "selfServiceSettings": [],
    "hostname": null,
    "commissionStatus": 3,
    "uuid": "b9fd9092-7200-4a24-96d4-76aedd664274",
    "state": "complete",
    "migratable": true,
    "timezone": "_default",
    "migrateLevel": 0,
    "deleteLevel": 0,
    "configLevel": 0,
    "backupLevel": 0,
    "elevated": false,
    "elevateId": null,
    "elevate": false,
    "destroyable": true,
    "rebuild": false,
    "suspended": false,
    "protected": false,
    "buildFailed": false,
    "primaryNetworkDhcp4": false,
    "primaryNetworkDhcp6": false,
    "built": "2025-01-15T15:00:49+00:00",
```
_(truncated — full example in `openapi.yaml` under `paths./servers/{serverId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `GET /servers` — Retrieve servers (domains/servers.md)
- `POST /servers` — Create a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Delete a server

`DELETE /servers/{serverId}`

**Purpose:**
Delete a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `delay` | integer | No | How many minutes the system should wait before deleting the server. (0-43800) |

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `GET /servers` — Retrieve servers (domains/servers.md)
- `POST /servers` — Create a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Add, remove or modify a backup plan

`PUT /servers/{serverId}/backups/plan/{planId}`

**Purpose:**
Add, remove or modify a backup plan

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `planId` | integer | A valid backup plan ID as shown in VirtFusion. A value of 0 (zero) will remove the plan. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Build a server

`POST /servers/{serverId}/build`

**Purpose:**
Build a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `operatingSystemId` | integer | Yes | A valid operating system template ID. |
| `name` | string | No | Server name. |
| `hostname` | string | No | Server Hostname. |
| `sshKeys` | array | No | An array of SSH keys. |
| `vnc` | boolean | No | Enable/disable. |
| `ipv6` | boolean | No | Enable/disable. |
| `email` | boolean | No | Enable/disable. |
| `swap` | number | No | Values of 256, 512, 768, 1, 1.5, 2, 3, 4, 5,6 8 |

**Example Request Body:**
```json
{
  "operatingSystemId": 1,
  "name": "server 1",
  "hostname": "server1.domain.com",
  "sshKeys": [
    1,
    2,
    3,
    4
  ],
  "vnc": false,
  "ipv6": false,
  "swap": 512,
  "email": true
}
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "id": 9,
    "ownerId": 3,
    "hypervisorId": 6,
    "arch": 1,
    "name": "server 1",
    "selfService": 0,
    "selfServiceSettings": [],
    "hostname": "server1.domain.com",
    "commissionStatus": 1,
    "uuid": "5de5a89b-b707-41bf-a051-7af1a4e67795",
    "state": "queued",
    "migratable": true,
    "timezone": "_default",
    "migrateLevel": 0,
    "deleteLevel": 0,
    "configLevel": 1,
    "backupLevel": 0,
    "elevated": false,
    "elevateId": null,
    "elevate": false,
    "destroyable": true,
    "rebuild": false,
    "suspended": false,
    "protected": false,
    "buildFailed": false,
    "primaryNetworkDhcp4": false,
    "primaryNetworkDhcp6": false,
    "built": "2024-11-29T19:32:17+00:00",
```
_(truncated — full example in `openapi.yaml` under `paths./servers/{serverId}/build.post.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Change a server package

`PUT /servers/{serverId}/package/{packageId}`

**Purpose:**
Change a server package

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `packageId` | integer | A valid package ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `backupPlan` | boolean | No | (no description in spec) |
| `cpu` | boolean | No | (no description in spec) |
| `memory` | boolean | No | (no description in spec) |
| `primaryDiskReadIOPS` | boolean | No | (no description in spec) |
| `primaryDiskReadThroughput` | boolean | No | (no description in spec) |
| `primaryDiskSize` | boolean | No | (no description in spec) |
| `primaryDiskWriteIOPS` | boolean | No | (no description in spec) |
| `primaryDiskWriteThroughput` | boolean | No | (no description in spec) |
| `primaryNetworkInboundSpeed` | boolean | No | (no description in spec) |
| `primaryNetworkOutboundSpeed` | boolean | No | (no description in spec) |
| `primaryNetworkTraffic` | boolean | No | (no description in spec) |

**Example Request Body:**
```json
{
  "backupPlan": true,
  "cpu": true,
  "memory": true,
  "primaryDiskReadIOPS": false,
  "primaryDiskReadThroughput": false,
  "primaryDiskSize": true,
  "primaryDiskWriteIOPS": true,
  "primaryDiskWriteThroughput": true,
  "primaryNetworkInboundSpeed": true,
  "primaryNetworkOutboundSpeed": true,
  "primaryNetworkTraffic": true
}
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "info": [
    "CPU cores not updated. It matches the current value",
    "primary disk not updated. It either matches or is lower than the current value",
    "traffic not updated. It matches the current value",
    "primary network speed inbound not updated. It matches the current value",
    "primary network speed outbound not updated. It matches the current value",
    "write IOPS not updated. It matches the current value",
    "write bytes/sec not updated. It matches the current value"
  ]
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Retrieve servers

`GET /servers`

**Purpose:**
Retrieve servers

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
None.

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `type` | string | No | simple or full. Defaults to simple. |
| `results` | integer | No | Number of results to return. Range between 1 and 200. Defaults to 20. |
| `hypervisorId` | integer | No | Filter by hypervisor ID. Specify multiple with hypervisorId[]=1&hypervisorId[]=2 etc... |

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 5,
      "uuid": "1fb4b391-b360-40e7-8fe1-5b024c7508ac",
      "name": "Avaricious Trade",
      "commissioned": 3,
      "owner": 1,
      "hypervisorId": 7,
      "suspended": false,
      "protected": false,
      "updated": "2024-04-02T10:15:10+00:00",
      "created": "2024-03-30T14:41:27+00:00"
    },
    {
      "id": 8,
      "uuid": "82c37680-bf8f-4712-854f-31428933703f",
      "name": "PDNS",
      "commissioned": 3,
      "owner": 1,
      "hypervisorId": 3,
      "suspended": false,
      "protected": false,
      "updated": "2024-04-13T22:02:04+00:00",
      "created": "2024-04-09T11:33:43+00:00"
    },
    {
      "id": 9,
      "uuid": "5de5a89b-b707-41bf-a051-7af1a4e67795",
```
_(truncated — full example in `openapi.yaml` under `paths./servers.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers` — Create a server (domains/servers.md)

---

### Create a server

`POST /servers`

**Purpose:**
Create a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
None.

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `dryRun` | boolean | No | Test to see if a server can be created without actual creation. true|false Defaults to false. |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `packageId` | integer | Yes | A valid package ID. |
| `userId` | integer | Yes | A valid user ID. |
| `hypervisorId` | integer | Yes | A valid hypervisor group ID. |
| `ipv4` | integer | No | Number of IPv4 addresses. |
| `storage` | integer | No | Number of GB primary storage. |
| `traffic` | integer | No | Number of GB traffic (0=unlimited). |
| `memory` | integer | No | Number of MB memory. |
| `cpuCores` | integer | No | Number of CPU cores. |
| `networkSpeedInbound` | integer | No | Inbound network speed (kB/s). |
| `networkSpeedOutbound` | integer | No | Outbound network speed (kB/s). |
| `storageProfile` | integer | No | Storage profile ID. |
| `networkProfile` | integer | No | Network profile ID. |
| `firewallRulesets` | array | No | Array of firewall rulesets. This will override package settings. A value of -1 will force no rulesets to be applied. |
| `hypervisorAssetGroups` | array | No | Array of hypervisor asset groups. This will override package settings. A value of -1 will force no groups to be applied. |
| `additionalStorage1Enable` | boolean | No | Enable/disable additional storage 1. |
| `additionalStorage2Enable` | boolean | No | Enable/disable additional storage 2. |
| `additionalStorage1Profile` | integer | No | Additional storage 1 profile ID. |
| `additionalStorage2Profile` | integer | No | Additional storage 2 profile ID. |
| `additionalStorage1Capacity` | integer | No | Number of GB additional storage 1 capacity. |
| `additionalStorage2Capacity` | integer | No | Number of GB additional storage 2 capacity. |

**Example Request Body:**
```json
{
  "packageId": 1,
  "userId": 1,
  "hypervisorId": 1,
  "ipv4": 1,
  "storage": 20,
  "traffic": 20,
  "memory": 512,
  "cpuCores": 5,
  "networkSpeedInbound": 200,
  "networkSpeedOutbound": 400,
  "storageProfile": 1,
  "networkProfile": 1,
  "firewallRulesets": [
    1,
    2
  ],
  "hypervisorAssetGroups": [
    3,
    4
  ],
  "additionalStorage1Enable": true,
  "additionalStorage2Enable": false,
  "additionalStorage1Profile": 1,
  "additionalStorage2Profile": 2,
  "additionalStorage1Capacity": 10,
  "additionalStorage2Capacity": 20
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |
| `422` | (no description in spec) |

**Example Response (`201`):**
```json
{
  "data": {
    "id": 70,
    "ownerId": 1,
    "hypervisorId": 14,
    "arch": 1,
    "name": "",
    "selfService": 0,
    "selfServiceSettings": [],
    "hostname": null,
    "commissionStatus": 0,
    "uuid": "ab68e20a-211f-4b90-99f1-8ee9068c81de",
    "state": "allocated",
    "migratable": true,
    "timezone": "_default",
    "migrateLevel": 0,
    "deleteLevel": 0,
    "configLevel": 0,
    "backupLevel": 0,
    "elevated": false,
    "elevateId": null,
    "elevate": false,
    "destroyable": true,
    "rebuild": false,
    "suspended": false,
    "protected": false,
    "buildFailed": false,
    "primaryNetworkDhcp4": false,
    "primaryNetworkDhcp6": false,
    "built": null,
```
_(truncated — full example in `openapi.yaml` under `paths./servers.post.responses.201`)_

**Example Response (`422`):**
```json
{
  "errors": [
    "Invalid or disabled firewall ruleset"
  ]
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `GET /servers` — Retrieve servers (domains/servers.md)

---

### Modify name

`PUT /servers/{serverId}/modify/name`

**Purpose:**
Modify name

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `name` | string | Yes | The new name of the server. |

**Example Request Body:**
```json
{
  "name": "Server 1"
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /servers/{serverId}/modify/traffic` — Modify primary traffic allowance (domains/servers-network-traffic.md)
- `PUT /servers/{serverId}/modify/cpuThrottle` — Throttle a servers CPU (domains/servers.md)
- `PUT /servers/{serverId}/modify/memory` — Modify memory (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuCores` — Modify CPU cores (domains/servers.md)

---

### Reset a server password

`POST /servers/{serverId}/resetPassword`

**Purpose:**
Reset a server password

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `user` | string | Yes | Either root or Administrator. |
| `sendMail` | boolean | No | Optional (default true) Email the password to the user. (true|false). |

**Example Request Body:**
```json
{
  "user": "root",
  "sendMail": true
}
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "queueId": 176,
    "expectedPassword": "l1LMzm2JGhWYdjjn8JkC"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Retrieve a users servers

`GET /servers/user/{userId}`

**Purpose:**
Retrieve a users servers

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `userId` | integer | A valid user ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": [
    {
      "id": 9,
      "ownerId": 3,
      "hypervisorId": 6,
      "name": "server 1",
      "hostname": "server1.domain.com",
      "commissionStatus": 2,
      "uuid": "5de5a89b-b707-41bf-a051-7af1a4e67795",
      "state": "failed",
      "rebuild": false,
      "suspended": false,
      "protected": false,
      "buildFailed": false,
      "backup_level": 0,
      "backup_plan": null,
      "os": {
        "screen": "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"
      },
      "server_info": {
        "show": false,
        "icon": null,
        "name": null,
        "label": null
      },
      "vnc": {
        "expose_details": true,
        "ip": "192.168.4.2",
        "hostname": null,
```
_(truncated — full example in `openapi.yaml` under `paths./servers/user/{userId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Retrieve OS templates available to a server

`GET /servers/{serverId}/templates`

**Purpose:**
Retrieve OS templates available to a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": [
    {
      "name": "Debian",
      "description": "Debian GNU/Linux, is a Linux distribution composed of free and open-source software, developed by the community-supported Debian Project.",
      "icon": "debian_logo.png",
      "templates": [
        {
          "id": 8,
          "name": "Debian",
          "version": "11 (Bullseye)",
          "variant": "Minimal",
          "arch": 1,
          "description": "Minimal installation with limited packages. New packages are easily installed using Advanced Package Tool (APT), the main command-line package manager for Debian.",
          "icon": "debian_logo.png",
          "eol": false,
          "eol_date": "2024-03-12 00:00:00",
          "eol_warning": false,
          "deploy_type": 1,
          "vnc": false,
          "type": "linux"
        },
        {
          "id": 46,
          "name": "Debian",
          "version": "12 (Bookworm)",
          "variant": "Minimal",
          "arch": 1,
          "description": "Minimal installation with limited packages. New packages are easily installed using Advanced Package Tool (APT), the main command-line package manager for Debian.",
          "icon": "debian_logo.png",
```
_(truncated — full example in `openapi.yaml` under `paths./servers/{serverId}/templates.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Suspend a server

`POST /servers/{serverId}/suspend`

**Purpose:**
Suspend a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Throttle a servers CPU

`PUT /servers/{serverId}/modify/cpuThrottle`

**Purpose:**
Throttle a servers CPU

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `sync` | boolean | No | Synchronise and apply the defined percentage. true|false Defaults to false. |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `percent` | integer | Yes | The percentage the CPU should be throttled (0-99). |

**Example Request Body:**
```json
{
  "percent": 50
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /servers/{serverId}/modify/traffic` — Modify primary traffic allowance (domains/servers-network-traffic.md)
- `PUT /servers/{serverId}/modify/name` — Modify name (domains/servers.md)
- `PUT /servers/{serverId}/modify/memory` — Modify memory (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuCores` — Modify CPU cores (domains/servers.md)

---

### Retrieve a servers traffic statistics

`GET /servers/{serverId}/traffic`

**Purpose:**
Retrieve a servers traffic statistics

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "monthly": [
      {
        "month": 2,
        "start": "2025-01-06 00:00:00",
        "end": "2025-02-05 23:59:59",
        "rx": 1847110337,
        "tx": 1270421,
        "total": 1848380758,
        "limit": 20000,
        "blocks": [
          {
            "id": 2,
            "traffic": 100
          }
        ]
      },
      {
        "month": 1,
        "start": "2024-12-06 00:00:00",
        "end": "2025-01-05 23:59:59",
        "rx": 5650592916,
        "tx": 42336801,
        "total": 5692929717,
        "limit": 20000,
        "blocks": []
      }
    ]
  }
```
_(truncated — full example in `openapi.yaml` under `paths./servers/{serverId}/traffic.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /servers/{serverId}/traffic/blocks` — Retrieve a servers traffic blocks (domains/servers-network-traffic.md)
- `POST /servers/{serverId}/traffic/blocks` — Add a traffic block to a server (domains/servers-network-traffic.md)
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Unsuspend a server

`POST /servers/{serverId}/unsuspend`

**Purpose:**
Unsuspend a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Retrive VNC details

`GET /servers/{serverId}/vnc`

**Purpose:**
Retrive VNC details

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "vnc": {
      "ip": "192.168.4.2",
      "hostname": null,
      "port": 5903,
      "password": "ZNYonJeU",
      "wss": {
        "token": "69316231-d34a-4d36-b754-ffd3253df96d",
        "url": "/vnc/?token=69316231-d34a-4d36-b754-ffd3253df96d"
      },
      "enabled": false
    }
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Enable or disable VNC

`POST /servers/{serverId}/vnc`

**Purpose:**
Enable or disable VNC

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `action` | string | Yes | (no description in spec) Allowed values: `enable`, `disable`. |

**Example Request Body:**
```json
{
  "action": "enable"
}
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "vnc": {
      "ip": "192.168.4.2",
      "hostname": null,
      "port": 5903,
      "password": "ZNYonJeU",
      "wss": {
        "token": "69316231-d34a-4d36-b754-ffd3253df96d",
        "url": "/vnc/?token=69316231-d34a-4d36-b754-ffd3253df96d"
      },
      "enabled": false
    },
    "queueId": null
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Change owner

`PUT /servers/{serverId}/owner/{newOwnerId}`

**Purpose:**
Change owner

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `newOwnerId` | integer | A vailid user ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Modify memory

`PUT /servers/{serverId}/modify/memory`

**Purpose:**
Modify memory

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `memory` | integer | Yes | The new memory value in MB. |

**Example Request Body:**
```json
{
  "memory": 1024
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /servers/{serverId}/modify/traffic` — Modify primary traffic allowance (domains/servers-network-traffic.md)
- `PUT /servers/{serverId}/modify/name` — Modify name (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuThrottle` — Throttle a servers CPU (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuCores` — Modify CPU cores (domains/servers.md)

---

### Modify CPU cores

`PUT /servers/{serverId}/modify/cpuCores`

**Purpose:**
Modify CPU cores

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `cores` | integer | Yes | The new core value. |

**Example Request Body:**
```json
{
  "cores": 4
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /servers/{serverId}/modify/traffic` — Modify primary traffic allowance (domains/servers-network-traffic.md)
- `PUT /servers/{serverId}/modify/name` — Modify name (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuThrottle` — Throttle a servers CPU (domains/servers.md)
- `PUT /servers/{serverId}/modify/memory` — Modify memory (domains/servers.md)

---

### Set custom XML

`POST /servers/{serverId}/customXML`

**Purpose:**
Set custom XML

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `domain` | string | No | (no description in spec) |
| `os` | string | No | (no description in spec) |
| `devices` | string | No | (no description in spec) |
| `features` | string | No | (no description in spec) |
| `clock` | string | No | (no description in spec) |
| `cpuTune` | string | No | (no description in spec) |
| `domainEnabled` | boolean | No | (no description in spec) |
| `osEnabled` | boolean | No | (no description in spec) |
| `devicesEnabled` | boolean | No | (no description in spec) |
| `featuresEnabled` | boolean | No | (no description in spec) |
| `clockEnabled` | boolean | No | (no description in spec) |
| `cpuTuneEnabled` | boolean | No | (no description in spec) |

**Example Request Body:**
```json
{
  "domain": "<xml/>",
  "os": "<xml/>",
  "devices": "<xml/>",
  "features": "<xml/>",
  "clock": "<xml/>",
  "cpuTune": "<xml/>",
  "domainEnabled": true,
  "osEnabled": true,
  "devicesEnabled": true,
  "featuresEnabled": true,
  "clockEnabled": true,
  "cpuTuneEnabled": true
}
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
""
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)

---
