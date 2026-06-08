# Self Service/External Relational ID API

## POST `/selfService/credit/byUserExtRelationId/{extRelationId}`

**Summary:** Add credit to user

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
  tokens:
    type: number
    description: A numeric token value.
  reference_1:
    type: integer
    description: ' An optional reference number. Max 64-bit integer.'
  reference_2:
    type: string
    description: An optional reference in string format. Max 1000 character.
required:
- tokens
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

## POST `/selfService/hourlyGroupProfile/byUserExtRelationId/{extRelationId}`

**Summary:** Add an hourly group profile to a user

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
  profileId:
    type: integer
    description: ID of an hourly group profile.
required:
- profileId
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

## POST `/selfService/resourceGroupProfile/byUserExtRelationId/{extRelationId}`

**Summary:** Add a resource group profile to a user

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
  profileId:
    type: integer
    description: ID a resource group profile.
required:
- profileId
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

## POST `/selfService/resourcePack/byUserExtRelationId/{extRelationId}`

**Summary:** Add a resource pack to a user

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
  packId:
    type: integer
    description: ID of a resource pack.
  enabled:
    type: boolean
    description: Enable the pack. true|false defaults too true.
required:
- packId
- enabled
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

## GET `/selfService/hourlyStats/byUserExtRelationId/{extRelationId}`

**Summary:** Retrieve hourly statistics

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `period[]` | `query` | No | `string` | Example: period[]=YYYY-MM-DD&period[]=YYYY-MM-D |
| `range` | `query` | No | `string` | range=m |
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

## PUT `/selfService/access/byUserExtRelationId/{extRelationId}`

**Summary:** Modify user access

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
  syncToProfiles:
    type: boolean
    description: true|false Default false. If true, the self service access level
      will be set based on profiles.
required:
- syncToProfiles
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

## DELETE `/selfService/hourlyGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}`

**Summary:** Remove hourly group profile from a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `profileId` | `path` | Yes | `integer` | ID of a hourly group profile. |
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

## DELETE `/selfService/resourceGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}`

**Summary:** Remove resource group from a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `profileId` | `path` | Yes | `integer` | ID of a hourly group profile. |
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

## GET `/selfService/report/byUserExtRelationId/{extRelationId}`

**Summary:** Generate a report

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `period` | `query` | No | `string` | A single period in the range of 0-24 (0 being the currently defined month in the self service settings | optional and will default to the current month if not defined). |
| `currency` | `query` | No | `string` | A three letter currency code that is defined in the self service settings. (optional and will default to the user defined currency if not defined). |
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

## PUT `/selfService/hourlyResourcePack/byUserExtRelationId/{extRelationId}`

**Summary:** Set an hourly resource pack

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
  packId:
    type: integer
    description: ID of an hourly resource pack.
required:
- packId
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

## GET `/selfService/usage/byUserExtRelationId/{extRelationId}`

**Summary:** Retrieve a users usage

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `extRelationId` | `path` | Yes | `string` | A valid external relational ID as shown in VirtFusion. |
| `period[]` | `query` | No | `string` | Array of periods or a single period. (YYYY-MM-DD). |
| `range` | `query` | No | `string` | Length of period. Defaults to 1 month. Possible values d = day, w = week, 2w = 2 weeks, 3w = 3 weeks, m = month. |
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

