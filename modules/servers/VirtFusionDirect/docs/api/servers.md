# Servers API

## GET `/servers/{serverId}`

**Summary:** Retrieve a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `remoteState` | `query` | No | `boolean` | Return the remote state of the server. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## DELETE `/servers/{serverId}`

**Summary:** Delete a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `delay` | `query` | No | `integer` | How many minutes the system should wait before deleting the server. (0-43800) |

### Responses

#### `204`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/backups/plan/{planId}`

**Summary:** Add, remove or modify a backup plan

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `planId` | `path` | Yes | `integer` | A valid backup plan ID as shown in VirtFusion. A value of 0 (zero) will remove the plan. |

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/build`

**Summary:** Build a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  operatingSystemId:
    type: integer
    description: A valid operating system template ID.
  name:
    type: string
    description: Server name.
  hostname:
    type: string
    description: Server Hostname.
  sshKeys:
    type: array
    items:
      type: integer
    description: An array of SSH keys.
  vnc:
    type: boolean
    description: Enable/disable.
  ipv6:
    type: boolean
    description: Enable/disable.
  email:
    type: boolean
    description: Enable/disable.
  swap:
    type: number
    description: Values of 256, 512, 768, 1, 1.5, 2, 3, 4, 5,6 8
required:
- operatingSystemId
```

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/package/{packageId}`

**Summary:** Change a server package

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `packageId` | `path` | Yes | `integer` | A valid package ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  backupPlan:
    type: boolean
  cpu:
    type: boolean
  memory:
    type: boolean
  primaryDiskReadIOPS:
    type: boolean
  primaryDiskReadThroughput:
    type: boolean
  primaryDiskSize:
    type: boolean
  primaryDiskWriteIOPS:
    type: boolean
  primaryDiskWriteThroughput:
    type: boolean
  primaryNetworkInboundSpeed:
    type: boolean
  primaryNetworkOutboundSpeed:
    type: boolean
  primaryNetworkTraffic:
    type: boolean
```

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers`

**Summary:** Create a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `dryRun` | `query` | No | `boolean` | Test to see if a server can be created without actual creation. true|false Defaults to false. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  packageId:
    type: integer
    description: A valid package ID.
  userId:
    type: integer
    description: A valid user ID.
  hypervisorId:
    type: integer
    description: A valid hypervisor group ID.
  ipv4:
    type: integer
    description: Number of IPv4 addresses.
  storage:
    type: integer
    description: Number of GB primary storage.
  traffic:
    type: integer
    description: Number of GB traffic (0=unlimited).
  memory:
    type: integer
    description: Number of MB memory.
  cpuCores:
    type: integer
    description: Number of CPU cores.
  networkSpeedInbound:
    type: integer
    description: Inbound network speed (kB/s).
  networkSpeedOutbound:
    type: integer
    description: Outbound network speed (kB/s).
  storageProfile:
    type: integer
    description: Storage profile ID.
  networkProfile:
    type: integer
    description: Network profile ID.
  firewallRulesets:
    type: array
    items:
      type: integer
    description: Array of firewall rulesets. This will override package settings.
      A value of -1 will force no rulesets to be applied.
  hypervisorAssetGroups:
    type: array
    items:
      type: integer
    description: Array of hypervisor asset groups. This will override package settings.
      A value of -1 will force no groups to be applied.
  additionalStorage1Enable:
    type: boolean
    description: Enable/disable additional storage 1.
  additionalStorage2Enable:
    type: boolean
    description: Enable/disable additional storage 2.
  additionalStorage1Profile:
    type: integer
    description: Additional storage 1 profile ID.
  additionalStorage2Profile:
    type: integer
    description: Additional storage 2 profile ID.
  additionalStorage1Capacity:
    type: integer
    description: Number of GB additional storage 1 capacity.
  additionalStorage2Capacity:
    type: integer
    description: Number of GB additional storage 2 capacity.
required:
- packageId
- userId
- hypervisorId
```

### Responses

#### `201`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

#### `422`

**application/json Schema:**
```yaml
type: object
properties: {}
```

---

## GET `/servers`

**Summary:** Retrieve servers

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `type` | `query` | No | `string` | simple or full. Defaults to simple. |
| `results` | `query` | No | `integer` | Number of results to return. Range between 1 and 200. Defaults to 20. |
| `hypervisorId` | `query` | No | `integer` | Filter by hypervisor ID. Specify multiple with hypervisorId[]=1&hypervisorId[]=2 etc... |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/modify/name`

**Summary:** Modify name

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  name:
    type: string
    description: The new name of the server.
required:
- name
```

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/resetPassword`

**Summary:** Reset a server password

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  user:
    type: string
    description: Either root or Administrator.
  sendMail:
    type: boolean
    description: Optional (default true) Email the password to the user. (true|false).
required:
- user
```

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/servers/user/{userId}`

**Summary:** Retrieve a users servers

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `userId` | `path` | Yes | `integer` | A valid user ID as shown in VirtFusion. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/servers/{serverId}/templates`

**Summary:** Retrieve OS templates available to a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/suspend`

**Summary:** Suspend a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Responses

#### `204`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/modify/cpuThrottle`

**Summary:** Throttle a servers CPU

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `sync` | `query` | No | `boolean` | Synchronise and apply the defined percentage. true|false Defaults to false. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  percent:
    type: integer
    description: The percentage the CPU should be throttled (0-99).
required:
- percent
```

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/servers/{serverId}/traffic`

**Summary:** Retrieve a servers traffic statistics

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/unsuspend`

**Summary:** Unsuspend a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Responses

#### `204`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/vnc`

**Summary:** Enable or disable VNC

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  action:
    type: string
    enum:
    - enable
    - disable
required:
- action
```

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/servers/{serverId}/vnc`

**Summary:** Retrive VNC details

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/owner/{newOwnerId}`

**Summary:** Change owner

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `newOwnerId` | `path` | Yes | `integer` | A vailid user ID as shown in VirtFusion. |

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/modify/memory`

**Summary:** Modify memory

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  memory:
    type: integer
    description: The new memory value in MB.
    minimum: 256
required:
- memory
```

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## PUT `/servers/{serverId}/modify/cpuCores`

**Summary:** Modify CPU cores

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  cores:
    type: integer
    description: The new core value.
    minimum: 1
    maximum: 600
required:
- cores
```

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/customXML`

**Summary:** Set custom XML

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  domain:
    type: string
  os:
    type: string
  devices:
    type: string
  features:
    type: string
  clock:
    type: string
  cpuTune:
    type: string
  domainEnabled:
    type: boolean
  osEnabled:
    type: boolean
  devicesEnabled:
    type: boolean
  featuresEnabled:
    type: boolean
  clockEnabled:
    type: boolean
  cpuTuneEnabled:
    type: boolean
```

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

