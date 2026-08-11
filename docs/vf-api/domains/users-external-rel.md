<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Users/External Rel ID & Rel Str

6 operation(s). Canonical spec: `openapi.yaml` (tag: `Users/External Rel ID & Rel Str`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve a user

`GET /users/{extRelationId}/byExtRelation`

**Purpose:**
Retrieve a user

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
    "id": 3,
    "admin": false,
    "extRelationId": 1,
    "selfService": 3,
    "selfServiceHourlyGroupProfiles": [],
    "selfServiceResourceGroupProfiles": [],
    "selfServiceHourlyResourcePack": null,
    "name": "jon Doe",
    "email": "jon@doe.com",
    "timezone": "Europe/London",
    "suspended": false,
    "twoFactorAuth": false,
    "created": "2025-01-20T12:48:20.000000Z",
    "updated": "2025-01-20T13:00:38.000000Z"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /users/{extRelationId}/byExtRelation` — Modify a user (domains/users-external-rel.md)
- `DELETE /users/{extRelationId}/byExtRelation` — Delete a user (domains/users-external-rel.md)
- `POST /users/{extRelationId}/authenticationTokens` — Generate a set of login tokens (domains/users-external-rel.md)
- `POST /users/{extRelationId}/byExtRelation/resetPassword` — Change a user passowrd (domains/users-external-rel.md)

---

### Modify a user

`PUT /users/{extRelationId}/byExtRelation`

**Purpose:**
Modify a user

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
| `name` | string | No | Full name of the user. |
| `email` | string | No | Email address of the user. |
| `selfService` | integer | No | default disabled) 0 = disabled, 1 = hourly, 2 = resource packs, 3 = hourly & resource packs. |
| `selfServiceHourlyCredit` | boolean | No | Enable/disable credit balance billing for hourly self service. (true|false). |
| `selfServiceHourlyGroupProfiles` | array | No | (default none) array of self service hourly group profile ids. |
| `selfServiceResourceGroupProfiles` | array | No | (default none) array of self service resource group profile ids. |
| `selfServiceHourlyResourcePack` | integer | No | (default none) ID of an hourly self service resource pack. |
| `enabled` | boolean | No | (default false) Email the access credentials to the user. (true|false). |

**Example Request Body:**
```json
{
  "name": "jon Doe",
  "email": "jon@doe.com",
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
    "name": "jon Doe",
    "email": "jon@doe.com",
    "selfService": 3,
    "enabled": true
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /users/{extRelationId}/byExtRelation` — Retrieve a user (domains/users-external-rel.md)
- `DELETE /users/{extRelationId}/byExtRelation` — Delete a user (domains/users-external-rel.md)
- `POST /users/{extRelationId}/authenticationTokens` — Generate a set of login tokens (domains/users-external-rel.md)
- `POST /users/{extRelationId}/byExtRelation/resetPassword` — Change a user passowrd (domains/users-external-rel.md)

---

### Delete a user

`DELETE /users/{extRelationId}/byExtRelation`

**Purpose:**
Delete a user

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
- `GET /users/{extRelationId}/byExtRelation` — Retrieve a user (domains/users-external-rel.md)
- `PUT /users/{extRelationId}/byExtRelation` — Modify a user (domains/users-external-rel.md)
- `POST /users/{extRelationId}/authenticationTokens` — Generate a set of login tokens (domains/users-external-rel.md)
- `POST /users/{extRelationId}/byExtRelation/resetPassword` — Change a user passowrd (domains/users-external-rel.md)

---

### Generate a set of login tokens

`POST /users/{extRelationId}/authenticationTokens`

**Purpose:**
Generate a set of login tokens

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
    "authentication": {
      "tokens": {
        "1": "zYpEXpWEeXR4LfogW3xIomIJS5YW8woOjo18h9st6Sh23ReeTEeQNI1RSQWXYv1AImtQzFm0CLrn6Ve8VtIP3MfDnoRWHxQ334UU",
        "2": "RGzuQDFt0KsWgPozaTZDpuXy3aSsbj6VHWbz4JrhGoj0ZOvaGHUcXM6WGeGuNgfTUPLcy0SYMNJWmI1idC8uR88ZSs00XRnEtbG9"
      },
      "endpoint": "/token_authenticate",
      "endpoint_complete": "/token_authenticate/?1=zYpEXpWEeXR4LfogW3xIomIJS5YW8woOjo18h9st6Sh23ReeTEeQNI1RSQWXYv1AImtQzFm0CLrn6Ve8VtIP3MfDnoRWHxQ334UU&2=RGzuQDFt0KsWgPozaTZDpuXy3aSsbj6VHWbz4JrhGoj0ZOvaGHUcXM6WGeGuNgfTUPLcy0SYMNJWmI1idC8uR88ZSs00XRnEtbG9",
      "expiry": {
        "ttl": 60,
        "expires": "2025-01-20T12:49:52.170943Z"
      }
    }
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /users/{extRelationId}/byExtRelation` — Retrieve a user (domains/users-external-rel.md)
- `PUT /users/{extRelationId}/byExtRelation` — Modify a user (domains/users-external-rel.md)
- `DELETE /users/{extRelationId}/byExtRelation` — Delete a user (domains/users-external-rel.md)

---

### Generate a set of login tokens using a server ID

`POST /users/{extRelationId}/serverAuthenticationTokens/{serverId}`

**Purpose:**
Generate a set of login tokens using a server ID

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `extRelationId` | string | A valid external relational ID as shown in VirtFusion. |
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
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
    "authentication": {
      "tokens": {
        "1": "oIGBk2qEYTXKMGbaDVbpRFqwQC57Rzl5zWKhwQkgDbRBeXSTH865Bvv0Fm8oY6b0xYpH22xbLAKarOAy28PnToxRu5InfmkIHmo0",
        "2": "WwiZ9XwqKM5jNGgCsCsUD4B6DDxAKeolJu3dBN7lsK1uGDVvElvfH77sDyukRIzTbbEI6fggKBXuSYRaYc5FqMab4L6PB0QcOxr9"
      },
      "endpoint": "/token_authenticate",
      "endpoint_complete": "/token_authenticate/?1=oIGBk2qEYTXKMGbaDVbpRFqwQC57Rzl5zWKhwQkgDbRBeXSTH865Bvv0Fm8oY6b0xYpH22xbLAKarOAy28PnToxRu5InfmkIHmo0&2=WwiZ9XwqKM5jNGgCsCsUD4B6DDxAKeolJu3dBN7lsK1uGDVvElvfH77sDyukRIzTbbEI6fggKBXuSYRaYc5FqMab4L6PB0QcOxr9",
      "expiry": {
        "ttl": 60,
        "expires": "2025-01-20T12:52:59.761522Z"
      }
    }
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Change a user passowrd

`POST /users/{extRelationId}/byExtRelation/resetPassword`

**Purpose:**
Change a user passowrd

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
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`201`):**
```json
{
  "data": {
    "email": "jon@doe.com",
    "password": "zD2VqFKO554tdfWKOmGhw"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /users/{extRelationId}/byExtRelation` — Retrieve a user (domains/users-external-rel.md)
- `PUT /users/{extRelationId}/byExtRelation` — Modify a user (domains/users-external-rel.md)
- `DELETE /users/{extRelationId}/byExtRelation` — Delete a user (domains/users-external-rel.md)

---
