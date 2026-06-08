# Servers/Network/Traffic API

## POST `/servers/{serverId}/traffic/blocks`

**Summary:** Add a traffic block to a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  month:
    type: integer
    description: The numeric month as returned by the GET request (available).
  amount:
    type: integer
    description: An amount of traffic in GB.
required:
- month
- amount
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

## GET `/servers/{serverId}/traffic/blocks`

**Summary:** Retrieve a servers traffic blocks

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  month:
    type: integer
    description: The numeric month as returned by the GET request (available).
  amount:
    type: integer
    description: An amount of traffic in GB.
required:
- month
- amount
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

## DELETE `/servers/{serverId}/traffic/blocks/{blockId}`

**Summary:** Remove a traffic block from a server

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `blockId` | `path` | Yes | `string` | ID of an assigned traffic block as returned by the GET request (assigned). |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  month:
    type: integer
    description: The numeric month as returned by the GET request (available).
  amount:
    type: integer
    description: An amount of traffic in GB.
required:
- month
- amount
```

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

## PUT `/servers/{serverId}/modify/traffic`

**Summary:** Modify primary traffic allowance

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  traffic:
    type: string
    description: Range of 0 - 999999999
required:
- traffic
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

