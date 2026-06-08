# DNS API

## GET `/dns/services/{serviceId}`

**Summary:** Retrieve a DNS service

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serviceId` | `path` | Yes | `string` | A valid DNS service ID as shown in VirtFusion. |

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

