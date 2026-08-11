<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Packages

2 operation(s). Canonical spec: `openapi.yaml` (tag: `Packages`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve packages

`GET /packages`

**Purpose:**
Retrieve packages

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
      "id": 1,
      "name": "Test",
      "description": null,
      "enabled": true,
      "memory": 1024,
      "primaryStorage": 10,
      "traffic": 200,
      "cpuCores": 1,
      "primaryNetworkSpeedIn": 0,
      "primaryNetworkSpeedOut": 0,
      "primaryDiskType": "inherit",
      "backupPlanId": 0,
      "primaryStorageReadBytesSec": null,
      "primaryStorageWriteBytesSec": null,
      "primaryStorageReadIopsSec": null,
      "primaryStorageWriteIopsSec": null,
      "primaryStorageProfile": 1,
      "primaryNetworkProfile": 0,
      "created": "2024-03-12T22:41:31.000000Z"
    },
    {
      "id": 2,
      "name": "Test Only",
      "description": null,
      "enabled": true,
      "memory": 1024,
      "primaryStorage": 10,
```
_(truncated — full example in `openapi.yaml` under `paths./packages.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /packages/{packageId}` — Retrieve a packge (domains/packages.md)

---

### Retrieve a packge

`GET /packages/{packageId}`

**Purpose:**
Retrieve a packge

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `packageId` | integer | A valid package ID as shown in VirtFusion. |

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
    "name": "Test",
    "description": null,
    "enabled": true,
    "memory": 1024,
    "primaryStorage": 10,
    "traffic": 200,
    "cpuCores": 1,
    "primaryNetworkSpeedIn": 0,
    "primaryNetworkSpeedOut": 0,
    "primaryDiskType": "inherit",
    "backupPlanId": 0,
    "primaryStorageReadBytesSec": null,
    "primaryStorageWriteBytesSec": null,
    "primaryStorageReadIopsSec": null,
    "primaryStorageWriteIopsSec": null,
    "primaryStorageProfile": 1,
    "primaryNetworkProfile": 0,
    "created": "2024-03-12T22:41:31.000000Z"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /packages` — Retrieve packages (domains/packages.md)

---
