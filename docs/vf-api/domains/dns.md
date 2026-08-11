<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# DNS

1 operation(s). Canonical spec: `openapi.yaml` (tag: `DNS`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve a DNS service

`GET /dns/services/{serviceId}`

**Purpose:**
Retrieve a DNS service

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serviceId` | string | A valid DNS service ID as shown in VirtFusion. |

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
    "id": 4,
    "type": 1,
    "name": "ClouDNS",
    "username": "456754",
    "url": "https://api.cloudns.net",
    "ip": null,
    "port": 443,
    "password": "eyJpdiI6IjVUOU11S09KNmFtNnlqLzRzR0FYd1E9PSIsInZhbHVlIjoiS01SNjdhbEt1TzFVMHM0Nk1lY2Z0bnl5cUJJUDlxeUF0VXdtTTUwWW41QT0iLCJtYWMiOiI4NTBlNzFhNzJmNTkwMTA1ODQ0MjU4OTUzNjM0MzAxN2QwYzY5OTdiMTgzNDg3ZGFjMmU5NjE0Y2E3YTE1NWVjIiwidGFnIjoiIn0=",
    "config": {},
    "subAccount": false,
    "capabilities": 1,
    "enabled": true,
    "created": "2022-02-11T11:55:49+00:00",
    "updated": "2022-02-14T22:45:43+00:00"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
