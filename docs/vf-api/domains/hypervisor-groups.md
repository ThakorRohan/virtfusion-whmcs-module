<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Hypervisor Groups

3 operation(s). Canonical spec: `openapi.yaml` (tag: `Hypervisor Groups`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve hypervisor groups

`GET /compute/hypervisors/groups`

**Purpose:**
Retrieve hypervisor groups

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
      "name": "Default",
      "label": null,
      "description": "Default hypervisor group",
      "distributionType": 5,
      "enabled": true,
      "default": true,
      "created": "2024-03-12T22:21:32+00:00",
      "updated": "2024-04-12T20:56:04+00:00"
    },
    {
      "id": 2,
      "name": "Test 1",
      "label": null,
      "description": null,
      "distributionType": 13,
      "enabled": true,
      "default": false,
      "created": "2024-10-08T13:23:28+00:00",
      "updated": "2024-10-08T13:23:42+00:00"
    },
    {
      "id": 3,
      "name": "Test 2",
      "label": null,
      "description": null,
```
_(truncated — full example in `openapi.yaml` under `paths./compute/hypervisors/groups.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /compute/hypervisors/groups/{hypervisorGroupId}` — Retrieve a hypervisor group (domains/hypervisor-groups.md)
- `GET /compute/hypervisors` — Retrieve hypervisors (domains/hypervisors.md)
- `GET /compute/hypervisors/{hypervisorId}` — Retrive a Hypervisor (domains/hypervisors.md)

---

### Retrieve a hypervisor group

`GET /compute/hypervisors/groups/{hypervisorGroupId}`

**Purpose:**
Retrieve a hypervisor group

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `hypervisorGroupId` | integer | A valid hypervisor group ID as shown in VirtFusion. |

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
    "name": "Default",
    "label": null,
    "description": "Default hypervisor group",
    "distributionType": 5,
    "enabled": true,
    "default": true,
    "created": "2024-03-12T22:21:32+00:00",
    "updated": "2024-04-12T20:56:04+00:00"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /compute/hypervisors/groups` — Retrieve hypervisor groups (domains/hypervisor-groups.md)
- `GET /compute/hypervisors/groups/{hypervisorGroupId}/resources` — Retrieve a hypervisor groups resources (domains/hypervisor-groups.md)

---

### Retrieve a hypervisor groups resources

`GET /compute/hypervisors/groups/{hypervisorGroupId}/resources`

**Purpose:**
Retrieve a hypervisor groups resources

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `hypervisorGroupId` | integer | A valid hypervisor group ID as shown in VirtFusion. |

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
      "hypervisor": {
        "id": 1,
        "name": "PHV 1 (RED)",
        "enabled": true,
        "prohibit": false,
        "accept": false,
        "commissioned": true
      },
      "resources": {
        "servers": {
          "units": "#",
          "max": 0,
          "allocated": 1,
          "free": -1,
          "percent": null
        },
        "memory": {
          "units": "MB",
          "max": 6004,
          "allocated": 4096,
          "free": 1908,
          "percent": 68.2
        },
        "cpuCores": {
          "units": "#",
          "max": 4,
```
_(truncated — full example in `openapi.yaml` under `paths./compute/hypervisors/groups/{hypervisorGroupId}/resources.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /compute/hypervisors/groups/{hypervisorGroupId}` — Retrieve a hypervisor group (domains/hypervisor-groups.md)

---
