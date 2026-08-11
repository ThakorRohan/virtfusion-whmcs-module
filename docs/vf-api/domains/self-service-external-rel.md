<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Self Service/External Relational ID

11 operation(s). Canonical spec: `openapi.yaml` (tag: `Self Service/External Relational ID`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Add credit to user

`POST /selfService/credit/byUserExtRelationId/{extRelationId}`

**Purpose:**
Add credit to user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `tokens` | number | Yes | A numeric token value. |
| `reference_1` | integer | No | An optional reference number. Max 64-bit integer. |
| `reference_2` | string | No | An optional reference in string format. Max 1000 character. |

**Example Request Body:**
```json
{
  "tokens": 100,
  "reference_1": 400,
  "reference_2": "This is a string reference with a 1000 character limit."
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`201`):**
```json
{
  "data": {
    "id": 2
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Add an hourly group profile to a user

`POST /selfService/hourlyGroupProfile/byUserExtRelationId/{extRelationId}`

**Purpose:**
Add an hourly group profile to a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `profileId` | integer | Yes | ID of an hourly group profile. |

**Example Request Body:**
```json
{
  "profileId": 1
}
```

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Add a resource group profile to a user

`POST /selfService/resourceGroupProfile/byUserExtRelationId/{extRelationId}`

**Purpose:**
Add a resource group profile to a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `profileId` | integer | Yes | ID a resource group profile. |

**Example Request Body:**
```json
{
  "profileId": 1
}
```

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Add a resource pack to a user

`POST /selfService/resourcePack/byUserExtRelationId/{extRelationId}`

**Purpose:**
Add a resource pack to a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `packId` | integer | Yes | ID of a resource pack. |
| `enabled` | boolean | Yes | Enable the pack. true|false defaults too true. |

**Example Request Body:**
```json
{
  "packId": 1,
  "enabled": true
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`201`):**
```json
{
  "data": {
    "id": 17
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Retrieve hourly statistics

`GET /selfService/hourlyStats/byUserExtRelationId/{extRelationId}`

**Purpose:**
Retrieve hourly statistics

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `period[]` | string | No | Example: period[]=YYYY-MM-DD&period[]=YYYY-MM-D |
| `range` | string | No | range=m |
| `relStr` | boolean | No | (no description in spec) |

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
    "periodId": 0,
    "period": "January 2025",
    "previousPeriod": "December 2024",
    "nextPeriod": "February 2025",
    "monthlyTotal": {
      "hours": 0,
      "value": "0.00",
      "tokens": false
    },
    "servers": 0,
    "credit": {
      "value": 0
    },
    "currency": {
      "code": "",
      "prefix": "",
      "suffix": "",
      "value": 0,
      "currentValue": 0
    }
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Modify user access

`PUT /selfService/access/byUserExtRelationId/{extRelationId}`

**Purpose:**
Modify user access

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `syncToProfiles` | boolean | Yes | true|false Default false. If true, the self service access level will be set based on profiles. |

**Example Request Body:**
```json
{
  "syncToProfiles": true
}
```

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Remove hourly group profile from a user

`DELETE /selfService/hourlyGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}`

**Purpose:**
Remove hourly group profile from a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `profileId` | integer | ID of a hourly group profile. |
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

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
None sharing this path prefix in the spec.

---

### Remove resource group from a user

`DELETE /selfService/resourceGroupProfile/{profileId}/byUserExtRelationId/{extRelationId}`

**Purpose:**
Remove resource group from a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `profileId` | integer | ID of a hourly group profile. |
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

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
None sharing this path prefix in the spec.

---

### Generate a report

`GET /selfService/report/byUserExtRelationId/{extRelationId}`

**Purpose:**
Generate a report

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `period` | string | No | A single period in the range of 0-24 (0 being the currently defined month in the self service settings | optional and will default to the current month if not defined). |
| `currency` | string | No | A three letter currency code that is defined in the self service settings. (optional and will default to the user defined currency if not defined). |
| `relStr` | boolean | No | (no description in spec) |

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
    "usage": {
      "servers": [],
      "serversTotal": {
        "hours": false,
        "value": false,
        "tokens": false
      },
      "hourConversionRate": false,
      "monthlyTotal": {
        "hours": false,
        "value": false,
        "tokens": false
      },
      "addonsTotal": {
        "hours": 0,
        "value": 0,
        "tokens": false
      },
      "taxStatus": 3,
      "success": false,
      "history": "0",
      "breakdown": true,
      "term": "January 2025",
      "previousTerm": "December 2024",
      "nextTerm": "February 2025",
      "period": {
        "ymd": "2025-01-01",
        "start": "2025-01-01T00:00:00+00:00",
```
_(truncated — full example in `openapi.yaml` under `paths./selfService/report/byUserExtRelationId/{extRelationId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Set an hourly resource pack

`PUT /selfService/hourlyResourcePack/byUserExtRelationId/{extRelationId}`

**Purpose:**
Set an hourly resource pack

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `relStr` | boolean | No | (no description in spec) |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `packId` | integer | Yes | ID of an hourly resource pack. |

**Example Request Body:**
```json
{
  "packId": 1
}
```

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Retrieve a users usage

`GET /selfService/usage/byUserExtRelationId/{extRelationId}`

**Purpose:**
Retrieve a users usage

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `period[]` | string | No | Array of periods or a single period. (YYYY-MM-DD). |
| `range` | string | No | Length of period. Defaults to 1 month. Possible values d = day, w = week, 2w = 2 weeks, 3w = 3 weeks, m = month. |
| `relStr` | boolean | No | (no description in spec) |

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
    "user": {
      "id": 3,
      "relationalId": 1,
      "currency": null,
      "timezone": "Europe/London",
      "name": "jon Doe",
      "email": "jon@doe.com"
    },
    "usageServers": {
      "hours": 0,
      "token": 0,
      "tokenReal": 0
    },
    "usageServersBillable": {
      "hours": 0,
      "token": 0,
      "tokenReal": 0
    },
    "usageAddons": {
      "hours": 0,
      "token": 0,
      "tokenReal": 0
    },
    "usageAddonsBillable": {
      "hours": 0,
      "token": 0,
      "tokenReal": 0
    },
```
_(truncated — full example in `openapi.yaml` under `paths./selfService/usage/byUserExtRelationId/{extRelationId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
