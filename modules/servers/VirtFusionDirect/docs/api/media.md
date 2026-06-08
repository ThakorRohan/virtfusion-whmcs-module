# Media API

## GET `/media/iso/{isoId}`

**Summary:** Retrieve an ISO

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `isoId` | `path` | Yes | `string` | A valid ISO ID as shown in VirtFusion. |

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

## GET `/media/templates/fromServerPackageSpec/{serverPackageId}`

**Summary:** Retrieve operating system templates that are available for a package

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverPackageId` | `path` | Yes | `integer` | A valid server package ID as shown in VirtFusion. |

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

