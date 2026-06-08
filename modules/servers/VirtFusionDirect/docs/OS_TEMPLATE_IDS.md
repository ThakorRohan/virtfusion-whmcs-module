# VirtFusion OS Template ID Mapping

Source: `GET /api/v1/media/templates/fromServerPackageSpec/{packageId}`

Template list is **identical across all packages** (Bronze/Silver/Gold/Diamond/Emerald).
Total active templates: **58** | IDs 19 and 56 are deleted/unused gaps.

The `id` field is what gets passed as `operatingSystemId` in the build payload.

Last synced: 2026-06-04

---

## AlmaLinux

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 5 | AlmaLinux | 8 | Minimal | x86_64 |
| 10 | AlmaLinux | 9 | Latest | x86_64 |
| 32 | AlmaLinux | 10 | Latest | x86_64 |
| 36 | AlmaLinux | 10 | Latest (x86-64-v2) | x86_64 |
| 40 | AlmaLinux Kitten | 10 | x86-64-v2 | x86_64 |
| 46 | AlmaLinux | 9 | Desktop | x86_64 |
| 50 | AlmaLinux Kitten | 10 | | x86_64 |
| 58 | AlmaLinux | 9 | Micro | x86_64 |
| 59 | AlmaLinux | 10 | Micro | x86_64 |

## Alpine Linux

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 27 | Alpine Linux | 3.23 | | x86_64 |
| 41 | Alpine Linux | 3.19 | | x86_64 |
| 55 | Alpine Linux | 3.15 | | x86_64 |

## CentOS

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 1 | CentOS | 7 | Minimal | x86_64 |
| 2 | CentOS Stream | 9 | Minimal | x86_64 |
| 43 | CentOS | Stream 8 | Minimal | x86_64 |

## Debian

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 7 | Debian | 11 (Bullseye) | Minimal | x86_64 |
| 15 | Debian | 12 (Bookworm) | Minimal | x86_64 |
| 22 | Debian | 13 (Trixie) | Cloud Micro | x86_64 |
| 23 | Debian | 13 (Trixie) | XFCE Desktop Mini | x86_64 |
| 25 | Debian | 13 (Trixie) | GNOME Desktop Mini | x86_64 |
| 26 | Debian | 12 (Bookworm) | Cloud Micro | x86_64 |
| 34 | Debian | 13 (Trixie) | Minimal | x86_64 |
| 37 | Debian | 12 (Bookworm) | ext4 | x86_64 |
| 42 | Debian | 10 (Buster) | Minimal | x86_64 |

## Fedora

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 9 | Fedora | 37 | Minimal | x86_64 |
| 12 | Fedora | 39 | Minimal | x86_64 |
| 13 | Fedora | 40 | Minimal | x86_64 |
| 29 | Fedora | 43 | Minimal | x86_64 |
| 35 | Fedora | 42 | Minimal | x86_64 |
| 38 | Fedora | 41 | Minimal | x86_64 |
| 51 | Fedora | 38 | Minimal | x86_64 |

## FreeBSD

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 31 | FreeBSD | 15.0 | Minimal | x86_64 |
| 33 | FreeBSD | 14.3 | Minimal | x86_64 |
| 39 | FreeBSD | 14.2 | Minimal | x86_64 |
| 45 | FreeBSD | 13.2 | Minimal | x86_64 |
| 48 | FreeBSD | 14.0 | Minimal | x86_64 |
| 49 | FreeBSD | 14.1 | Minimal | x86_64 |
| 53 | FreeBSD | 13.3 | Minimal | x86_64 |

## Other

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 4 | openSUSE | Leap 15 | Minimal | x86_64 |
| 14 | Oracle Linux | 9 | Minimal | x86_64 |
| 44 | Arch Linux | Latest | Minimal | x86_64 |
| 54 | CloudLinux | 9 | Latest | x86_64 |
| 57 | Oracle Linux | 8 | Minimal | x86_64 |

## Rocky Linux

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 6 | Rocky Linux | 8 | Minimal | x86_64 |
| 11 | Rocky Linux | 9 | Minimal | x86_64 |
| 30 | Rocky Linux | 10 | Latest | x86_64 |
| 52 | Rocky Linux | 9 | Desktop | x86_64 |

## Ubuntu

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 3 | Ubuntu Server | 20.04 LTS (Focal Fossa) | Minimal | x86_64 |
| 8 | Ubuntu Server | 22.04 LTS (Jammy Jellyfish) | Minimal | x86_64 |
| 16 | Ubuntu Server | 24.04 LTS (Noble Numbat) | Minimal | x86_64 |
| 21 | Ubuntu | 22.04 LTS (Jammy Jellyfish) | | aarch64 |
| 24 | Ubuntu | 22.04 LTS (Jammy Jellyfish) | Cloud Micro | x86_64 |
| 28 | Ubuntu | 24.04 LTS (Noble Numbat) | Cloud Micro | x86_64 |
| 47 | Ubuntu Server | 18.04 LTS (Bionic Beaver) | Minimal | x86_64 |

## Windows

| ID | Name | Version | Variant | Arch |
|----|------|---------|---------|------|
| 17 | Windows Server | 2022 | Standard | x86_64 |
| 18 | Windows Server | 2019 | Standard | x86_64 |
| 20 | Windows Server | 2025 | Standard | x86_64 |
| 60 | Windows Server | 2022 | Optimised | x86_64 |

---

## UUID Reference

Full UUIDs for all templates (needed for some VF API calls):

| ID | UUID |
|----|------|
| 1 | `409f6475-ee16-4b97-bc51-fdf1955561cf` |
| 2 | `75e17127-4db7-4c7e-a8a7-e960fd1d998d` |
| 3 | `2ab6e28b-cfb8-4505-b883-b6859ebbf378` |
| 4 | `70620e50-515b-41ad-8d82-df94240f4090` |
| 5 | `5505fda8-3b3b-4622-b677-0bdc2be7eaad` |
| 6 | `2ad07113-0f43-452b-8f74-8451f25143af` |
| 7 | `a3e4b0d9-2533-4391-9099-c59d4144eb44` |
| 8 | `9c22685f-8cfc-42a3-a28b-c3d54ed88a0c` |
| 9 | `87872a4c-126d-462e-b11d-2dc66b481d90` |
| 10 | `bf39532f-49b4-44d6-a89f-5b38cf271878` |
| 11 | `ff544d2f-fc5a-4afc-8f96-bf9c0cb40dd7` |
| 12 | `274db539-59d3-45b7-8954-bb831c510b40` |
| 13 | `f265f8de-b7ce-47ae-80f7-9c2403603d66` |
| 14 | `5383fe76-674b-4014-bd66-c2b2d8cf8612` |
| 15 | `48eddc8e-26e3-4f2f-a339-3fe522074ea9` |
| 16 | `15d88751-182d-4083-8ff4-fedbe72591fc` |
| 17 | `5def350c-3763-45bd-ad6b-556c82ab5b0c` |
| 18 | `0294398e-03a6-47c6-abca-239cf26ba104` |
| 20 | `ac464ffa-6e7e-4157-a408-0dc8f26cef29` |
| 21 | `17b9ee95-14cc-4452-83cf-d9a1862a8cb9` |
| 22 | `342b93cb-e9a9-484d-83a9-a28d5b06a61f` |
| 23 | `372f8314-b4b2-476f-927f-6b9aaa4a20a8` |
| 24 | `22d78865-54c4-4644-b480-326af191c924` |
| 25 | `d7fd3d28-e1bf-451c-9761-2a41e9fe9f17` |
| 26 | `6a9feb06-7c77-4d14-a0e7-c814b2d76bcc` |
| 27 | `7ac67765-b3ed-4e4e-873d-0edeac51b7bf` |
| 28 | `e72e0307-1805-41d9-a097-37282a5e9b19` |
| 29 | `aa9121f6-75e1-43fa-93d9-9c1dcc00c2ce` |
| 30 | `a32e4b8f-2c16-4c85-ac74-ace9bb12930c` |
| 31 | `d2e0fbde-d078-47c9-abbb-cf1d81d8f780` |
| 32 | `4fa068be-d634-41ac-9b52-31c657d5ec40` |
| 33 | `eb909a12-5453-46e3-93fc-207e1f3ce7a2` |
| 34 | `ef27559e-e137-4788-82b2-bb271db540ca` |
| 35 | `4607f817-b2a7-49b4-b4d1-450823220d6c` |
| 36 | `e4bf060d-f5f5-41af-a19b-9b5014ae844f` |
| 37 | `69d7178d-9fc6-4a66-9932-3c314d96c020` |
| 38 | `ca3316fb-36b0-4fad-94f4-c25c94300c26` |
| 39 | `7ec9a3bb-ba6b-4a27-927d-993e068de77b` |
| 40 | `29c8fea6-4158-4571-bc9a-c6962fd698fc` |
| 41 | `798d1870-dcf2-4d0d-8aba-ad2288dbfd2d` |
| 42 | `002dbc95-aa4b-40c0-8b08-a1eca5f2d2f6` |
| 43 | `1cc623ae-e8d9-4634-8912-421627596870` |
| 44 | `76ac4b3a-44fc-4503-9107-c7ab2bdc57cc` |
| 45 | `eaaa1686-8396-4109-a28d-eb994b595f01` |
| 46 | `3d4bbbdc-d991-430c-9e7e-4e41cd7c5b20` |
| 47 | `58fefefc-ed01-4b9a-bf4b-323747731ebc` |
| 48 | `2c2970de-0a2d-4523-919d-3e674968e3a3` |
| 49 | `eeb4c0c5-970f-46a9-a9e5-2dfd23273c05` |
| 50 | `3dc0df64-7d54-45c7-b69a-30513827222` |
| 51 | `490300a2-0467-4840-986f-e5872b6d388e` |
| 52 | `7a7c645d-ec48-41ac-a112-e21314a7efba` |
| 53 | `76a10c69-bb65-45be-9bb9-0f38cc941863` |
| 54 | `f72d93a9-91a6-4d52-a3a8-52aa95221846` |
| 55 | `2a2fc82c-4948-45af-aed1-22492bbf156a` |
| 57 | `e0489ddf-2a34-42cd-8924-7f05b349c775` |
| 58 | `e6ba2136-d9c2-4c4c-a756-689a16ae2ace` |
| 59 | `57fb2c8d-7db1-4f05-8503-6d2ee32814a9` |
| 60 | `789305d7-2927-4af6-a57e-cd8c6e20cffc` |
