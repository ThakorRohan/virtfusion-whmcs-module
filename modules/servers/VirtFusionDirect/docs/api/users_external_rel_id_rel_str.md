# Users/External Rel ID & Rel Str API

## DELETE `/users/{extRelationId}/byExtRelation`

**Summary:** Delete a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `relStr` | `query` | No | `boolean` |  |

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

## PUT `/users/{extRelationId}/byExtRelation`

**Summary:** Modify a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `relStr` | `query` | No | `boolean` |  |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  name:
    type: string
    description: Full name of the user.
  email:
    type: string
    description: Email address of the user.
  selfService:
    type: integer
    description: default disabled) 0 = disabled, 1 = hourly, 2 = resource packs, 3
      = hourly & resource packs.
  selfServiceHourlyCredit:
    type: boolean
    description: Enable/disable credit balance billing for hourly self service. (true|false).
  selfServiceHourlyGroupProfiles:
    type: array
    items:
      type: integer
    description: (default none) array of self service hourly group profile ids.
  selfServiceResourceGroupProfiles:
    type: array
    items:
      type: integer
    description: (default none) array of self service resource group profile ids.
  selfServiceHourlyResourcePack:
    type: integer
    description: (default none) ID of an hourly self service resource pack.
  enabled:
    type: boolean
    description: (default false) Email the access credentials to the user. (true|false).
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

---

## GET `/users/{extRelationId}/byExtRelation`

**Summary:** Retrieve a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `relStr` | `query` | No | `boolean` |  |

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

## POST `/users/{extRelationId}/authenticationTokens`

**Summary:** Generate a set of login tokens

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `relStr` | `query` | No | `boolean` |  |

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

## POST `/users/{extRelationId}/serverAuthenticationTokens/{serverId}`

**Summary:** Generate a set of login tokens using a server ID

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |
| `relStr` | `query` | No | `boolean` |  |

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

## POST `/users/{extRelationId}/byExtRelation/resetPassword`

**Summary:** Change a user passowrd

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `relStr` | `query` | No | `boolean` |  |

### Responses

#### `201`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

