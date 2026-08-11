<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# IP Blocks

3 operation(s). Canonical spec: `openapi.yaml` (tag: `IP Blocks`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Add an IPv4 range to an IP block

`POST /connectivity/ipblocks/{blockId}/ipv4`

**Purpose:**
Add an IPv4 range to an IP block

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `blockId` | integer | A valid IPv4 block ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `type` | string | Yes | Must be set to range. |
| `start` | string | Yes | Start of IPv4 range. |
| `end` | string | Yes | End of IPv4 range. |

**Example Request Body:**
```json
{
  "type": "range",
  "start": "192.168.1.2",
  "end": "192.168.1.10"
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
- `GET /connectivity/ipblocks/{blockId}` — Retrieve an IP block (domains/ip-blocks.md)

---

### Retrieve IP blocks

`GET /connectivity/ipblocks`

**Purpose:**
Retrieve IP blocks

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
None.

**Query Parameters:**
| Name | Type | Required | Description |
|---|---|---|---|
| `results` | integer | No | Number of results to return. Range between 1 and 200. Defaults to 20. |

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
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "type": 4,
      "name": "192.168.4.0/23",
      "ipv4": {
        "gateway": "192.168.4.1",
        "netmask": "255.255.254.0",
        "resolvers": {
          "primary": "8.8.8.8",
          "secondary": "8.8.4.4"
        },
        "total": 521,
        "usedTotal": 21,
        "freeTotal": 500
      },
      "ipv6": {
        "gateway": null,
        "resolvers": {
          "primary": null,
          "secondary": null
        },
        "subnet": null,
        "from": 48,
        "to": 64,
        "restricted": [],
        "total": 0,
        "generatedTotal": 0,
```
_(truncated — full example in `openapi.yaml` under `paths./connectivity/ipblocks.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /connectivity/ipblocks/{blockId}` — Retrieve an IP block (domains/ip-blocks.md)

---

### Retrieve an IP block

`GET /connectivity/ipblocks/{blockId}`

**Purpose:**
Retrieve an IP block

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `blockId` | integer | A valid IP block ID as shown in VirtFusion. |

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
    "id": 1,
    "type": 4,
    "name": "192.168.4.0/23",
    "ipv4": {
      "gateway": "192.168.4.1",
      "netmask": "255.255.254.0",
      "resolvers": {
        "primary": "8.8.8.8",
        "secondary": "8.8.4.4"
      },
      "total": 521,
      "usedTotal": 21,
      "freeTotal": 500
    },
    "ipv6": {
      "gateway": null,
      "resolvers": {
        "primary": null,
        "secondary": null
      },
      "subnet": null,
      "from": 48,
      "to": 64,
      "restricted": [],
      "total": 0,
      "generatedTotal": 0,
      "usedTotal": 0,
      "freeTotal": 0,
```
_(truncated — full example in `openapi.yaml` under `paths./connectivity/ipblocks/{blockId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /connectivity/ipblocks/{blockId}/ipv4` — Add an IPv4 range to an IP block (domains/ip-blocks.md)
- `GET /connectivity/ipblocks` — Retrieve IP blocks (domains/ip-blocks.md)

---
