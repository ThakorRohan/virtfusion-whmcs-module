<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Servers/Power

4 operation(s). Canonical spec: `openapi.yaml` (tag: `Servers/Power`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Boot a server

`POST /servers/{serverId}/power/boot`

**Purpose:**
Boot a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

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
  "data": {
    "queueId": 171
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/power/shutdown` — Shutdown a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/restart` — Restart a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/poweroff` — Poweroff a server (domains/servers-power.md)

---

### Shutdown a server

`POST /servers/{serverId}/power/shutdown`

**Purpose:**
Shutdown a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

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
  "data": {
    "queueId": 171
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/power/boot` — Boot a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/restart` — Restart a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/poweroff` — Poweroff a server (domains/servers-power.md)

---

### Restart a server

`POST /servers/{serverId}/power/restart`

**Purpose:**
Restart a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

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
  "data": {
    "queueId": 171
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/power/boot` — Boot a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/shutdown` — Shutdown a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/poweroff` — Poweroff a server (domains/servers-power.md)

---

### Poweroff a server

`POST /servers/{serverId}/power/poweroff`

**Purpose:**
Poweroff a server

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |

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
  "data": {
    "queueId": 171
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/power/boot` — Boot a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/shutdown` — Shutdown a server (domains/servers-power.md)
- `POST /servers/{serverId}/power/restart` — Restart a server (domains/servers-power.md)

---
