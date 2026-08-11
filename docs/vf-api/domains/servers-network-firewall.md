<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Servers/Network/Firewall

4 operation(s). Canonical spec: `openapi.yaml` (tag: `Servers/Network/Firewall`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Disable firewall

`POST /servers/{serverId}/firewall/{interface}/disable`

**Purpose:**
Disable firewall

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `interface` | string | primary or secondary. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `sync` | boolean | No | Synchronise and apply the defined rules. true|false Defaults to false. |

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/firewall/{interface}/enable` — Enable firewall (domains/servers-network-firewall.md)
- `GET /servers/{serverId}/firewall/{interface}` — Retrieve firewall (domains/servers-network-firewall.md)
- `POST /servers/{serverId}/firewall/{interface}/rules` — Apply firewall rulesets (domains/servers-network-firewall.md)

---

### Enable firewall

`POST /servers/{serverId}/firewall/{interface}/enable`

**Purpose:**
Enable firewall

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `interface` | string | primary or secondary. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `sync` | boolean | No | Synchronise and apply the defined rules. true|false Defaults to false. |

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/firewall/{interface}/disable` — Disable firewall (domains/servers-network-firewall.md)
- `GET /servers/{serverId}/firewall/{interface}` — Retrieve firewall (domains/servers-network-firewall.md)
- `POST /servers/{serverId}/firewall/{interface}/rules` — Apply firewall rulesets (domains/servers-network-firewall.md)

---

### Retrieve firewall

`GET /servers/{serverId}/firewall/{interface}`

**Purpose:**
Retrieve firewall

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `interface` | string | primary or secondary. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `sync` | boolean | No | Synchronise and apply the defined rules. true|false Defaults to false. |

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/firewall/{interface}/disable` — Disable firewall (domains/servers-network-firewall.md)
- `POST /servers/{serverId}/firewall/{interface}/enable` — Enable firewall (domains/servers-network-firewall.md)
- `POST /servers/{serverId}/firewall/{interface}/rules` — Apply firewall rulesets (domains/servers-network-firewall.md)

---

### Apply firewall rulesets

`POST /servers/{serverId}/firewall/{interface}/rules`

**Purpose:**
Apply firewall rulesets

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverId` | integer | A valid server ID as shown in VirtFusion. |
| `interface` | string | primary or secondary. |

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `sync` | boolean | No | Synchronise and apply the defined rules. true|false Defaults to false. |

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `rulesets` | array | Yes | An array of ruleset IDs. All existing rules will be flushed and the new rules applied. An empty array will flush all rules. |

**Example Request Body:**
```json
{
  "rulesets": [
    1,
    2,
    5
  ]
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
- `POST /servers/{serverId}/firewall/{interface}/disable` — Disable firewall (domains/servers-network-firewall.md)
- `POST /servers/{serverId}/firewall/{interface}/enable` — Enable firewall (domains/servers-network-firewall.md)
- `GET /servers/{serverId}/firewall/{interface}` — Retrieve firewall (domains/servers-network-firewall.md)

---
