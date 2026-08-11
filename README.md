# VirtFusion Direct Provisioning Module for WHMCS

> **FlashRDP Fork** - A customized version of the [EZSCALE/virtfusion-whmcs-module](https://github.com/EZSCALE/virtfusion-whmcs-module), maintained for FlashRDP's internal WHMCS/VirtFusion infrastructure.

A comprehensive WHMCS provisioning module for [VirtFusion](https://virtfusion.com) that enables automated VPS server provisioning, management, and client self-service directly from WHMCS.

## Attribution

This repository is based on the excellent open-source [VirtFusion WHMCS Module](https://github.com/EZSCALE/virtfusion-whmcs-module) created and maintained by **EZSCALE**. We are grateful for their work in building and maintaining the original module, which serves as the foundation for this fork.

- **Original project:** [github.com/EZSCALE/virtfusion-whmcs-module](https://github.com/EZSCALE/virtfusion-whmcs-module)
- **License:** [MIT](LICENSE.md) (inherited from the original project)

> **Important:** This repository is maintained primarily for FlashRDP's operational requirements. Features, fixes, and architectural decisions are implemented from FlashRDP's perspective and may differ from upstream behavior. Changes made here may not be suitable for every VirtFusion/WHMCS installation. Neither the original author (EZSCALE) nor VirtFusion officially maintains or supports FlashRDP-specific modifications. For the general-purpose module, please refer to the [original upstream project](https://github.com/EZSCALE/virtfusion-whmcs-module).

## Table of Contents

- [FlashRDP Enhancements](#flashrdp-enhancements)
- [Requirements](#requirements)
- [Features](#features)
- [Configuration](#configuration)
  - [Server Setup](#server-setup)
  - [Product Setup](#product-setup)
  - [Custom Fields](#custom-fields)
  - [Module Configuration Options](#module-configuration-options)
  - [Configurable Options (Dynamic Pricing)](#configurable-options-dynamic-pricing)
  - [Custom Option Name Mapping](#custom-option-name-mapping)
  - [Stock Control (Dynamic Inventory)](#stock-control-dynamic-inventory)
  - [Reverse DNS Addon (PowerDNS)](#reverse-dns-addon-powerdns)
- [Client Area Features](#client-area-features)
- [Admin Area Features](#admin-area-features)
- [Theme Compatibility](#theme-compatibility)
- [Directory Structure](#directory-structure)
- [Troubleshooting](#troubleshooting)
- [License](#license)

## FlashRDP Enhancements

The following features are exclusive to this fork and are not present in the upstream EZSCALE module:

### Premium Checkout UI
The default flexbox "pill" layout for OS family selection has been replaced with a modern, responsive **5-column CSS grid** of square cards. On mobile devices (below 540px), the layout automatically adapts to a comfortable **3-column grid**. Each card displays the OS family icon prominently with a larger tap target.

### Smart OS Priority Sorting
OS templates are no longer sorted purely alphabetically. A priority system pushes the most popular distros to the top of the list in this order:

1. **Windows**
2. **Ubuntu**
3. **Debian**
4. **CentOS**
5. **AlmaLinux**
6. Remaining OS families (alphabetical)
7. "Other" (always last)

This reduces friction for the majority of customers who are looking for a mainstream OS.

### Enhanced API Integration
- **Queue Task Endpoint** - Added `getQueueTask($serviceID, $queueId)` to fetch details for specific VirtFusion queue tasks, enabling tracking of background provisioning and rebuild jobs.
- **Task State Injection** - Background task states are injected into the `ServerResource` data object (`$server['tasks']`), making provisioning job status available to the client area natively.

## Requirements

| Requirement | Minimum Version | Notes |
|---|---|---|
| **VirtFusion** | v1.7.3+ | Tested against **v7.0.0 Build 9** (current production target). v6.1.0+ required for VNC console; v6.2.0+ for resource modification. |
| **WHMCS** | 8.x or 9.x | Tested against **WHMCS 9.0.3** (current production target); broadly compatible with 8.10 and earlier 8.x releases. |
| **PHP** | 8.2+ for WHMCS 9.x; 8.0+ for WHMCS 8.x | With cURL extension enabled. |
| **SSL** | Valid certificate | Required on the VirtFusion panel. |

You also need a VirtFusion API token with the following permissions:
- Server management (create, read, update, delete, power, build)
- User management (create, read, reset password, authentication tokens)
- Package and template read access
- Network management (if using IP management features)

## Features

### Server Provisioning
- Automatic server creation with VirtFusion user account linking
- Server suspension, unsuspension, and termination
- Package/plan upgrades and downgrades
- Configurable options mapping for dynamic resource allocation (CPU, RAM, disk, bandwidth, network speed)
- **Dry run validation** - Test server creation parameters before provisioning
- Automatic memory unit conversion (GB to MB for values < 1024)

### Client Area - Server Management
- **Server Overview** - Real-time server info (hostname, IPs, resources) with status badge, plus location flag, OS template name, and "Created N days ago" lifetime chips
- **VNC Console** - Browser-based console access via a popup window. Loads VirtFusion's noVNC viewer through a same-origin authenticated route (`client.php?action=vncViewer`), session-gated and ownership-validated; wss token rotates on every open and never appears in any URL
- **Hypervisor Maintenance Banner** - Yellow alert at the very top of the page when the hypervisor is in maintenance, so customers know to expect transient errors
- **Traffic Chart** - Last 12 months of bandwidth usage (rx + tx) as side-by-side monthly bars, plus current period used/limit/remaining tile
- **Live Stats** - CPU, memory, and disk I/O sourced from VirtFusion's libvirt introspection, auto-refreshing every 30 s while the panel is visible
- **Filesystem Usage** - Per-mount usage rows from qemu-guest-agent (when installed on the VM), with progress bars and warning thresholds
- **Power Management** - Start, restart, graceful shutdown, and force power off
- **Control Panel SSO** - One-click login to VirtFusion panel from the Server Overview footer
- **Server Rebuild** - Reinstall with any available OS template
- **Password Reset** - Reset VirtFusion panel login credentials
- **IP Management** - IPv4 + IPv6 listed inline in the Server Overview cells, each with a per-address copy button
- **Resources Panel** - Current memory, CPU, storage, traffic allocation with usage bars
- **Mask Sensitive (Screenshot Mode)** - Toggle in the Server Overview meta bar that masks IPs (keeps subnet visible: `205.186.xxx.xxx`), IPv6 (keeps prefix), hostnames, and the Server Name + Reverse DNS hostname inputs. Useful for support screenshots and screen-shares; state persists across page refreshes via `sessionStorage`
- **Self-Service Billing** - Credit balance display, usage breakdown, and credit top-up (when enabled)
- **Bandwidth Usage** - Traffic usage display with allocation limits
- **Billing Overview** - Product, billing cycle, dates, and payment information
- **In-Page Section Navigation** - "On This Page" group injected into the WHMCS Actions sidebar with smooth-scroll jump-links to every visible panel; auto-hides links for hidden panels

### Admin Area
- **Test Connection** - Verify API connectivity from WHMCS
- **Server Data Display** - Live server information from VirtFusion
- **Admin Impersonation** - Log into VirtFusion panel as server owner
- **Server ID Management** - Editable Server ID for manual adjustments
- **Server Object Viewer** - Full JSON response from VirtFusion API
- **Validate Server Config** - Dry run server creation to check configuration
- **Update Server Object** - Refresh cached server data from VirtFusion

### Ordering Process
- OS template card gallery with accordion categories, search, and brand icons (FlashRDP: 5-column grid layout)
- SSH key selection dropdown for users with saved keys, with option to paste a new public key
- **SSH Ed25519 key generator** - Client-side keypair generation using Web Crypto API
- Checkout validation ensuring OS selection before order placement
- **Resource sliders** - Configurable option dropdowns are replaced with interactive range sliders
- Compatible with all WHMCS order form templates
- **Order auto-accept after provision** - when a paid order's VirtFusion service provisions successfully, the module calls WHMCS `AcceptOrder` (with `autosetup=false` so there's no double-provision) to flip the order from Pending to Active automatically. Idempotent; already-accepted orders are untouched.

### Stock Control (Dynamic Inventory)
- **Out-of-stock badges driven by real hypervisor capacity** - opt-in per product via WHMCS's native Stock Control toggle. When enabled, the module keeps `tblproducts.qty` synced to the number of VPSes the panel can still actually provision, and WHMCS renders the "Out of Stock" badge, disables Add-to-Cart, and refuses checkout natively.
- **Live-capacity math** - combines `/packages/{id}` (per-VPS resource footprint) with `/compute/hypervisors/groups/{id}/resources` (live per-hypervisor free/allocated) to compute qty across every group the product can be placed in.
- **Event-driven refresh** - qty recalculates after every successful provision (`AfterModuleCreate`), termination (`AfterModuleTerminate`), and on cart/order page views for individual products. A 2-hour safety-net cron catches capacity changes made directly in the VirtFusion panel.
- **Per-product safety buffer** - `stockSafetyBufferPct` config option (default 10%) reserves headroom so the storefront stops selling before a hypervisor is literally at 100%.
- **Fail-safe under API outages** - transient VirtFusion API failures leave `qty` UNCHANGED instead of zeroing it, so a brief network blip doesn't take the catalogue offline.
- **Admin recalc on demand** - POST `admin.php?action=stockRecalculate` forces a full re-sweep.

### Usage Tracking
- **Automated bandwidth sync** - WHMCS daily cron pulls traffic usage from VirtFusion
- **Disk usage sync** - Storage usage updated automatically
- Visible in WHMCS client area and admin product details

### Backup Management
- Assign backup plans to servers via the VirtFusion API
- Remove backup plans from servers

### Resource Modification
- In-place modification of server resources (memory, CPU cores, traffic)
- No server rebuild required for resource changes
- **Package change** now also applies individual resource modifications from configurable options

### Self-Service Billing
- Credit balance display and top-up from client area
- Usage breakdown reporting
- Auto top-off via WHMCS cron when credit falls below threshold
- Self-service mode configurable per product (Hourly, Resource Packs, or Both)

### Reverse DNS (Optional PowerDNS Addon)
- **Automatic PTR sync** on server create, rename, and terminate
- **Client-editable rDNS** panel in the service overview - one input per assigned IP
- **Forward-confirmed reverse DNS (FCrDNS)** - every PTR write requires the hostname's A/AAAA to already resolve to the IP; mismatches are rejected with a clear error
- **IPv4 + IPv6** support out of the box (IPv6 nibble-reversal, `.ip6.arpa` zones)
- **RFC 2317 classless delegation** - supports both CIDR-prefix (`0/26`) and block-size (`64/64`) zone naming conventions
- **Opt-in** via a companion WHMCS addon module - no impact on existing provisioning if not activated

## Configuration

### Server Setup

In WHMCS Admin under **Configuration > System Settings > Servers**:

| Field | Value |
|---|---|
| Hostname | Your VirtFusion panel domain (e.g., `cp.example.com`) |
| Password | Your VirtFusion API token |
| Type | VirtFusion Direct Provisioning |

**Important**: Do not include `https://` or `/api/v1` in the hostname. The module constructs the full URL automatically.

### Product Setup

Each WHMCS product using this module needs:
1. Module set to "VirtFusion Direct Provisioning"
2. A linked server (or the module will use any available VirtFusion server)
3. The three configuration options set (Hypervisor Group ID, Package ID, Default IPv4)
4. Custom fields created (see below)

### Custom Fields

The module requires two custom fields per product: **Initial Operating System** and **Initial SSH Key**. These are **automatically created** when the module loads - no manual setup required.

The fields are hidden text boxes that are dynamically replaced by dropdown selects via JavaScript hooks on the order form. They are created for every product with the module type set to "VirtFusion Direct Provisioning".

### Module Configuration Options

Each product has these module-specific settings:

| Option | Name | Description | Default |
|---|---|---|---|
| Config Option 1 | Hypervisor Group ID | VirtFusion hypervisor group for server placement | 1 |
| Config Option 2 | Package ID | VirtFusion package defining server resources | 1 |
| Config Option 3 | Default IPv4 | Number of IPv4 addresses to assign (0-10) | 1 |
| Config Option 4 | Self-Service Mode | Enable VirtFusion self-service billing (0=Disabled, 1=Hourly, 2=Resource Packs, 3=Both) | 0 |
| Config Option 5 | Auto Top-Off Threshold | Credit balance below which auto top-off triggers during cron (0=disabled) | 0 |
| Config Option 6 | Auto Top-Off Amount | Credit amount to add when auto top-off triggers | 100 |
| Config Option 7 | Stock Safety Buffer (%) | Headroom reserved per resource during stock calculation (0-100). Only effective with WHMCS Stock Control enabled on the product; blank falls back to the default. | 10 |

You can find your Hypervisor Group IDs and Package IDs in the VirtFusion admin panel.

### Configurable Options (Dynamic Pricing)

To allow customers to select different resource levels with pricing tiers, create WHMCS Configurable Options groups with these option names:

| VirtFusion Parameter | Default Option Name | Description | Unit |
|---|---|---|---|
| `packageId` | Package | VirtFusion package ID | ID |
| `hypervisorId` | Location | Hypervisor group for placement | ID |
| `ipv4` | IPv4 | Number of IPv4 addresses | Count |
| `memory` | Memory | RAM allocation | MB |
| `cpuCores` | CPU | CPU core count | Cores |
| `storage` | Storage | Disk space | MB |
| `networkSpeedIn` | Network In | Inbound network speed | Mbps |
| `networkSpeedOut` | Network Out | Outbound network speed | Mbps |
| `traffic` | Traffic | Monthly bandwidth | GB |

### Custom Option Name Mapping

If your WHMCS configurable option names differ from the defaults above, create a custom mapping file at `config/ConfigOptionMapping.php`. See `config/ConfigOptionMapping-example.php` for the format.

### Stock Control (Dynamic Inventory)

Enable WHMCS's built-in Stock Control toggle on any VirtFusion product to activate automatic inventory management. The module will keep the product quantity synced to real hypervisor capacity. See the [Stock Control feature description](#stock-control-dynamic-inventory) above for details.

### Reverse DNS Addon (PowerDNS)

The PowerDNS reverse DNS addon is available separately. When installed, it provides automatic PTR record management for all provisioned servers. See the [Reverse DNS feature description](#reverse-dns-optional-powerdns-addon) above for capabilities.

## Directory Structure

```
VirtFusionDirect/
├── VirtFusionDirect.php    Core WHMCS module file (CreateAccount, SuspendAccount, etc.)
├── hooks.php               WHMCS hooks (cart UI, OS sorting, provisioning events, cron jobs)
├── client.php              Client-area API endpoints and self-service actions
├── admin.php               Admin-area backend for managing VirtFusion deployments
├── config/
│   ├── ConfigOptionMapping.php          Active configurable option name mapping
│   └── ConfigOptionMapping-example.php  Example mapping for reference
├── lib/
│   ├── Module.php           VirtFusion API client and core business logic
│   ├── ModuleFunctions.php  Shared utility functions
│   ├── ServerResource.php   Server data normalization and presentation
│   ├── AdminHTML.php        Admin area HTML rendering
│   ├── Cache.php            API response caching
│   ├── ConfigureService.php Service configuration helpers
│   ├── Curl.php             HTTP client wrapper
│   ├── Database.php         Database abstraction layer
│   ├── Log.php              Module logging
│   ├── StockControl.php     Dynamic inventory management
│   └── PowerDns/            PowerDNS reverse DNS integration
│       ├── Client.php
│       ├── Config.php
│       ├── IpUtil.php
│       ├── PtrManager.php
│       └── Resolver.php
└── templates/
    ├── overview.tpl         Client area server overview template
    ├── error.tpl            Error display template
    ├── css/
    │   ├── cart-wizard.css   Checkout OS/SSH key selection styles (FlashRDP grid layout)
    │   └── module.css        Client area module styles
    └── js/
        ├── cart-wizard.js    Checkout OS/SSH key selection logic
        ├── module.js         Client area interactive features
        └── keygen.js         Ed25519 SSH key generator (Web Crypto API)
```

## Troubleshooting

### Common Issues

| Issue | Resolution |
|---|---|
| Module not appearing in WHMCS | Ensure files are owned by the web server user (not `root:root`). Check file permissions. |
| "Test Connection" fails | Verify the hostname does not include `https://` or `/api/v1`. Check the API token has sufficient permissions. |
| OS templates not loading on checkout | Confirm the product has a valid Package ID and Hypervisor Group ID configured. Check Module Log for API errors. |
| Stock shows 0 but capacity exists | Check Module Log for VirtFusion API errors. Transient failures preserve the last known quantity. Use `admin.php?action=stockRecalculate` to force a recalculation. |
| Template changes not visible | Clear the WHMCS template cache: `rm -rf /path/to/whmcs-data/templates_c/*` and restart the web server. |

### Debugging

1. Enable Module Debug Logging in WHMCS Admin under **Utilities > Logs > Module Log**
2. Check the WHMCS activity log for provisioning events
3. Verify API connectivity with the "Test Connection" button on the server configuration page

## License

This project is licensed under the [MIT License](LICENSE.md).

---

**Original project:** [EZSCALE/virtfusion-whmcs-module](https://github.com/EZSCALE/virtfusion-whmcs-module) - Thank you to EZSCALE for creating and maintaining the original VirtFusion WHMCS module.
