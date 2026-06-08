# Queue & Tasks API

## GET `/queue/{queueId}`

**Summary:** Retrieve a queue item

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `queueId` | `path` | Yes | `integer` | A valid queue ID as shown in VirtFusion. |

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

