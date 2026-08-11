<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Servers/Network/Traffic

4 operation(s). Canonical spec: `openapi.yaml` (tag: `Servers/Network/Traffic`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve a servers traffic blocks

`GET /servers/{serverId}/traffic/blocks`

**Purpose:**
Retrieve a servers traffic blocks

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `month` | integer | Yes | The numeric month as returned by the GET request (available). |
| `amount` | integer | Yes | An amount of traffic in GB. |

**Example Request Body:**
```json
""
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "assigned": [
      {
        "id": 2,
        "current": false,
        "month": 2,
        "traffic": 100,
        "start": "2025-02-20 00:00:00",
        "end": "2025-03-19 23:59:59",
        "added": "2025-01-20T15:08:15.000000Z"
      }
    ],
    "available": {
      "total": 25,
      "current": {
        "month": 1,
        "start": "2025-01-20 00:00:00",
        "end": "2025-02-19 23:59:59"
      },
      "months": {
        "1": {
          "month": 1,
          "start": "2025-01-20 00:00:00",
          "end": "2025-02-19 23:59:59"
        },
        "2": {
          "month": 2,
          "start": "2025-02-20 00:00:00",
          "end": "2025-03-19 23:59:59"
```
_(truncated — full example in `openapi.yaml` under `paths./servers/{serverId}/traffic/blocks.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/traffic/blocks` — Add a traffic block to a server (domains/servers-network-traffic.md)
- `DELETE /servers/{serverId}/traffic/blocks/{blockId}` — Remove a traffic block from a server (domains/servers-network-traffic.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)

---

### Add a traffic block to a server

`POST /servers/{serverId}/traffic/blocks`

**Purpose:**
Add a traffic block to a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `month` | integer | Yes | The numeric month as returned by the GET request (available). |
| `amount` | integer | Yes | An amount of traffic in GB. |

**Example Request Body:**
```json
{
  "month": 2,
  "amount": 100
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /servers/{serverId}/traffic/blocks` — Retrieve a servers traffic blocks (domains/servers-network-traffic.md)
- `DELETE /servers/{serverId}/traffic/blocks/{blockId}` — Remove a traffic block from a server (domains/servers-network-traffic.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)

---

### Remove a traffic block from a server

`DELETE /servers/{serverId}/traffic/blocks/{blockId}`

**Purpose:**
Remove a traffic block from a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `blockId` | string | ID of an assigned traffic block as returned by the GET request (assigned). |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `month` | integer | Yes | The numeric month as returned by the GET request (available). |
| `amount` | integer | Yes | An amount of traffic in GB. |

**Example Request Body:**
```json
{
  "month": 2,
  "amount": 100
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
- `GET /servers/{serverId}/traffic/blocks` — Retrieve a servers traffic blocks (domains/servers-network-traffic.md)
- `POST /servers/{serverId}/traffic/blocks` — Add a traffic block to a server (domains/servers-network-traffic.md)

---

### Modify primary traffic allowance

`PUT /servers/{serverId}/modify/traffic`

**Purpose:**
Modify primary traffic allowance

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `traffic` | string | Yes | Range of 0 - 999999999 |

**Example Request Body:**
```json
{
  "traffic": 1000
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `PUT /servers/{serverId}/modify/name` — Modify name (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuThrottle` — Throttle a servers CPU (domains/servers.md)
- `PUT /servers/{serverId}/modify/memory` — Modify memory (domains/servers.md)
- `PUT /servers/{serverId}/modify/cpuCores` — Modify CPU cores (domains/servers.md)

---
