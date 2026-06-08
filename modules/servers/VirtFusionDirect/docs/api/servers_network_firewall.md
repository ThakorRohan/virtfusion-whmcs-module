# Servers/Network/Firewall API

## POST `/servers/{serverId}/firewall/{interface}/disable`

**Summary:** Disable firewall

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `interface` | `path` | Yes | `string` | primary or secondary. |
| `sync` | `query` | No | `boolean` | Synchronise and apply the defined rules. true|false Defaults to false. |

### Responses

#### `200`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/firewall/{interface}/enable`

**Summary:** Enable firewall

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `interface` | `path` | Yes | `string` | primary or secondary. |
| `sync` | `query` | No | `boolean` | Synchronise and apply the defined rules. true|false Defaults to false. |

### Responses

#### `200`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/servers/{serverId}/firewall/{interface}`

**Summary:** Retrieve firewall

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `interface` | `path` | Yes | `string` | primary or secondary. |
| `sync` | `query` | No | `boolean` | Synchronise and apply the defined rules. true|false Defaults to false. |

### Responses

#### `200`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## POST `/servers/{serverId}/firewall/{interface}/rules`

**Summary:** Apply firewall rulesets

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `interface` | `path` | Yes | `string` | primary or secondary. |
| `sync` | `query` | No | `boolean` | Synchronise and apply the defined rules. true|false Defaults to false. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  rulesets:
    type: array
    items:
      type: integer
    description: An array of ruleset IDs. All existing rules will be flushed and the
      new rules applied. An empty array will flush all rules.
required:
- rulesets
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

