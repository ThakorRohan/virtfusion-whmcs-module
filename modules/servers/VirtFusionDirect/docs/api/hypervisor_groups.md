# Hypervisor Groups API

## GET `/compute/hypervisors/groups`

**Summary:** Retrieve hypervisor groups

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

## GET `/compute/hypervisors/groups/{hypervisorGroupId}`

**Summary:** Retrieve a hypervisor group

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `hypervisorGroupId` | `path` | Yes | `integer` | A valid hypervisor group ID as shown in VirtFusion. |

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

## GET `/compute/hypervisors/groups/{hypervisorGroupId}/resources`

**Summary:** Retrieve a hypervisor groups resources

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `hypervisorGroupId` | `path` | Yes | `integer` | A valid hypervisor group ID as shown in VirtFusion. |
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

