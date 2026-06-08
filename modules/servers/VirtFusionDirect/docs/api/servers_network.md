# Servers/Network API

## POST `/servers/{serverId}/networkWhitelist`

**Summary:** Add an address to the whitelist

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  interface:
    type: string
    description: Primary or secondary.
  ip:
    type: string
    description: IPv4 or IPv6 address.
  cidr:
    type: integer
    description: IPv4 or IPv6 CIDR.
required:
- interface
- ip
- cidr
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

## DELETE `/servers/{serverId}/networkWhitelist`

**Summary:** Remove an address from the whitelist

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  interface:
    type: string
    description: Primary or secondary.
  ip:
    type: string
    description: IPv4 or IPv6 address.
required:
- interface
- ip
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

## POST `/servers/{serverId}/ipv4Qty`

**Summary:** Add a quantity of IPv4 addresses

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  interface:
    type: string
    description: Primary or secondary.
  quantity:
    type: integer
    description: Number of IPv4 addresses.
required:
- interface
- quantity
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

## POST `/servers/{serverId}/ipv4`

**Summary:** Add an array of IPv4 addresses

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  ip:
    type: array
    items:
      type: string
required:
- ip
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

## DELETE `/servers/{serverId}/ipv4`

**Summary:** Remove an array of IPv4 addresses

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  ip:
    type: array
    items:
      type: string
      description: Valid IPv4 addresses.
    description: Valid IPv4 addresses.
required:
- ip
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

