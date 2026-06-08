# SSH Keys API

## POST `/ssh_keys`

**Summary:** Add an SSH key to a user account

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  userId:
    type: integer
  name:
    type: string
  publicKey:
    type: string
required:
- userId
- name
- publicKey
```

### Responses

#### `201`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## DELETE `/ssh_keys/{keyId}`

**Summary:** Delete an SSH key from a user

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `keyId` | `path` | Yes | `integer` | A valid SSH key ID as shown in VirtFusion. |

### Responses

#### `204`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/ssh_keys/{keyId}`

**Summary:** Retrieve an SSH key

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `keyId` | `path` | Yes | `integer` | A valid SSH key ID as shown in VirtFusion. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/ssh_keys/user/{userId}`

**Summary:** Retrieve a users SSH keys

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `userId` | `path` | Yes | `integer` | A valid user ID as shown in VirtFusion. |

### Responses

#### `200`

**application/json Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

