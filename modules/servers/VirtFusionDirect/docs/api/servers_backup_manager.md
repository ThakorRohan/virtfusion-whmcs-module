# Servers/Backup Manager API

## PUT `/servers/{serverId}/backupManager/access`

**Summary:** Modify Access

Adjust the backup manager access type and various other settings for the specified virtual server.

### Parameters

| Name | In | Required | Type | Description |
| --- | --- | --- | --- | --- |
| `serverId` | `path` | Yes | `integer` | A valid server ID as shown in VirtFusion. |

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  type:
    type: string
    enum:
    - inherit
    - disabled
    - scheduled
    - view_restore
    - full
    - manual
required:
- type
```

### Responses

#### `201`

**application/octet-stream Schema:**
```yaml
type: object
properties: {}
```

#### `401`

Reference: `#/components/responses/401`

---

