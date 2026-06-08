# Self Service API

## DELETE `/selfService/credit/{creditId}`

**Summary:** Cancel credit that was applied to a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `creditId` | `path` | Yes | `integer` | A valid credit ID. |

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

## DELETE `/selfService/resourcePackServers/{packId}`

**Summary:** Delete all servers attached to a pack ID

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packId` | `path` | Yes | `integer` | ID of a resource pack. |
| `delay` | `query` | No | `integer` | The delay in minutes. Defaults to 30 (0 - 43800). |

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

## DELETE `/selfService/resourcePack/{packId}`

**Summary:** Delete a user resource pack

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packId` | `path` | Yes | `integer` | ID of a resource pack. |
| `disable` | `query` | No | `boolean` | Disable the pack if it can't be deleted. true|false Defaults to false. |

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

## GET `/selfService/resourcePack/{packId}`

**Summary:** Retrieve a user resource pack

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packId` | `path` | Yes | `integer` | ID of a resource pack. |
| `withServers` | `query` | No | `boolean` | include a list of assigned servers. true|false Defaults to false. |

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

## PUT `/selfService/resourcePack/{packId}`

**Summary:** Modify user resource pack

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packId` | `path` | Yes | `integer` | ID of a resource pack. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  enabled:
    type: boolean
required:
- enabled
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

## GET `/selfService/currencies`

**Summary:** Retrieve currencies

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

## POST `/selfService/resourcePackServers/{packId}/suspend`

**Summary:** Suspend all servers assigned to a reosurce pack

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packId` | `path` | Yes | `integer` | ID of a resource pack. |

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

## POST `/selfService/resourcePackServers/{packId}/unsuspend`

**Summary:** Unsuspend all servers assigned to a reosurce pack

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packId` | `path` | Yes | `integer` | ID of a resource pack. |

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

