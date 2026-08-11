<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Self Service

8 operation(s). Canonical spec: `openapi.yaml` (tag: `Self Service`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Cancel credit that was applied to a user

`DELETE /selfService/credit/{creditId}`

**Purpose:**
Cancel credit that was applied to a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `creditId` | integer | A valid credit ID. |

**Query Parameters:**
None.

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

### Delete all servers attached to a pack ID

`DELETE /selfService/resourcePackServers/{packId}`

**Purpose:**
Delete all servers attached to a pack ID

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packId` | integer | ID of a resource pack. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `delay` | integer | No | The delay in minutes. Defaults to 30 (0 - 43800). |

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
- `POST /selfService/resourcePackServers/{packId}/suspend` — Suspend all servers assigned to a reosurce pack (domains/self-service.md)
- `POST /selfService/resourcePackServers/{packId}/unsuspend` — Unsuspend all servers assigned to a reosurce pack (domains/self-service.md)

---

### Retrieve a user resource pack

`GET /selfService/resourcePack/{packId}`

**Purpose:**
Retrieve a user resource pack

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packId` | integer | ID of a resource pack. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `withServers` | boolean | No | include a list of assigned servers. true|false Defaults to false. |

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
    "type": "pack",
    "id": 18,
    "pid": 9,
    "label": null,
    "name": "Pack 2 \u00b7 2  / 4096 / 250",
    "limits": {
      "total_servers": 2,
      "total_memory": 4096,
      "total_storage": 200,
      "total_cpu": 24,
      "total_traffic": 1000000,
      "max_memory": 4096,
      "max_storage": 10,
      "max_cpu": 8,
      "max_traffic": 500000
    },
    "used": {
      "servers": 0,
      "memory": 0,
      "storage": 0,
      "cpu": 0,
      "traffic": 0
    },
    "usage": {
      "servers": {
        "t": 2,
        "u": 0,
        "f": 2,
```
_(truncated — full example in `openapi.yaml` under `paths./selfService/resourcePack/{packId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /selfService/resourcePack/{packId}` — Modify user resource pack (domains/self-service.md)
- `DELETE /selfService/resourcePack/{packId}` — Delete a user resource pack (domains/self-service.md)

---

### Modify user resource pack

`PUT /selfService/resourcePack/{packId}`

**Purpose:**
Modify user resource pack

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packId` | integer | ID of a resource pack. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `enabled` | boolean | Yes | (no description in spec) |

**Example Request Body:**
```json
{
  "enabled": true
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
- `GET /selfService/resourcePack/{packId}` — Retrieve a user resource pack (domains/self-service.md)
- `DELETE /selfService/resourcePack/{packId}` — Delete a user resource pack (domains/self-service.md)

---

### Delete a user resource pack

`DELETE /selfService/resourcePack/{packId}`

**Purpose:**
Delete a user resource pack

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packId` | integer | ID of a resource pack. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `disable` | boolean | No | Disable the pack if it can't be deleted. true|false Defaults to false. |

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
- `GET /selfService/resourcePack/{packId}` — Retrieve a user resource pack (domains/self-service.md)
- `PUT /selfService/resourcePack/{packId}` — Modify user resource pack (domains/self-service.md)

---

### Retrieve currencies

`GET /selfService/currencies`

**Purpose:**
Retrieve currencies

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
None.

**Query Parameters:**
None.

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
  "data": [
    {
      "id": 11,
      "code": "USD",
      "value": "0.0100000000",
      "prefix": "$",
      "suffix": null,
      "default": true,
      "enabled": true
    },
    {
      "id": 12,
      "code": "GBP",
      "value": "0.0200000000",
      "prefix": "\u00a3",
      "suffix": null,
      "default": false,
      "enabled": true
    }
  ]
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Suspend all servers assigned to a reosurce pack

`POST /selfService/resourcePackServers/{packId}/suspend`

**Purpose:**
Suspend all servers assigned to a reosurce pack

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packId` | integer | ID of a resource pack. |

**Query Parameters:**
None.

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
- `DELETE /selfService/resourcePackServers/{packId}` — Delete all servers attached to a pack ID (domains/self-service.md)
- `POST /selfService/resourcePackServers/{packId}/unsuspend` — Unsuspend all servers assigned to a reosurce pack (domains/self-service.md)

---

### Unsuspend all servers assigned to a reosurce pack

`POST /selfService/resourcePackServers/{packId}/unsuspend`

**Purpose:**
Unsuspend all servers assigned to a reosurce pack

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packId` | integer | ID of a resource pack. |

**Query Parameters:**
None.

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
- `DELETE /selfService/resourcePackServers/{packId}` — Delete all servers attached to a pack ID (domains/self-service.md)
- `POST /selfService/resourcePackServers/{packId}/suspend` — Suspend all servers assigned to a reosurce pack (domains/self-service.md)

---
