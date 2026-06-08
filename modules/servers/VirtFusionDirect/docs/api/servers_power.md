# Servers/Power API

## POST `/servers/{serverId}/power/boot`

**Summary:** Boot a server

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

## POST `/servers/{serverId}/power/shutdown`

**Summary:** Shutdown a server

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

## POST `/servers/{serverId}/power/restart`

**Summary:** Restart a server

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

## POST `/servers/{serverId}/power/poweroff`

**Summary:** Poweroff a server

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

