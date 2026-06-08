# IP Blocks API

## POST `/connectivity/ipblocks/{blockId}/ipv4`

**Summary:** Add an IPv4 range to an IP block

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `blockId` | `path` | Yes | `integer` | A valid IPv4 block ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  type:
    type: string
    description: Must be set to range.
  start:
    type: string
    description: Start of IPv4 range.
  end:
    type: string
    description: End of IPv4 range.
required:
- type
- start
- end
```

### Responses

#### `204`

**text/css Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

## GET `/connectivity/ipblocks`

**Summary:** Retrieve IP blocks

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `results` | `query` | No | `integer` | Number of results to return. Range between 1 and 200. Defaults to 20. |

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

## GET `/connectivity/ipblocks/{blockId}`

**Summary:** Retrieve an IP block

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `blockId` | `path` | Yes | `integer` | A valid IP block ID as shown in VirtFusion. |

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

