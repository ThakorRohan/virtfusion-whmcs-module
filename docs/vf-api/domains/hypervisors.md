<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Hypervisors

2 operation(s). Canonical spec: `openapi.yaml` (tag: `Hypervisors`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve hypervisors

`GET /compute/hypervisors`

**Purpose:**
Retrieve hypervisors

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
      "commissioned": 3,
      "ip": "192.168.4.10",
      "ipAlt": null,
      "hostname": null,
      "port": 8892,
      "sshPort": 22,
      "name": "PHV 1 (RED)",
      "maintenance": false,
      "enabled": true,
      "nfType": 4,
      "group": {
        "id": 1,
        "name": "Default",
        "description": "Default hypervisor group",
        "default": true,
        "enabled": true,
        "distributionType": 5,
        "created": "2024-03-12T22:21:32+00:00",
        "updated": "2024-04-12T20:56:04+00:00"
      },
      "encryptedToken": "eyJpdiI6Ik1Ua29ZSGp0QThxWVZhellzL2VTU3c9PSIsInZhbHVlIjoiNzc1eGdMMzFPUFpFZVpIbytzMDc1NzRsUHRJVnFTWFpKWS9WamJIaVJVMVZkSFZjZVM1YVB3bnlQeGt4eEhVamhrWGF4SnNqQVFES010Y3owUmJneTR4a05oRkp1R08xVXI1eHcvQ3NsbW5qU0dpUWhZbnFUMWYrTHM5L2NoZmhUQm9nRnV4b2Y0dENGLy9vanVDMnkwTG1mNXBYM1JVcE5TNWRCSGkvZS9qVEFsSWx5WXdXOU1wajIwam1DV1d4aUNXMUNGMThFNXI5THM4VWFmYnRFNkx3VHFaV3o3M0VVaEZXSHo0TVdKc0xSemJYVExUWEVlZHM0ZVNoUkk0ZEI2QnAySlVESVU2R0JDcWJMeG9YRUhIM0Vad2w2VHNGcFQ3R1BkbU1TbzU3V2JzbEJFNlUvSW90eGxNZkdqRjVmMGx6TTRIWEttYVA0Ti9JQkEwQURrWTRPL2k4VFJsNjhFTHh3UW1wSGMzUkxibEtDeDdlK2tOekQxVkh0bzhsWXY1RkxxaWRkSFBEQlNvM1l2akxqNitickp1TzR0ekhTbmdVSG5VUE5tMGh1WFJuejhscFpSS2dLcE1ZaS9NUlRKdnNUS0wzYWlDYjB1MVJhcmk4OEJoZURNQ3JROE5WcTZTdzV0Si9UeDhwMTFLK3lZV0NDdzB5b2NBZFhsM0hYMDJPMHlXS1g1MmxhNWdrOTRTSDJHbWNvODNuOUswMHJpYTVBL0YwRW9BVndsMllIdW95ZjBhZXdLUTRSR0xBelBVekViTCtKaG8wSGxPR1NOWmNSaXpxQ1hBUVdsdE9HMUhtc2YrRU14WkhOaUVVeWhXRlB2amtRRXkxZjY0cm85ekxVYWE1QU5zdlJDK2N6YmZrNHNOWk4xSTZXbUhxYklLTmgraTZFWHM9IiwibWFjIjoiOTY2ZmJkNzJkNzZmNmZmYTQzM2U4NDQzMDdhYTAzOWZhNTM0M2I1MDQyYWUwYzQ1ZGIyZTRlOGEwM2M0MTRhYiIsInRhZyI6IiJ9",
      "maxServers": 0,
      "maxCpu": 4,
      "maxMemory": 6004,
      "networks": [
```
_(truncated — full example in `openapi.yaml` under `paths./compute/hypervisors.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /compute/hypervisors/groups` — Retrieve hypervisor groups (domains/hypervisor-groups.md)
- `GET /compute/hypervisors/{hypervisorId}` — Retrive a Hypervisor (domains/hypervisors.md)

---

### Retrive a Hypervisor

`GET /compute/hypervisors/{hypervisorId}`

**Purpose:**
Retrive a Hypervisor

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `hypervisorId` | integer | A valid hypervisor ID as shown in VirtFusion. |

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
    "commissioned": 3,
    "ip": "192.168.4.10",
    "ipAlt": null,
    "hostname": null,
    "port": 8892,
    "sshPort": 22,
    "name": "PHV 1 (RED)",
    "maintenance": false,
    "enabled": true,
    "nfType": 4,
    "group": {
      "id": 1,
      "name": "Default",
      "description": "Default hypervisor group",
      "default": true,
      "enabled": true,
      "distributionType": 5,
      "created": "2024-03-12T22:21:32+00:00",
      "updated": "2024-04-12T20:56:04+00:00"
    },
    "encryptedToken": "eyJpdiI6Ik1Ua29ZSGp0QThxWVZhellzL2VTU3c9PSIsInZhbHVlIjoiNzc1eGdMMzFPUFpFZVpIbytzMDc1NzRsUHRJVnFTWFpKWS9WamJIaVJVMVZkSFZjZVM1YVB3bnlQeGt4eEhVamhrWGF4SnNqQVFES010Y3owUmJneTR4a05oRkp1R08xVXI1eHcvQ3NsbW5qU0dpUWhZbnFUMWYrTHM5L2NoZmhUQm9nRnV4b2Y0dENGLy9vanVDMnkwTG1mNXBYM1JVcE5TNWRCSGkvZS9qVEFsSWx5WXdXOU1wajIwam1DV1d4aUNXMUNGMThFNXI5THM4VWFmYnRFNkx3VHFaV3o3M0VVaEZXSHo0TVdKc0xSemJYVExUWEVlZHM0ZVNoUkk0ZEI2QnAySlVESVU2R0JDcWJMeG9YRUhIM0Vad2w2VHNGcFQ3R1BkbU1TbzU3V2JzbEJFNlUvSW90eGxNZkdqRjVmMGx6TTRIWEttYVA0Ti9JQkEwQURrWTRPL2k4VFJsNjhFTHh3UW1wSGMzUkxibEtDeDdlK2tOekQxVkh0bzhsWXY1RkxxaWRkSFBEQlNvM1l2akxqNitickp1TzR0ekhTbmdVSG5VUE5tMGh1WFJuejhscFpSS2dLcE1ZaS9NUlRKdnNUS0wzYWlDYjB1MVJhcmk4OEJoZURNQ3JROE5WcTZTdzV0Si9UeDhwMTFLK3lZV0NDdzB5b2NBZFhsM0hYMDJPMHlXS1g1MmxhNWdrOTRTSDJHbWNvODNuOUswMHJpYTVBL0YwRW9BVndsMllIdW95ZjBhZXdLUTRSR0xBelBVekViTCtKaG8wSGxPR1NOWmNSaXpxQ1hBUVdsdE9HMUhtc2YrRU14WkhOaUVVeWhXRlB2amtRRXkxZjY0cm85ekxVYWE1QU5zdlJDK2N6YmZrNHNOWk4xSTZXbUhxYklLTmgraTZFWHM9IiwibWFjIjoiOTY2ZmJkNzJkNzZmNmZmYTQzM2U4NDQzMDdhYTAzOWZhNTM0M2I1MDQyYWUwYzQ1ZGIyZTRlOGEwM2M0MTRhYiIsInRhZyI6IiJ9",
    "maxServers": 0,
    "maxCpu": 4,
    "maxMemory": 6004,
    "created": "2024-03-12T22:37:15+00:00",
    "updated": "2024-05-10T11:27:52+00:00",
    "networks": [
```
_(truncated — full example in `openapi.yaml` under `paths./compute/hypervisors/{hypervisorId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /compute/hypervisors/groups` — Retrieve hypervisor groups (domains/hypervisor-groups.md)
- `GET /compute/hypervisors` — Retrieve hypervisors (domains/hypervisors.md)

---
