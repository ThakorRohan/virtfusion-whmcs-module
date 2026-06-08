# Packages API

## GET `/packages`

**Summary:** Retrieve packages

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

## GET `/packages/{packageId}`

**Summary:** Retrieve a packge

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `packageId` | `path` | Yes | `integer` | A valid package ID as shown in VirtFusion. |

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

