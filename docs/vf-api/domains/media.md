<!-- GENERATED FILE — do not hand-edit. Run scripts/generate_docs.py to regenerate. -->
<!-- Source of truth: openapi.yaml. On any conflict, openapi.yaml wins. -->

# Media

2 operation(s). Canonical spec: `openapi.yaml` (tag: `Media`).

[← Back to API_INDEX.md](../API_INDEX.md) · [ENDPOINTS.md](../ENDPOINTS.md) · [AI_GUIDE.md](../AI_GUIDE.md)

### Retrieve an ISO

`GET /media/iso/{isoId}`

**Purpose:**
Retrieve an ISO

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `isoId` | string | A valid ISO ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": {
    "id": 1,
    "name": "Deb Arch",
    "description": null,
    "arch": 2,
    "url": "https://cdimage.debian.org/debian-cd/current/arm64/iso-cd/debian-12.5.0-arm64-netinst.iso",
    "filename": "deb-arc",
    "enabled": true,
    "config": "[]",
    "global": true,
    "download": true,
    "users": [],
    "created": "2024-03-13T09:34:54+00:00",
    "updated": "2024-04-01T20:34:05+00:00"
  }
}
```

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---

### Retrieve operating system templates that are available for a package

`GET /media/templates/fromServerPackageSpec/{serverPackageId}`

**Purpose:**
Retrieve operating system templates that are available for a package

**Authentication:**
Bearer token required — `Authorization: Bearer <VirtFusion API token>` (global requirement, see `openapi.yaml#/security`).

**Path Parameters:**
| Name | Type | Description |
|---|---|---|
| `serverPackageId` | integer | A valid server package ID as shown in VirtFusion. |

**Query Parameters:**
None.

**Request Body:**
None — this operation takes no request body.

**Response:**
| Status | Meaning |
|---|---|
| `200` | (no description in spec) |
| `401` | See shared response `401` in `openapi.yaml#/components/responses/401` |

**Example Response (`200`):**
```json
{
  "data": [
    {
      "name": "Debian",
      "description": "Debian GNU/Linux, is a Linux distribution composed of free and open-source software, developed by the community-supported Debian Project.",
      "icon": "debian_logo.png",
      "templates": [
        {
          "id": 8,
          "name": "Debian",
          "version": "11 (Bullseye)",
          "variant": "Minimal",
          "arch": 1,
          "description": "Minimal installation with limited packages. New packages are easily installed using Advanced Package Tool (APT), the main command-line package manager for Debian.",
          "icon": "debian_logo.png",
          "eol": false,
          "eol_date": "2024-03-12 00:00:00",
          "eol_warning": false,
          "deploy_type": 1,
          "vnc": false,
          "type": "linux"
        },
        {
          "id": 44,
          "name": "Debian",
          "version": "12 (Bookworm)",
          "variant": null,
          "arch": 2,
          "description": "Minimal installation with limited packages. New packages are easily installed using Advanced Package Tool (APT), the main command-line package manager for Debian.",
          "icon": "debian_logo.png",
```
_(truncated — full example in `openapi.yaml` under `paths./media/templates/fromServerPackageSpec/{serverPackageId}.get.responses.200`)_

**Important Notes:**
None beyond what is stated above — no other constraints are documented in `openapi.yaml` for this operation.

**Related Endpoints:**
None sharing this path prefix in the spec.

---
