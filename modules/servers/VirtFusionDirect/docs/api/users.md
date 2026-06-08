# Users API

## POST `/users`

**Summary:** Create a user

### Request Body

**application/json Schema:**
```yaml
type: object
properties:
  name:
    type: string
    description: Full name of the user.
  email:
    type: string
    description: Email address of the user.
  extRelationId:
    type: integer
    description: Relation ID.
  relStr:
    type: string
    description: Relational string.
  selfService:
    type: integer
    description: (default disabled) 0 = disabled, 1 = hourly, 2 = resource packs,
      3 = hourly & resource packs.
  selfServiceHourlyCredit:
    type: boolean
    description: ' Enable/disable credit balance billing for hourly self service.
      (true|false).'
  selfServiceHourlyGroupProfiles:
    type: array
    items:
      type: integer
    description: (default none) array of self service hourly group profile ids.
  selfServiceResourceGroupProfiles:
    type: array
    items:
      type: integer
    description: ' (default none) array of self service resource group profile ids.'
  selfServiceHourlyResourcePack:
    type: integer
    description: ' (default none) ID of an hourly self service resource pack.'
  sendMail:
    type: boolean
    description: (default false) Email the access credentials to the user. (true|false).
required:
- name
- email
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

