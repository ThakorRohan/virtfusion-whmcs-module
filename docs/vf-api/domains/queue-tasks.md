<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Queue & Tasks

1 operation(s). Canonical spec: `openapi.yaml` (tag: `Queue & Tasks`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve a queue item

`GET /queue/{queueId}`

**Purpose:**
Retrieve a queue item

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `queueId` | integer | A valid queue ID as shown in VirtFusion. |

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
    "id": 158,
    "jobId": "852",
    "job": "App\\Jobs\\Server\\KVM\\Build",
    "hypervisorId": 6,
    "serverId": 69,
    "action": "build_server",
    "queue": "default",
    "started": "2025-01-15T15:00:26+00:00",
    "updated": "2025-01-15T15:00:49+00:00",
    "finished": "2025-01-15T15:00:49+00:00",
    "failed": false,
    "progress": 100,
    "errors": {
      "exception": {
        "stringable": false,
        "errors": [],
        "type": null,
        "trace": null,
        "message": null
      }
    },
    "primaryActions": [
      {
        "type": "server.get.status",
        "dataType": "object",
        "data": {
          "success": true,
          "version": "{{VERSION}}",
```
_(truncated — full example in `openapi.yaml` under `paths./queue/{queueId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
