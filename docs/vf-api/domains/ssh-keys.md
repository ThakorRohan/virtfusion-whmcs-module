<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# SSH Keys

4 operation(s). Canonical spec: `openapi.yaml` (tag: `SSH Keys`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Add an SSH key to a user account

`POST /ssh_keys`

**Purpose:**
Add an SSH key to a user account

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
None.

**Query Parameters:**
None.

**Request Body:**
| Field | Type | Required | Description |
|---|---|---|---|
| `userId` | integer | Yes | (no description in spec) |
| `name` | string | Yes | (no description in spec) |
| `publicKey` | string | Yes | (no description in spec) |

**Example Request Body:**
```json
{
  "userId": 1,
  "name": "Key 1",
  "publicKey": "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQDF6O4Evybdywpi6PImTE5aJ75+5OpJKyd2QR2LSl0bVxhZjQOqN/4msCp/UjUpFDSeC1SQXeKQb4o7OZ7bUC8k2JbNxnArsYSGi/XhqczKOX/uYOMA/V8gb1e+uishQSzjYrneC0PufFYwNGStjYf0QXCsgQcYLsHbjV2g9j0FhVYxj5endy7Z1K1RMP7IzF5lh3KgtbqKhdJ8XK1fqXCcPHxEuAzjq7G2W+I9xOs8GqftxYGS4XAiOe7YLKfWM00dUdYMJ81R8lZFj5UzP0MOT9qxPNBNiB0MEQX8hc0+2nQdaQYkg8mbCJQxhT9Cr0rXyYdbaNnYWIJql3SVgigJ"
}
```

**Response:**
| Status | Meaning |
|---|---|
| `201` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`201`):**
```json
{
  "data": {
    "id": 2,
    "name": "Key 1",
    "type": "OpenSSH",
    "createdAt": "2025-01-20T12:16:23.000000Z"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `GET /ssh_keys/{keyId}` — Retrieve an SSH key (domains/ssh-keys.md)
- `DELETE /ssh_keys/{keyId}` — Delete an SSH key from a user (domains/ssh-keys.md)

---

### Retrieve an SSH key

`GET /ssh_keys/{keyId}`

**Purpose:**
Retrieve an SSH key

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `keyId` | integer | A valid SSH key ID as shown in VirtFusion. |

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
    "name": "MY SSH Key",
    "publicKey": "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAACAQC+JdL4fWELBWGAknSu0PwVpDDOlORxy9z7eVnZphZXBzYLMnux+ZogVLns6+O6NDE8JmWvP9RIg3SIga7RDOkW9UCdLzRu0jF2ALL7CK1huo1Ih0PDM9ZbFDy2Fd7a4DTvUX6923fQyW0PWRtyL11R4c9NUqzejKp5kW8vHfPQjzwb1hGIKvkSYkI0Auq4JJhlvjjnoK7Z8t5mpDrVfNTrVqevPgsW5Xwnq8R+02XywrY+Q/wnpxDs4Ujb2aA61A0x5J0xcZQpTQHoJNj77J3VmPI7Ry7Q8hPbTSLGZbN+gODr0lOaL5TdbvM3bnus5JvoqgRoszzPcTiAQZAe3v9UM8hiXise54b8rsc2M9MQ4olPu7TrROZbcw+9q4m6cV+dfVU/NRFkf27YRa4oZNKehHsMiupDyoISgSl4qSB8YXAWsX03oC/gzpB2YJIqEL1Y/SmKYEhgr0cplkvGZy6C/Q9cJHyHlMPtEBPexgcjXC9QrVK4n2cmde3TuSRMctawcat7Nuq08C8fGHaGHr8iAeage3o/ODVOt0rhBu69PknzQeVBdlwK3+p1dH6PnMzNNBhWyNZT/NqB2eS6K8lYpOQ47byXPwYsRLvStUjpZRdikOT7D31T5g8FwOThQ+6WX+xfMD7CSLsSKCn/FhlinbVbG2IhCLH3B30Akw5bUw==",
    "type": "OpenSSH",
    "enabled": true,
    "created": "2024-03-13T20:28:32+00:00",
    "updated": "2024-03-13T20:28:32+00:00"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /ssh_keys` — Add an SSH key to a user account (domains/ssh-keys.md)
- `DELETE /ssh_keys/{keyId}` — Delete an SSH key from a user (domains/ssh-keys.md)

---

### Delete an SSH key from a user

`DELETE /ssh_keys/{keyId}`

**Purpose:**
Delete an SSH key from a user

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `keyId` | integer | A valid SSH key ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `204` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

_No example response documented in `openapi.yaml` for this operation._

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
- `POST /ssh_keys` — Add an SSH key to a user account (domains/ssh-keys.md)
- `GET /ssh_keys/{keyId}` — Retrieve an SSH key (domains/ssh-keys.md)

---

### Retrieve a users SSH keys

`GET /ssh_keys/user/{userId}`

**Purpose:**
Retrieve a users SSH keys

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `userId` | integer | A valid user ID as shown in VirtFusion. |

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
      "name": "My SSH Key",
      "publicKey": "ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAACAQC+JdL4fWELBWGAknSu0PwVpDDOlORxy9z7eVnZphZXBzYLMnux+ZogVLns6+O6NDE8JmWvP9RIg3SIga7RDOkW9UCdLzRu0jF2ALL7CK1huo1Ih0PDM9ZbFDy2Fd7a4DTvUX6923fQyW0PWRtyL11R4c9NUqzejKp5kW8vHfPQjzwb1hGIKvkSYkI0Auq4JJhlvjjnoK7Z8t5mpDrVfNTrVqevPgsW5Xwnq8R+02XywrY+Q/wnpxDs4Ujb2aA61A0x5J0xcRTpTQHoJNj77J3VmPI7Ry7Q8hPbTSLGZbN+gODr0lOaL5TdbvM3bnus5JvoqgRoszzPcTiNMZAe3v9UM8hiXise54b8rsc2M9MQ4olPu7TrROZbcw+9q4m6cV+dfVU/NRFkf27YRa4oZNKehHsMiupDyoISgSl4qSB8YXAWsX03oC/gzpB2YJIqEL1Y/SmKYEhgr0cplkvGZy6C/Q9cJHyHlMPtEBPexgcjXC9QrVK4n2cmde3TuSRMctawcat7Nuq08C8fGHaGHr8iAeage3o/ODVOt0rhBu69PknzQeVBdlwK3+p1dH6PnMzNNBhWyNZT/NqB2eS6K8lYpOQ47byXPwYsRLvStUjpZRdikOT7D31T5g8FwOThQ+6WX+xfMD7CSLsSKCn/FhlinbVbG2IhCLH3B30Akw5bUw==",
      "type": "OpenSSH",
      "enabled": true,
      "created": "2024-03-13T20:28:32+00:00",
      "updated": "2024-03-13T20:28:32+00:00"
    }
  ]
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
