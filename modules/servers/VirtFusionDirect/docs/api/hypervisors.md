# Hypervisors API

## GET `/compute/hypervisors`

**Summary:** Retrieve hypervisors

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

## GET `/compute/hypervisors/{hypervisorId}`

**Summary:** Retrive a Hypervisor

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `hypervisorId` | `path` | Yes | `integer` | A valid hypervisor ID as shown in VirtFusion. |

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

