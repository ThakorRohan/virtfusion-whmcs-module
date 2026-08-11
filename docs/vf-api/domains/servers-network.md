<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Servers/Network

5 operation(s). Canonical spec: `openapi.yaml` (tag: `Servers/Network`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Add an address to the whitelist

`POST /servers/{serverId}/networkWhitelist`

**Purpose:**
Add an address to the whitelist

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
| `interface` | string | Yes | Primary or secondary. |
| `ip` | string | Yes | IPv4 or IPv6 address. |
| `cidr` | integer | Yes | IPv4 or IPv6 CIDR. |

**Example Request Body:**
```json
{
  "interface": "primary",
  "ip": "10.0.0.10",
  "cidr": 32
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
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Remove an address from the whitelist

`DELETE /servers/{serverId}/networkWhitelist`

**Purpose:**
Remove an address from the whitelist

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
| `interface` | string | Yes | Primary or secondary. |
| `ip` | string | Yes | IPv4 or IPv6 address. |

**Example Request Body:**
```json
{
  "interface": "primary",
  "ip": "10.0.0.10"
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
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Add a quantity of IPv4 addresses

`POST /servers/{serverId}/ipv4Qty`

**Purpose:**
Add a quantity of IPv4 addresses

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
| `interface` | string | Yes | Primary or secondary. |
| `quantity` | integer | Yes | Number of IPv4 addresses. |

**Example Request Body:**
```json
{
  "interface": "primary",
  "quantity": 2
}
```

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": [
    "192.168.4.36",
    "192.168.4.37"
  ]
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Add an array of IPv4 addresses

`POST /servers/{serverId}/ipv4`

**Purpose:**
Add an array of IPv4 addresses

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
| `interface` | string | Yes | (no description in spec) Allowed values: `primary`, `secondary`. |
| `ip` | array | Yes | (no description in spec) |

**Example Request Body:**
```json
{
  "interface": "primary",
  "ip": [
    "10.100.0.10",
    "10.100.0.11"
  ]
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
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `DELETE /servers/{serverId}/ipv4` — Remove an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---

### Remove an array of IPv4 addresses

`DELETE /servers/{serverId}/ipv4`

**Purpose:**
Remove an array of IPv4 addresses

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
| `interface` | string | Yes | (no description in spec) Allowed values: `primary`, `secondary`. |
| `ip` | array | Yes | (no description in spec) |

**Example Request Body:**
```json
{
  "interface": "primary",
  "ip": [
    "10.100.0.10",
    "10.100.0.11"
  ]
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
- `POST /servers/{serverId}/networkWhitelist` — Add an address to the whitelist (domains/servers-network.md)
- `DELETE /servers/{serverId}/networkWhitelist` — Remove an address from the whitelist (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4Qty` — Add a quantity of IPv4 addresses (domains/servers-network.md)
- `POST /servers/{serverId}/ipv4` — Add an array of IPv4 addresses (domains/servers-network.md)
- `GET /servers/{serverId}` — Retrieve a server (domains/servers.md)
- `DELETE /servers/{serverId}` — Delete a server (domains/servers.md)
- `POST /servers/{serverId}/build` — Build a server (domains/servers.md)
- `POST /servers/{serverId}/resetPassword` — Reset a server password (domains/servers.md)
- `GET /servers/{serverId}/templates` — Retrieve OS templates available to a server (domains/servers.md)
- `POST /servers/{serverId}/suspend` — Suspend a server (domains/servers.md)
- `GET /servers/{serverId}/traffic` — Retrieve a servers traffic statistics (domains/servers.md)
- `POST /servers/{serverId}/unsuspend` — Unsuspend a server (domains/servers.md)
- `GET /servers/{serverId}/vnc` — Retrive VNC details (domains/servers.md)
- `POST /servers/{serverId}/vnc` — Enable or disable VNC (domains/servers.md)
- `POST /servers/{serverId}/customXML` — Set custom XML (domains/servers.md)

---
