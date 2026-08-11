<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Users

1 operation(s). Canonical spec: `openapi.yaml` (tag: `Users`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Create a user

`POST /users`

**Purpose:**
Create a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
None.

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `name` | string | Yes | Full name of the user. |
| `email` | string | Yes | Email address of the user. |
| `extRelationId` | integer | No | Relation ID. |
| `relStr` | string | No | Relational string. |
| `selfService` | integer | No | (default disabled) 0 = disabled, 1 = hourly, 2 = resource packs, 3 = hourly & resource packs. |
| `selfServiceHourlyCredit` | boolean | No | Enable/disable credit balance billing for hourly self service. (true|false). |
| `selfServiceHourlyGroupProfiles` | array | No | (default none) array of self service hourly group profile ids. |
| `selfServiceResourceGroupProfiles` | array | No | (default none) array of self service resource group profile ids. |
| `selfServiceHourlyResourcePack` | integer | No | (default none) ID of an hourly self service resource pack. |
| `sendMail` | boolean | No | (default false) Email the access credentials to the user. (true|false). |

**Example Request Body:**
```json
{
  "name": "Jon Doe",
  "email": "jon@doe.com",
  "extRelationId": 1,
  "selfService": 3,
  "selfServiceHourlyCredit": true,
  "selfServiceHourlyGroupProfiles": [
    1,
    2,
    3
  ],
  "selfServiceResourceGroupProfiles": [
    4,
    5,
    6
  ],
  "selfServiceHourlyResourcePack": 1,
  "sendMail": false
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
    "id": 2,
    "admin": false,
    "extRelationId": 1,
    "selfService": 3,
    "selfServiceHourlyGroupProfiles": [],
    "selfServiceResourceGroupProfiles": [],
    "selfServiceHourlyResourcePack": null,
    "name": "Jon Doe",
    "email": "jon@doe.com",
    "timezone": "Europe/London",
    "suspended": false,
    "twoFactorAuth": false,
    "created": "2025-01-20T12:41:28.000000Z",
    "updated": "2025-01-20T12:41:28.000000Z",
    "password": "0hPZSAmj8Tgq1noGoenxpxlC9xf1tc"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
