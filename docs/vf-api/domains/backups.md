<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Backups

1 operation(s). Canonical spec: `openapi.yaml` (tag: `Backups`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve a server backups

`GET /backups/server/{serverId}`

**Purpose:**
Retrieve a server backups

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
  "data": [
    {
      "id": 42,
      "serverId": 202,
      "storage": {
        "id": 5,
        "name": "Backup Server 1",
        "enabled": true
      },
      "deleting": false,
      "restoring": false,
      "progress": false,
      "complete": true,
      "deleteAfter": null,
      "created": "2022-03-03T20:25:01+00:00",
      "updated": "2022-03-03T20:26:01+00:00"
    },
    {
      "id": 49,
      "serverId": 202,
      "storage": {
        "id": 5,
        "name": "Backup Server 1",
        "enabled": true
      },
      "deleting": false,
      "restoring": false,
      "progress": false,
      "complete": true,
```
_(truncated — full example in `openapi.yaml` under `paths./backups/server/{serverId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
