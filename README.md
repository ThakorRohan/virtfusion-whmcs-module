# VirtFusionDirect WHMCS Module

**VirtFusionDirect** is a server module for WHMCS that integrates tightly with the VirtFusion control panel via the VirtFusion Global API. It provides comprehensive administrative management, automated server provisioning, and a self-service interface for end-users within WHMCS.

## AI Agent Context & API Documentation

For AI agents and automated code assistants working on this module, an optimized, token-efficient version of the VirtFusion Global API documentation has been generated. 

> [!TIP]
> **Always refer to the structured API documentation in `docs/api/` instead of parsing the massive `docs/openapi.yaml` file.** The markdown files are stripped of verbose JSON examples to save context window tokens while preserving all necessary endpoints, parameters, and schema structures.

### Documentation Index
* **Primary Navigation:** [`docs/api/index.md`](./docs/api/index.md) - Start here to discover available API resource categories.

### Key API Categories
- **Servers:** [`docs/api/servers.md`](./docs/api/servers.md)
- **Servers Networking:** [`docs/api/servers_network.md`](./docs/api/servers_network.md)
- **Firewall:** [`docs/api/servers_network_firewall.md`](./docs/api/servers_network_firewall.md)
- **Hypervisors:** [`docs/api/hypervisors.md`](./docs/api/hypervisors.md) & [`docs/api/hypervisor_groups.md`](./docs/api/hypervisor_groups.md)
- **Users:** [`docs/api/users.md`](./docs/api/users.md)
- **Backups & Media:** [`docs/api/backups.md`](./docs/api/backups.md), [`docs/api/media.md`](./docs/api/media.md)
- **DNS & IP Blocks:** [`docs/api/dns.md`](./docs/api/dns.md), [`docs/api/ip_blocks.md`](./docs/api/ip_blocks.md)
- **Self Service:** [`docs/api/self_service.md`](./docs/api/self_service.md)

## Directory Structure

* `VirtFusionDirect.php` - The core WHMCS module file containing standardized functions (CreateAccount, SuspendAccount, TerminateAccount, etc.).
* `client.php` - End-user capabilities and client-area output management for WHMCS.
* `admin.php` - Administrative backend capabilities for managing VirtFusion deployments from the WHMCS admin area.
* `hooks.php` - Custom WHMCS hooks tied to system events (e.g., automated actions, UI modifications).
* `lib/` - Internal library classes and API client logic used by the module to communicate with VirtFusion.
* `templates/` - Smarty (.tpl) templates utilized for rendering the client area UI.
* `config/` - Module configurations and mapping definitions.
* `docs/` - Documentation, including the raw `openapi.yaml` and the AI-optimized `docs/api/` markdown structure.
