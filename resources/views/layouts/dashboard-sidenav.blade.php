<!DOCTYPE html>
<html lang="en">

<head>
  <script>
    (function() {
      try {
        const savedMode = localStorage.getItem('lightMode') || 'light';
        document.documentElement.setAttribute('light-mode', savedMode);
        document.documentElement.setAttribute('data-layout-mode', savedMode);
        if (savedMode === 'dark') {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch(e) { console.error(e); }
    })();
  </script>
  <meta charset="utf-8" />
  <title>@yield('title') - মেসার্স আনিস ষ্টোর</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Preload Custom Fonts to Prevent FOUT (Flash of Unstyled Text) -->
    <link rel="preload" href="/fonts/bricolage_grotesque_normal_400.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/bricolage_grotesque_normal_700.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="/fonts/tiro_bangla_normal_400.ttf" as="font" type="font/ttf" crossorigin>

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ asset('back-end/assets/icons/favicon.svg') }}" type="image/x-icon" />



  <!-- Bootstrap Css -->
  <link href="{{ asset('back-end/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
    type="text/css" />
  {{-- <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Select2 CSS & JS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- HTML5 QR & Barcode Scanner Library -->
  <script src="https://unpkg.com/html5-qrcode@2.3.8/html5-qrcode.min.js"></script>




  <!-- Vanilla Datepicker -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/css/datepicker.min.css" />




  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="{{ asset('back-end/assets/css/toastify.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('back-end/assets/css/animate.min.css') }}" rel="stylesheet" />
  <script src="{{ asset('back-end/assets/js/toastify-js.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/axios.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/config.js') }}"></script>

    <style>
    /* Refined Synced Theme Colors - Backgrounds & Borders */
    :root {
        --macs-bg: #ffffff !important; /* Solid White for Light Mode */
        --macs-border: #e5e7eb !important; /* Clean Light Grey border */
        --macs-text: #4b5563 !important;
        --macs-text-active: #000000 !important;
        --macs-icon: #9ca3af !important;
        --macs-icon-active: #059669 !important; /* Emerald active green */
        --macs-hover: #f3f4f6 !important;
        --macs-blue-bg: #eff6ff !important;
        --macs-blue-border: #bfdbfe !important;
        --macs-blue-text: #1d4ed8 !important;
        
        /* Pill Backgrounds (Light mode) */
        --macs-pill-bg: #f3f4f6 !important;
        --macs-pill-border: #e5e7eb !important;
    }

    /* Vertical Sidenav Box */
    .vertical-menu {
        width: 260px !important;
        background: var(--macs-bg) !important;
        border-right: 1px solid var(--macs-border) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02) !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        height: 100vh !important;
        position: fixed !important;
        top: 0 !important;
        bottom: 0 !important;
        left: 0 !important;
        z-index: 1001 !important;
        overflow: hidden !important;
        transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .main-content {
        margin-left: 260px !important;
        transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Topbar Header Sizing & Colors (MACS style) */
    .isvertical-topbar,
    #page-topbar {
        left: 260px !important;
        background-color: var(--macs-bg) !important;
        border-bottom: 1px solid var(--macs-border) !important;
        box-shadow: none !important;
        transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    .isvertical-topbar .navbar-header button,
    .isvertical-topbar .navbar-header a {
        color: #1f2937 !important;
    }

    /* Collapsed Sidebar on Desktop (MACS Style) */
    body.sidebar-collapsed .vertical-menu {
        width: 72px !important;
        transform: none !important;
        overflow: visible !important; /* Allows sub-menu popups to overflow outside the 72px width */
    }
    body.sidebar-collapsed .main-content {
        margin-left: 72px !important;
    }
    body.sidebar-collapsed .isvertical-topbar,
    body.sidebar-collapsed #page-topbar {
        left: 72px !important;
    }

    /* Sidebar Top Brand Header (Fixed from position fixed to relative) */
    .vertical-menu .navbar-brand-box {
        position: relative !important; /* No longer fixed to top left of screen */
        width: 100% !important;
        background: var(--macs-bg) !important;
        border-bottom: 1px solid var(--macs-border) !important;
        height: 72px !important;
        display: flex !important;
        align-items: center !important;
        padding: 0 20px !important;
        box-shadow: none !important;
        flex-shrink: 0 !important;
        justify-content: flex-start !important;
    }

    .vertical-menu .navbar-brand-box img {
        border-radius: 8px !important;
        border: 1px solid var(--macs-border) !important;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03) !important;
        flex-shrink: 0 !important;
    }

    .vertical-menu .navbar-brand-box .brand-text {
        font-weight: 800 !important;
        font-size: 16px !important;
        color: #059669 !important;
    }

    /* Brand Box state when collapsed */
    body.sidebar-collapsed .vertical-menu .navbar-brand-box {
        padding: 0 !important;
        justify-content: center !important;
    }
    body.sidebar-collapsed .vertical-menu .navbar-brand-box .brand-text {
        display: none !important;
    }

    /* Sliding Panels Track Layout */
    .sidebar-menu-scroll {
        flex-grow: 1 !important;
        overflow: hidden !important;
        position: relative !important;
        width: 100% !important;
    }

    .sidebar-panels-track {
        display: flex !important;
        width: 200% !important; /* Two panels wide */
        height: 100% !important;
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Slide Left when showing submenu */
    .sidebar-menu-scroll.show-submenu .sidebar-panels-track {
        transform: translateX(-50%) !important;
    }

    /* Prevent animations during load restore state */
    .sidebar-menu-scroll.no-transition .sidebar-panels-track {
        transition: none !important;
    }

    .menu-panel {
        width: 50% !important;
        height: 100% !important;
        flex-shrink: 0 !important;
        overflow-y: auto !important;
        padding: 15px 12px !important;
        display: flex !important;
        flex-direction: column !important;
    }

    /* Custom scrollbar for menu panels */
    .menu-panel::-webkit-scrollbar {
        width: 4px !important;
    }
    .menu-panel::-webkit-scrollbar-thumb {
        background: #e5e7eb !important;
        border-radius: 2px !important;
    }

    /* Menu List Items */
    .menu-panel ul {
        list-style: none !important;
        padding: 0 !important;
        margin: 0 !important;
    }

    .menu-panel ul li {
        margin-bottom: 4px !important;
        position: relative !important;
    }

    .menu-panel ul li a {
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        padding: 12px 14px !important;
        color: var(--macs-text) !important;
        font-weight: 500 !important;
        font-size: 14px !important;
        border-radius: 10px !important;
        transition: all 0.15s ease !important;
        cursor: pointer !important;
        text-decoration: none !important;
    }

    .menu-panel ul li a .item-content {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
    }

    .menu-panel ul li a i.icon {
        color: var(--macs-icon) !important;
        font-size: 16px !important;
        width: 20px !important;
        text-align: center !important;
        transition: color 0.15s ease !important;
    }

    .menu-panel ul li a i.chevron {
        color: #d1d5db !important;
        font-size: 12px !important;
        transition: color 0.15s ease !important;
    }

    /* Hover State */
    .menu-panel ul li a:hover {
        background: var(--macs-hover) !important;
        color: var(--macs-text-active) !important;
    }
    .menu-panel ul li a:hover i.icon {
        color: var(--macs-text) !important;
    }

    /* Active State (Top-Level URL match) */
    .menu-panel ul li.active-link.active > a,
    .menu-panel ul li.active-link > a.active,
    .menu-panel ul li.submenu-active.active > a,
    .menu-panel ul li.active > a {
        background: var(--macs-hover) !important;
        color: var(--macs-text-active) !important;
        font-weight: 700 !important;
    }

    .menu-panel ul li.active-link.active > a i.icon,
    .menu-panel ul li.active-link > a.active i.icon,
    .menu-panel ul li.submenu-active.active > a i.icon,
    .menu-panel ul li.active > a i.icon {
        color: var(--macs-icon-active) !important;
    }

    /* Back Button on Submenus */
    .submenu-back-btn {
        display: flex !important;
        align-items: center !important;
        padding: 10px 14px !important;
        background: var(--macs-blue-bg) !important;
        border: 1px solid var(--macs-blue-border) !important;
        color: var(--macs-blue-text) !important;
        font-weight: 700 !important;
        font-size: 14px !important;
        border-radius: 8px !important;
        cursor: pointer !important;
        margin-bottom: 12px !important;
        transition: all 0.15s ease !important;
    }

    .submenu-back-btn:hover {
        background: #dbeafe !important;
    }

    /* Submenu List Styling inside panel */
    .submenu-panel ul li a {
        justify-content: flex-start !important;
        gap: 12px !important;
    }

    /* Topbar Profile Pill */
    .user-profile-pill {
        background: var(--macs-pill-bg) !important;
        border: 1px solid var(--macs-pill-border) !important;
        border-radius: 30px !important;
        padding: 6px 14px !important;
        height: auto !important;
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        transition: all 0.2s ease !important;
    }

    .user-profile-pill .avatar-box {
        width: 28px !important;
        height: 28px !important;
        border-radius: 6px !important;
        background: #e5e7eb !important;
        color: #1f2937 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-weight: 700 !important;
        font-size: 13px !important;
    }

    .user-profile-pill .user-meta .name-text {
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #1f2937 !important;
    }

    .user-profile-pill .user-meta .role-text {
        font-size: 9px !important;
        font-weight: 800 !important;
        color: #2563eb !important;
        letter-spacing: 0.5px !important;
    }

    /* Navbar Theme Toggle Button */
    .theme-toggle-btn {
        background: var(--macs-pill-bg) !important;
        border: 1px solid var(--macs-pill-border) !important;
        border-radius: 10px !important;
        width: 40px !important;
        height: 40px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.2s ease !important;
        cursor: pointer !important;
    }

    /* Sidebar Toggler Button */
    .sidebar-toggle-box {
        background: var(--macs-pill-bg) !important;
        border: 1px solid var(--macs-pill-border) !important;
        border-radius: 10px !important;
        width: 40px !important;
        height: 40px !important;
        color: #4b5563 !important;
        transition: all 0.2s ease !important;
        cursor: pointer !important;
    }

    /* Profile Dropdown Box Styling */
    .profile-dropdown {
        border-radius: 12px !important;
        padding: 8px !important;
        min-width: 220px !important;
        background: #ffffff !important;
        border: 1px solid #f3f4f6 !important;
    }
    
    .profile-dropdown .dropdown-item {
        border-radius: 8px !important;
        color: #4b5563 !important;
        font-size: 14px !important;
        font-weight: 500 !important;
        transition: all 0.15s ease !important;
        background: none !important;
    }

    .profile-dropdown .dropdown-item:hover {
        background: #f3f4f6 !important;
        color: #000000 !important;
    }

    .profile-dropdown .theme-badge {
        background: #e5e7eb !important;
        color: #4b5563 !important;
        border-radius: 6px !important;
        font-weight: 700 !important;
    }
    
    .profile-dropdown .dropdown-divider {
        border-color: #f3f4f6 !important;
    }

    /* Notification Dropdown */
    .notifications-dropdown {
        border-radius: 12px !important;
        padding: 0 !important;
        width: 320px !important;
        background: #ffffff !important;
        border: 1px solid #f3f4f6 !important;
        overflow: hidden !important;
    }

    .notifications-dropdown .dropdown-header {
        padding: 16px 20px !important;
        border-bottom: 1px solid #f3f4f6 !important;
        font-size: 15px !important;
        font-weight: 700 !important;
        color: #1f2937 !important;
        background: #ffffff !important;
        text-align: start !important;
    }

    .notifications-dropdown .notification-item {
        display: flex !important;
        align-items: flex-start !important;
        gap: 12px !important;
        padding: 14px 20px !important;
        border-bottom: 1px solid #f3f4f6 !important;
        text-decoration: none !important;
        transition: background 0.15s ease !important;
    }

    .notifications-dropdown .notification-item:hover {
        background: #f9fafb !important;
    }

    .notifications-dropdown .notification-dot {
        width: 8px !important;
        height: 8px !important;
        border-radius: 50% !important;
        margin-top: 6px !important;
        flex-shrink: 0 !important;
    }

    .notifications-dropdown .notification-content {
        display: flex !important;
        flex-direction: column !important;
        gap: 2px !important;
        text-align: start !important;
    }

    .notifications-dropdown .notification-title {
        font-size: 13.5px !important;
        font-weight: 700 !important;
        color: #1f2937 !important;
        margin: 0 !important;
    }

    .notifications-dropdown .notification-desc {
        font-size: 12px !important;
        color: #6b7280 !important;
        margin: 0 !important;
        line-height: 1.4 !important;
    }

    /* Sidebar Footer (MACS School Style) */
    .sidebar-footer {
        border-top: 1px solid var(--macs-border) !important;
        padding: 16px 20px !important;
        background: var(--macs-bg) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: space-between !important;
        flex-shrink: 0 !important;
    }

    .sidebar-footer .user-profile-box {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        overflow: hidden !important;
        max-width: 155px !important;
    }

    .sidebar-footer .user-avatar {
        width: 36px !important;
        height: 36px !important;
        border-radius: 50% !important;
        background: #0f172a !important; /* Dark Slate circle */
        color: #ffffff !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-weight: 700 !important;
        font-size: 14px !important;
        flex-shrink: 0 !important;
        border: 1px solid var(--macs-border) !important;
    }

    .sidebar-footer .user-info {
        display: flex !important;
        flex-direction: column !important;
        overflow: hidden !important;
    }

    .sidebar-footer .user-info .user-name {
        font-size: 14px !important;
        font-weight: 700 !important;
        color: #1f2937 !important;
        white-space: nowrap !important;
        text-overflow: ellipsis !important;
        overflow: hidden !important;
    }

    .sidebar-footer .footer-actions {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
        color: var(--macs-text) !important;
        position: relative !important;
    }

    .sidebar-footer .footer-actions .footer-action-btn {
        background: none !important;
        border: none !important;
        padding: 0 !important;
        color: var(--macs-text) !important;
        cursor: pointer !important;
        font-size: 16px !important;
        transition: color 0.15s ease !important;
        display: flex !important;
        align-items: center !important;
    }

    .sidebar-footer .footer-actions .footer-action-btn:hover {
        color: var(--macs-text-active) !important;
    }

    /* Sidebar Footer Profile Popover (MACS style) */
    .footer-profile-popup {
        position: absolute !important;
        bottom: 56px !important;
        right: 15px !important;
        left: auto !important;
        transform: none !important;
        border-radius: 12px !important;
        padding: 12px !important;
        min-width: 220px !important;
        background: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.03) !important;
        z-index: 1050 !important;
        display: none;
    }
    
    .footer-profile-popup.show {
        display: block !important;
    }

    .footer-profile-popup .popup-header {
        padding: 4px 8px !important;
        text-align: start !important;
    }

    .footer-profile-popup .popup-header .popup-name {
        font-size: 14.5px !important;
        font-weight: 700 !important;
        color: #1f2937 !important;
        margin: 0 !important;
    }

    .footer-profile-popup .popup-header .popup-email {
        font-size: 11.5px !important;
        color: #6b7280 !important;
        word-break: break-all !important;
    }

    .footer-profile-popup .dropdown-item {
        border-radius: 8px !important;
        color: #4b5563 !important;
        font-size: 13.5px !important;
        font-weight: 500 !important;
        transition: all 0.15s ease !important;
        background: none !important;
        text-align: start !important;
        display: flex !important;
        align-items: center;
    }

    .footer-profile-popup .dropdown-item:hover {
        background: #f3f4f6 !important;
        color: #000000 !important;
    }

    .footer-profile-popup .dropdown-divider {
        border-color: #f3f4f6 !important;
        margin: 8px 0 !important;
    }

    /* MACS Collapsed Sidenav overrides (Forces 72px width and floating popups) */
    body.sidebar-collapsed .vertical-menu {
        width: 72px !important;
        transform: none !important;
        overflow: visible !important; /* Allows sub-menu popups to overflow outside the 72px width */
    }
    body.sidebar-collapsed .main-content {
        margin-left: 72px !important;
    }
    body.sidebar-collapsed .isvertical-topbar,
    body.sidebar-collapsed #page-topbar {
        left: 72px !important;
    }

    body.sidebar-collapsed .vertical-menu .navbar-brand-box {
        padding: 0 !important;
        justify-content: center !important;
        width: 72px !important;
    }
    body.sidebar-collapsed .vertical-menu .navbar-brand-box .brand-text {
        display: none !important;
    }
    
    body.sidebar-collapsed .vertical-menu .menu-panel {
        padding: 15px 8px !important;
        overflow: visible !important;
    }
    body.sidebar-collapsed .sidebar-menu-scroll {
        overflow: visible !important;
    }
    body.sidebar-collapsed .sidebar-panels-track {
        width: 100% !important;
        transform: none !important;
        overflow: visible !important;
    }
    body.sidebar-collapsed .sidebar-menu-scroll.show-submenu .sidebar-panels-track {
        transform: none !important;
    }
    body.sidebar-collapsed .submenu-panel {
        display: none !important;
    }
    body.sidebar-collapsed .main-menu-panel {
        width: 100% !important;
    }
    
    body.sidebar-collapsed .vertical-menu ul li a {
        padding: 12px 0 !important;
        justify-content: center !important;
    }
    body.sidebar-collapsed .vertical-menu ul li a .text,
    body.sidebar-collapsed .vertical-menu ul li a i.chevron {
        display: none !important;
    }
    
    body.sidebar-collapsed .sidebar-footer {
        padding: 16px 0 !important;
        justify-content: center !important;
    }
    body.sidebar-collapsed .sidebar-footer .user-info,
    body.sidebar-collapsed .sidebar-footer .footer-actions {
        display: none !important;
    }
    
    /* Floating Submenu Popup on Hover when collapsed */
    body.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu {
        display: block !important;
        position: absolute !important;
        left: 70px !important;
        top: 0 !important;
        background: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        border-radius: 12px !important;
        width: 220px !important;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.08) !important;
        z-index: 9999 !important;
        padding: 10px !important;
        list-style: none !important;
    }

    html.dark.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu,
    body[light-mode="dark"].sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu {
        background: #0a110f !important;
        border-color: rgba(255, 255, 255, 0.05) !important;
    }

    /* Inject Header inside floating sub-menu */
    body.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu::before {
        content: attr(data-menu-title) !important;
        display: block !important;
        padding: 4px 12px 10px 12px !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        color: #9ca3af !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
        border-bottom: 1px solid #f3f4f6 !important;
        margin-bottom: 6px !important;
    }
    
    html.dark.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu::before,
    body[light-mode="dark"].sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu::before {
        border-bottom-color: rgba(255, 255, 255, 0.05) !important;
    }

    body.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu li {
        width: 100% !important;
    }

    body.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu li a {
        display: flex !important;
        justify-content: flex-start !important;
        padding: 8px 12px !important;
        font-size: 13.5px !important;
        border-radius: 8px !important;
    }
    body.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu li a .text {
        display: inline !important;
    }
    body.sidebar-collapsed .vertical-menu ul li.submenu-active:hover > ul.sub-menu li a i.icon {
        display: none !important;
    }

    /* Dark Mode Theme overrides (Synchronized with Slate-black gradient) */
    html.dark .vertical-menu,
    body[light-mode="dark"] .vertical-menu {
        background: #0a110f !important; /* Slate black-green background */
        border-right-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .isvertical-topbar,
    html.dark #page-topbar,
    body[light-mode="dark"] .isvertical-topbar,
    body[light-mode="dark"] #page-topbar {
        background-color: #0a110f !important;
        border-bottom-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .isvertical-topbar .navbar-header button,
    html.dark .isvertical-topbar .navbar-header a,
    body[light-mode="dark"] .isvertical-topbar .navbar-header button,
    body[light-mode="dark"] .isvertical-topbar .navbar-header a {
        color: #cbd5e1 !important;
    }

    html.dark .vertical-menu .navbar-brand-box,
    body[light-mode="dark"] .vertical-menu .navbar-brand-box {
        background: #0a110f !important;
        border-bottom-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .vertical-menu .navbar-brand-box .brand-text,
    body[light-mode="dark"] .vertical-menu .navbar-brand-box .brand-text {
        color: #10b981 !important;
    }

    html.dark .sidebar-footer,
    body[light-mode="dark"] .sidebar-footer {
        background: #0a110f !important;
        border-top-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .sidebar-footer .user-profile-box .user-name,
    body[light-mode="dark"] .sidebar-footer .user-profile-box .user-name {
        color: #e5e7eb !important;
    }

    html.dark .sidebar-footer .user-profile-box .user-avatar,
    body[light-mode="dark"] .sidebar-footer .user-profile-box .user-avatar {
        background: #13221e !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
    }

    html.dark .user-profile-pill,
    body[light-mode="dark"] .user-profile-pill {
        background: #13221e !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
    }

    html.dark .user-profile-pill .avatar-box,
    body[light-mode="dark"] .user-profile-pill .avatar-box {
        background: #1c322c !important;
        color: #a7f3d0 !important;
    }

    html.dark .user-profile-pill .user-meta .name-text,
    body[light-mode="dark"] .user-profile-pill .user-meta .name-text {
        color: #cbd5e1 !important;
    }

    html.dark .user-profile-pill .user-meta .role-text,
    body[light-mode="dark"] .user-profile-pill .user-meta .role-text {
        color: #38bdf8 !important;
    }

    html.dark .theme-toggle-btn,
    body[light-mode="dark"] .theme-toggle-btn {
        background: #13221e !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
    }

    html.dark .sidebar-toggle-box,
    body[light-mode="dark"] .sidebar-toggle-box {
        background: #13221e !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
        color: #cbd5e1 !important;
    }

    html.dark .menu-panel ul li a,
    body[light-mode="dark"] .menu-panel ul li a {
        color: #9ca3af !important;
    }

    html.dark .menu-panel ul li a:hover,
    body[light-mode="dark"] .menu-panel ul li a:hover {
        background: #13221e !important;
        color: #ffffff !important;
    }

    html.dark .menu-panel ul li.active-link.active > a,
    html.dark .menu-panel ul li.active-link > a.active,
    html.dark .menu-panel ul li.submenu-active.active > a,
    html.dark .menu-panel ul li.active > a,
    body[light-mode="dark"] .menu-panel ul li.active-link.active > a,
    body[light-mode="dark"] .menu-panel ul li.active-link > a.active,
    body[light-mode="dark"] .menu-panel ul li.submenu-active.active > a,
    body[light-mode="dark"] .menu-panel ul li.active > a {
        background: #13221e !important;
        color: #ffffff !important;
    }

    html.dark .submenu-back-btn,
    body[light-mode="dark"] .submenu-back-btn {
        background: #13221e !important;
        border-color: rgba(255, 255, 255, 0.06) !important;
        color: #a7f3d0 !important;
    }

    html.dark .submenu-back-btn:hover,
    body[light-mode="dark"] .submenu-back-btn:hover {
        background: #1c322c !important;
    }

    html.dark .profile-dropdown,
    body[light-mode="dark"] .profile-dropdown {
        background: #0a110f !important;
        border-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .profile-dropdown .dropdown-item:hover,
    body[light-mode="dark"] .profile-dropdown .dropdown-item:hover {
        background: #13221e !important;
        color: #ffffff !important;
    }

    html.dark .profile-dropdown .theme-badge,
    body[light-mode="dark"] .profile-dropdown .theme-badge {
        background: #13221e !important;
        color: #cbd5e1 !important;
    }

    html.dark .footer-profile-popup,
    body[light-mode="dark"] .footer-profile-popup {
        background: #0a110f !important;
        border-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .footer-profile-popup .dropdown-item:hover,
    body[light-mode="dark"] .footer-profile-popup .dropdown-item:hover {
        background: #13221e !important;
        color: #ffffff !important;
    }

    html.dark .notifications-dropdown,
    body[light-mode="dark"] .notifications-dropdown {
        background: #0a110f !important;
        border-color: rgba(255, 255, 255, 0.04) !important;
    }

    html.dark .notifications-dropdown .dropdown-header,
    body[light-mode="dark"] .notifications-dropdown .dropdown-header {
        background: #0a110f !important;
        border-bottom-color: rgba(255, 255, 255, 0.04) !important;
        color: #f8fafc !important;
    }

    html.dark .notifications-dropdown .notification-item:hover,
    body[light-mode="dark"] .notifications-dropdown .notification-item:hover {
        background: #13221e !important;
    }

    html.dark .sidebar-footer .footer-actions a,
    html.dark .sidebar-footer .footer-actions button,
    body[light-mode="dark"] .sidebar-footer .footer-actions a,
    body[light-mode="dark"] .sidebar-footer .footer-actions button {
        color: #cbd5e1 !important;
    }

    html.dark .sidebar-footer .footer-actions a:hover,
    html.dark .sidebar-footer .footer-actions button:hover,
    body[light-mode="dark"] .sidebar-footer .footer-actions a:hover,
    body[light-mode="dark"] .sidebar-footer .footer-actions button:hover {
        color: #ffffff !important;
    }

    /* Mobile Responsive Rules */
    @media (max-width: 992px) {
        .vertical-menu {
            transform: translateX(-260px) !important;
            left: 0 !important;
        }
        body.sidebar-enable .vertical-menu {
            transform: translateX(0) !important;
        }
        .main-content {
            margin-left: 0 !important;
        }
        .isvertical-topbar {
            left: 0 !important;
        }
    }
</style>

  {{-- <style>
    /* styles.css */

    /* Preloader Styling */
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, #0f0f0f, #1a1a1a);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    .Lodar-bar-container {
      display: flex;
      justify-content: center;
      gap: 10px;
      margin-bottom: 20px;
    }

    .Lodar-bar {
      width: 10px;
      height: 50px;
      background: linear-gradient(45deg, #dbeffd, #dbeffd);
      border-radius: 5px;
      animation: bounce 1.2s infinite ease-in-out;
    }

    .Lodar-bar:nth-child(1) {
      animation-delay: 0s;
    }

    .Lodar-bar:nth-child(2) {
      animation-delay: 0.2s;
    }

    .Lodar-bar:nth-child(3) {
      animation-delay: 0.4s;
    }

    .Lodar-bar:nth-child(4) {
      animation-delay: 0.6s;
    }

    .Lodar-bar:nth-child(5) {
      animation-delay: 0.8s;
    }

    #preloader .loder-loading {
      color: #fff;
      font-size: 16px;
      margin-top: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      animation: fadeIn 1s ease-in-out infinite;
    }

    /* Hide Content Initially */
    #Lodarcontent {
      display: none;
      opacity: 0;
      transition: opacity 0.5s ease-in-out;
    }

    /* Animations */
    @keyframes bounce {

      0%,
      100% {
        transform: scaleY(1);
      }

      50% {
        transform: scaleY(2);
      }
    }

    @keyframes fadeIn {

      0%,
      100% {
        opacity: 1;
      }

      50% {
        opacity: 0.5;
      }
    }
  </style> --}}

</head>

<body>

  {{-- <div id="preloader">
    <div class="Lodar-bar-container">
      <div class="Lodar-bar"></div>
      <div class="Lodar-bar"></div>
      <div class="Lodar-bar"></div>
      <div class="Lodar-bar"></div>
      <div class="Lodar-bar"></div>
    </div>
    <h1 class="loder-loading">Loading...</h1>
  </div> --}}

  <div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
      <div class="indeterminate"></div>
    </div>
  </div>




    <!-- Navbar Start -->
  <nav id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
      <div class="d-flex">
        <!-- Sidebar Split Layout Toggler Button (MACS style) -->
        <button type="button" class="btn btn-sm px-3 header-item waves-effect vertical-menu-btn" style="background: none; border: none; padding: 0 12px; display: flex; align-items: center; justify-content: center;">
          <div class="sidebar-toggle-box d-flex align-items-center justify-content-center">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="sidebar-toggle-svg">
              <rect width="18" height="18" x="3" y="3" rx="2" />
              <path d="M9 3v18" />
            </svg>
          </div>
        </button>

        
      </div>

      <div class="d-flex align-items-center gap-2">
        <!-- Theme Toggle Button (MACS style, left of User profile) -->
        <button class="theme-toggle-btn text-dark font-size-22 header-item waves-effect d-flex align-items-center justify-content-center" onclick="toggleLightMode()" title="Toggle Dark/Light Mode">
          <i class="fa-solid fa-moon theme-icon-moon" style="font-size: 18px; color: #64748b;"></i>
          <i class="fa-solid fa-sun theme-icon-sun" style="font-size: 18px; color: #fbbf24; display: none;"></i>
        </button>

        <!-- Notification Bell Dropdown (MACS style) -->
        <div class="dropdown d-inline-block position-relative">
          <button type="button" class="btn header-item noti-icon position-relative"
            id="page-header-notifications-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" title="কম স্টক নোটিফিকেশন" style="border: none; background: none; padding: 0 12px;">
            <i class="fa-regular fa-bell" style="font-size: 20px; color: #64748b;"></i>
            <span id="noti-count-badge" class="badge rounded-pill bg-danger" style="position: absolute; top: 12px; right: 6px; font-size: 10px; font-weight: bold; border: 2px solid white; display: none;">0</span>
          </button>
          <div class="dropdown-menu dropdown-menu-end notifications-dropdown shadow-lg border-0" aria-labelledby="page-header-notifications-dropdown-v">
            <div class="dropdown-header">Notifications</div>
            <div id="notification-items-list" style="max-height: 320px; overflow-y: auto;">
              <!-- Dynamic Low Stock Product Notifications Populated via JS -->
              <div class="text-center py-4 px-3">
                <div class="spinner-border spinner-border-sm text-success me-2" role="status"></div>
                <span class="small text-muted">নোটিফিকেশন লোড হচ্ছে...</span>
              </div>
            </div>
          </div>
        </div>

        <!-- User Profile Dropdown Pill (MACS style) -->
        <div class="dropdown d-inline-block">
          <button type="button" class="btn header-item user-profile-pill d-flex align-items-center gap-2"
            id="page-header-user-dropdown-v" data-bs-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <div class="avatar-box" id="NavbarUserAvatarLetter">A</div>
            <div class="user-meta d-none d-md-flex flex-column text-start">
              <span class="name-text" id="NavbarUserProfileName">Admin</span>
              <span class="role-text" id="NavbarUserProfileRole">ADMIN</span>
            </div>
            <i class="fa-solid fa-angle-down chevron-icon"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end profile-dropdown shadow-lg border-0">
            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5" href="{{url('admin-dashboard-user-profile')}}">
              <i class="fa-regular fa-user font-size-16"></i>
              <span class="dropdown-label">My Profile</span>
            </a>
            <a class="dropdown-item d-flex align-items-center justify-content-between py-2.5" href="#" onclick="toggleLightMode(); event.preventDefault(); event.stopPropagation();">
              <span class="d-flex align-items-center gap-3">
                <i class="fa-solid fa-sun theme-icon-sun font-size-16" style="display: none;"></i>
                <i class="fa-solid fa-moon theme-icon-moon font-size-16"></i>
                <span class="dropdown-label">Theme</span>
              </span>
              <span class="badge theme-badge px-2 py-1 font-size-10" id="DropdownThemeBadge">LIGHT</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item d-flex align-items-center gap-3 py-2.5 text-danger" href="#" onclick="userlogout(event)">
              <i class="fa-solid fa-arrow-right-from-bracket font-size-16"></i>
              <span class="dropdown-label fw-bold">Logout</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </nav>


    <!-- Left Sidebar Start -->
  <div class="vertical-menu">
    <!-- Synchronous Instant Permission CSS Filter (0ms Flash Fix) -->
    <script>
      (function() {
        try {
          var role = (localStorage.getItem('user_role') || '').toLowerCase();
          var perms = null;
          try { perms = JSON.parse(localStorage.getItem('user_permissions') || 'null'); } catch(e){}

          if (role && role !== 'admin' && role !== 'super_admin') {
            var effective = { pos: true, product: false, purchase: false, customer: false, expense: false, report: false, user: false };
            if (perms && typeof perms === 'object') {
              effective.pos = !!perms.pos;
              effective.product = !!perms.product;
              effective.purchase = !!perms.purchase;
              effective.customer = !!perms.customer;
              effective.expense = !!perms.expense;
              effective.report = !!perms.report;
              effective.user = !!perms.user;
            } else {
              if (role === 'manager') { effective = { pos: true, product: true, purchase: true, customer: true, expense: true, report: true, user: false }; }
              else if (role === 'cashier') { effective = { pos: true, product: false, purchase: false, customer: false, expense: false, report: false, user: false }; }
              else if (role === 'accountant') { effective = { pos: false, product: false, purchase: false, customer: true, expense: true, report: true, user: false }; }
            }

            var css = '';
            for (var k in effective) {
              if (effective[k] === false) {
                css += '[data-perm="' + k + '"] { display: none !important; }
';
              }
            }
            if (css) {
              var style = document.createElement('style');
              style.id = 'instant-perm-style';
              style.innerHTML = css;
              document.head.appendChild(style);
            }
          }
        } catch(e) { console.error('Instant perm filter error:', e); }
      })();
    </script>

    <!-- LOGO Box (MACS style) -->
    <div class="navbar-brand-box">
      <a href="{{url('admin-dashboard')}}" class="logo logo-dark d-flex align-items-center text-decoration-none gap-2">
        <img src="{{ asset('back-end/assets/img/anis-store-icon.png') }}" alt="Anis Store Logo" width="36" height="36" />
        <span class="brand-text fw-bold text-success fs-5">
            মেসার্স আনিস ষ্টোর
        </span>
      </a>
    </div>

    <!-- Sliding Panel Container (MACS Sidenav Scroll) -->
    <div class="sidebar-menu-scroll">
      <div class="sidebar-panels-track">
        
        <!-- Panel 1: Main Menu Panel -->
        <div class="menu-panel main-menu-panel">
          <ul>
            <li class="active-link">
              <a href="{{ url('admin-dashboard') }}">
                <span class="item-content">
                  <i class="fa-solid fa-gauge icon"></i>
                  <span class="text">Dashboard</span>
                </span>
              </a>
            </li>
            
            <li class="active-link" data-perm="pos">
              <a href="{{ url('admin-dashboard-pos') }}">
                <span class="item-content">
                  <i class="fa-solid fa-cash-register icon"></i>
                  <span class="text">POS</span>
                </span>
              </a>
            </li>
            
            <li class="active-link" data-perm="pos">
              <a href="{{ url('admin-dashboard-invoice') }}">
                <span class="item-content">
                  <i class="fa-solid fa-file-invoice-dollar icon"></i>
                  <span class="text">Invoice List</span>
                </span>
              </a>
            </li>

            <li class="submenu-active" data-perm="product" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-boxes-stacked icon"></i>
                  <span class="text">Product</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Product">
                <li>
                  <a href="{{ url('admin-dashboard-product') }}">
                    <i class="fa-solid fa-boxes-stacked icon"></i>
                    <span class="text">Product List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-low-stock-list') }}">
                    <i class="fa-solid fa-triangle-exclamation icon text-danger"></i>
                    <span class="text text-danger fw-bold">Low Stock List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-barcode-genarate') }}">
                    <i class="fa-solid fa-barcode icon"></i>
                    <span class="text">BarCode Print</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="purchase" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-truck icon"></i>
                  <span class="text">Supplier</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Supplier">
                <li>
                  <a href="{{ url('admin-dashboard-supplier') }}">
                    <i class="fa-solid fa-truck icon"></i>
                    <span class="text">Supplier List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('supplier-due-page') }}">
                    <i class="fa-solid fa-file-invoice icon"></i>
                    <span class="text">Supplier Due List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('supplier-due-collection-page') }}">
                    <i class="fa-solid fa-receipt icon"></i>
                    <span class="text">Due collection List</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="purchase" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-cart-shopping icon"></i>
                  <span class="text">Purchase</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Purchase">
                <li>
                  <a href="{{ url('admin-dashboard-Purchase') }}">
                    <i class="fa-solid fa-cart-shopping icon"></i>
                    <span class="text">Purchase List</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="customer" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-users icon"></i>
                  <span class="text">Customer</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Customer">
                <li>
                  <a href="{{ url('admin-dashboard-customer') }}">
                    <i class="fa-solid fa-users icon"></i>
                    <span class="text">Customer List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-customer-due-list') }}">
                    <i class="fa-solid fa-wallet icon"></i>
                    <span class="text">Customer Due List</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('customer-due-collection-page') }}">
                    <i class="fa-solid fa-money-bill-transfer icon"></i>
                    <span class="text">Due Collection List</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="expense" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-wallet icon"></i>
                  <span class="text">Expense</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Expense">
                <li>
                  <a href="{{ url('admin-dashboard-expence-type') }}">
                    <i class="fa-solid fa-tags icon"></i>
                    <span class="text">Expense Type</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-expence-list') }}">
                    <i class="fa-solid fa-wallet icon"></i>
                    <span class="text">Expense List</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="pos" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-arrow-rotate-left icon"></i>
                  <span class="text">Sales Return</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Sales Return">
                <li>
                  <a href="{{ url('admin-dashboard-return-list') }}">
                    <i class="fa-solid fa-arrow-rotate-left icon"></i>
                    <span class="text">Return List</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="expense" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-scale-balanced icon"></i>
                  <span class="text">Opening Balance</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Opening Balance">
                <li>
                  <a href="{{ url('admin-dashboard-opening-balance') }}">
                    <i class="fa-solid fa-scale-balanced icon"></i>
                    <span class="text">Opening Balance List</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="report" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-chart-pie icon"></i>
                  <span class="text">Report</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Report">
                <li>
                  <a href="{{ url('admin-dashboard-daily-ledger-report') }}">
                    <i class="fa-solid fa-file-invoice icon"></i>
                    <span class="text">Daily Ledger Report</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-sales-report') }}">
                    <i class="fa-solid fa-chart-line icon"></i>
                    <span class="text">Sales Report</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-income-expense-report') }}">
                    <i class="fa-solid fa-chart-pie icon"></i>
                    <span class="text">Income & Expense Report</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-daily-receipt-payment-report') }}">
                    <i class="fa-solid fa-receipt icon"></i>
                    <span class="text">Daily Receipt & Payment</span>
                  </a>
                </li>
                <li>
                  <a href="{{ url('admin-dashboard-personal-transaction-report') }}">
                    <i class="fa-solid fa-user-tag icon"></i>
                    <span class="text">Personal Transactions</span>
                  </a>
                </li>
              </ul>
            </li>

            <li class="submenu-active" data-perm="user" >
              <a>
                <span class="item-content">
                  <i class="fa-solid fa-user-shield icon"></i>
                  <span class="text">Role & User</span>
                </span>
                <i class="chevron fa-solid fa-angle-right"></i>
              </a>
              <ul class="sub-menu" style="display: none;" data-menu-title="Role & User">
                <li>
                  <a href="{{ url('admin-dashboard-user-role') }}">
                    <i class="fa-solid fa-user-shield icon"></i>
                    <span class="text">User List & Roles</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        
        <!-- Panel 2: Submenu Panel (Populated dynamically) -->
        <div class="menu-panel submenu-panel">
          <!-- Back button and child list populated dynamically via JavaScript -->
        </div>

      </div>
    </div>

        <!-- Pinned MACS-style Footer -->
    <div class="sidebar-footer">
      <div class="user-profile-box">
        <div class="user-avatar" id="SidebarUserAvatarLetter">M</div>
        <div class="user-info">
          <span class="user-name" id="SidebarUserProfileName">MACS School</span>
        </div>
      </div>
      <div class="footer-actions dropdown">
        <!-- Three dots trigger for settings/signout popup -->
        <button class="footer-action-btn" id="sidebarFooterDropdownTrigger" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="ইউজার সেটিংস">
          <i class="fa-solid fa-ellipsis"></i>
        </button>
        <!-- Footer dropdown menu aligned directly above the footer -->
        <div class="dropdown-menu footer-profile-popup shadow-lg border-0" aria-labelledby="sidebarFooterDropdownTrigger">
          <div class="popup-header">
            <h6 class="popup-name" id="SidebarPopupUserName">MACS School</h6>
            <span class="popup-email" id="SidebarPopupUserEmail">admin@macsschool.edu.bd</span>
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item d-flex align-items-center gap-3 py-2" href="{{url('admin-dashboard-user-profile')}}">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item d-flex align-items-center gap-3 py-2 text-danger" href="#" onclick="userlogout(event)">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span class="fw-bold">Sign out</span>
          </a>
        </div>
        
        <!-- Bell icon trigger for notifications -->
        <button class="footer-action-btn" id="sidebarFooterBellBtn" title="কম স্টক নোটিফিকেশন" onclick="document.getElementById('page-header-notifications-dropdown-v').click()">
          <i class="fa-regular fa-bell"></i>
        </button>
      </div>
    </div>
  </div>
  <!-- Left Sidebar End -->


  @yield('content')



  <script>
    // script.js

    document.addEventListener("DOMContentLoaded", () => {
      const preloader = document.getElementById("preloader");
      const content = document.getElementById("content");

      // Hide preloader and show content after 0.5 seconds
      setTimeout(() => {
        preloader.style.opacity = "0";
        preloader.style.visibility = "hidden";
        content.style.display = "block";

        // Fade in the content
        setTimeout(() => {
          content.style.opacity = "1";
        }, 100);
      }, 100);
    });
  </script>













  <script>
    async function userlogout(event) {
      event.preventDefault(); // Prevent the default behavior of the link

      try {
        let res = await axios.get("/naxus-pos-logout", HeaderToken());
        localStorage.clear();
        sessionStorage.clear();
        window.location.href = "/admin-login-page";
      } catch (e) {
        console.error("Logout error:", e);

        // Show error message if available, or a default message
        errorToast(e.response?.data?.message || "Something went wrong");
      }
    }
  </script>
  {{--
<script>
    // Disable right-click
    document.addEventListener('contextmenu', function (e) {
      e.preventDefault();
    });

    // Disable F12 and Ctrl+Shift+I (Developer Tools)
    document.addEventListener('keydown', function (e) {
      if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
        e.preventDefault();
      }
    });
  </script> --}}

  <!-- Smart Role & Toggle Permission Control Script -->
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      applyUserRolePermissions();

      async function applyUserRolePermissions() {
        try {
          const response = await axios.get("/user-profile", HeaderToken());
          const user = response.data;

          window.currentUserRole = (user.role || '').toLowerCase();
          window.currentUserPermissions = user.permissions || null;

          // Cache in localStorage for instant 0ms pre-rendering on next page transitions
          localStorage.setItem('user_role', window.currentUserRole);
          if (user.permissions) {
            localStorage.setItem('user_permissions', JSON.stringify(user.permissions));
          }

          // Populate Header User Profile Info
          if (document.getElementById('UserProfileImg') && user.img_url) {
            document.getElementById('UserProfileImg').src = user.img_url;
          }
          if (document.getElementById('AuthorizePersonProfileName')) {
            document.getElementById('AuthorizePersonProfileName').innerText = user.name || "No Name";
          }
          if (document.getElementById('NavbarUserAvatarLetter')) {
            document.getElementById('NavbarUserAvatarLetter').innerText = (user.name || 'A')[0].toUpperCase();
          }
          if (document.getElementById('NavbarUserProfileName')) {
            document.getElementById('NavbarUserProfileName').innerText = user.name || "Admin";
          }
          if (document.getElementById('NavbarUserProfileRole')) {
            document.getElementById('NavbarUserProfileRole').innerText = (user.role || "ADMIN").toUpperCase();
          }
          if (document.getElementById('SidebarUserAvatarLetter')) {
            document.getElementById('SidebarUserAvatarLetter').innerText = (user.name || 'A')[0].toUpperCase();
          }
          if (document.getElementById('SidebarUserProfileName')) {
            document.getElementById('SidebarUserProfileName').innerText = user.name || "No Name";
          }
          if (document.getElementById('SidebarPopupUserName')) {
            document.getElementById('SidebarPopupUserName').innerText = user.name || "No Name";
          }
          if (document.getElementById('SidebarPopupUserEmail')) {
            document.getElementById('SidebarPopupUserEmail').innerText = user.email || "No Email";
          }
          if (document.getElementById('EmailShow')) {
            document.getElementById('EmailShow').innerText = user.email || "No Email";
          }

          // If Super Admin or Admin, show all menus and admin dashboard sections!
          const isAdmin = (window.currentUserRole === 'admin' || window.currentUserRole === 'super_admin');
          if (document.getElementById('adminOnlyFinancialSections')) {
            document.getElementById('adminOnlyFinancialSections').style.display = isAdmin ? 'block' : 'none';
          }

          if (isAdmin) {
            document.querySelectorAll('[data-perm]').forEach(el => el.style.display = '');
            return;
          }

          // Determine effective permission flags
          let perms = window.currentUserPermissions;
          let role = window.currentUserRole;

          let effective = {
            pos: true,
            product: false,
            purchase: false,
            customer: false,
            expense: false,
            report: false,
            user: false
          };

          if (perms && typeof perms === 'object') {
            effective.pos = !!perms.pos;
            effective.product = !!perms.product;
            effective.purchase = !!perms.purchase;
            effective.customer = !!perms.customer;
            effective.expense = !!perms.expense;
            effective.report = !!perms.report;
            effective.user = !!perms.user;
          } else {
            // Default role presets if custom toggles aren't explicitly saved
            if (role === 'manager') {
              effective = { pos: true, product: true, purchase: true, customer: true, expense: true, report: true, user: false };
            } else if (role === 'cashier') {
              effective = { pos: true, product: false, purchase: false, customer: false, false: false, report: false, user: false };
            } else if (role === 'accountant') {
              effective = { pos: false, product: false, purchase: false, customer: true, expense: true, report: true, user: false };
            }
          }

          // Apply display: none or display: '' to sidebar elements based on data-perm
          document.querySelectorAll('[data-perm]').forEach(el => {
            const key = el.getAttribute('data-perm');
            if (key && effective.hasOwnProperty(key)) {
              if (effective[key] === true) {
                el.style.display = '';
              } else {
                el.style.display = 'none';
              }
            }
          });

          // Route Protection: Prevent unauthorized direct URL access
          const path = window.location.pathname;
          if (path.includes('admin-dashboard-user-role') && !effective.user) {
            window.location.href = effective.pos ? '/admin-dashboard-pos' : '/admin-dashboard';
          } else if ((path.includes('admin-dashboard-product') || path.includes('admin-dashboard-brand') || path.includes('admin-dashboard-category')) && !effective.product) {
            window.location.href = effective.pos ? '/admin-dashboard-pos' : '/admin-dashboard';
          } else if ((path.includes('admin-dashboard-Purchase') || path.includes('admin-dashboard-supplier')) && !effective.purchase) {
            window.location.href = effective.pos ? '/admin-dashboard-pos' : '/admin-dashboard';
          }

        } catch (error) {
          console.error('Error applying user permissions:', error);
          if (error.response && error.response.status === 401) {
            unauthorized(401);
          }
        }
      }
    });
  </script>

  {{-- DatePicker Start  --}}
  <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.2.0/dist/js/datepicker.min.js"></script>
  <script src="{{ asset('back-end/assets/js/datepicker.js') }}" type="text/javascript"></script>
  {{-- DatePicker end  --}}


  <!-- Popper.js for tooltips and popovers in Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <!-- XLSX.js for reading and writing Excel files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
  <!-- jsPDF for generating PDF documents -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <!-- jsPDF-AutoTable for adding tables to PDFs created with jsPDF -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.26/jspdf.plugin.autotable.min.js"></script>

  <!-- JAVASCRIPT -->
  <script src="{{ asset('back-end/assets/js/fontawesome.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/simplebar.min.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/full-screen-toggle.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/all-modals.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/table-funtion.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/app.js') }}"></script>
  <script src="{{ asset('back-end/assets/js/style.js') }}"></script>


  <!-- Global Bangla Digit Conversion Utilities -->
  <script>
    function banglaToEngNum(str) {
        if (str === null || str === undefined) return '';
        str = String(str);
        const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        for (let i = 0; i < 10; i++) {
            str = str.split(bn[i]).join(en[i]);
        }
        return str;
    }

    function engToBanglaNum(str) {
        if (str === null || str === undefined) return '';
        str = String(str);
        const en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        const bn = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        for (let i = 0; i < 10; i++) {
            str = str.split(en[i]).join(bn[i]);
        }
        return str;
    }

    function formatBanglaAmount(val, showCurrencySymbol = true) {
        const num = parseBanglaFloat(val);
        const formattedEng = num.toFixed(2);
        const formattedBn = engToBanglaNum(formattedEng);
        return showCurrencySymbol ? ('৳ ' + formattedBn) : formattedBn;
    }

    function parseBanglaFloat(val, defaultVal = 0) {
        if (val === null || val === undefined || val === '') return defaultVal;
        const eng = banglaToEngNum(val);
        const num = parseFloat(eng);
        return isNaN(num) ? defaultVal : num;
    }

    function parseBanglaInt(val, defaultVal = 0) {
        if (val === null || val === undefined || val === '') return defaultVal;
        const eng = banglaToEngNum(val);
        const num = parseInt(eng, 10);
        return isNaN(num) ? defaultVal : num;
    }

    // Universal auto-convert typed English digits to Bangla digits in text/number inputs
    document.addEventListener('input', function(e) {
        if (e.target && (e.target.tagName === 'INPUT' || e.target.tagName === 'TEXTAREA')) {
            const inputType = e.target.getAttribute('type');
            if (inputType !== 'date' && inputType !== 'time' && inputType !== 'datetime-local' && inputType !== 'password' && inputType !== 'file') {
                const val = e.target.value;
                if (val && /[0-9]/.test(val)) {
                    const start = e.target.selectionStart;
                    const end = e.target.selectionEnd;
                    const converted = engToBanglaNum(val);
                    if (converted !== val) {
                        e.target.value = converted;
                        if (start !== null && end !== null && (inputType === 'text' || inputType === 'search' || !inputType)) {
                            try { e.target.setSelectionRange(start, end); } catch(err) {}
                        }
                        e.target.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                }
            }
        }
    }, true);
  </script>

  <!-- Dynamic Low Stock Notification & Music Chime Script -->
  <script>
    let lastLowStockCount = 0;

    // Play pleasant 4-note ascending chime sound using Web Audio API
    // Low Stock Notification Sound Disabled per user request
    function playStockNotificationChime() {
        // Sound chime disabled to prevent repetitive audio disturbance
    }

    async function loadLowStockNotifications(playSound = false) {
        try {
            const res = await axios.get('/admin-dashboard-low-stock-notifications');
            if (res.data && res.data.status === 'success') {
                const products = res.data.data || [];
                const count = res.data.count || 0;
                
                const badge = document.getElementById('noti-count-badge');
                const listContainer = document.getElementById('notification-items-list');

                if (badge) {
                    if (count > 0) {
                        badge.innerText = count;
                        badge.style.display = 'inline-block';
                    } else {
                        badge.style.display = 'none';
                    }
                }

                if (listContainer) {
                    if (count === 0) {
                        listContainer.innerHTML = `
                            <div class="text-center py-5 px-3">
                                <span class="notification-dot bg-success d-inline-block mb-2" style="width: 10px; height: 10px;"></span>
                                <h6 class="fw-bold text-success mb-1">সকল প্রোডাক্টের পর্যাপ্ত স্টক রয়েছে!</h6>
                                <p class="small text-muted mb-0">কোনো প্রোডাক্টের স্টক ১০ এর নিচে নেই</p>
                            </div>
                        `;
                    } else {
                        let html = '';
                        products.forEach(p => {
                            html += `
                                <a href="/admin-dashboard-low-stock-list" class="notification-item">
                                    <span class="notification-dot bg-danger"></span>
                                    <div class="notification-content">
                                        <h6 class="notification-title">কম স্টক সতর্কতা!</h6>
                                        <p class="notification-desc">
                                            প্রোডাক্ট: <strong>${p.product_name}</strong> | কোড: <strong>${p.product_code}</strong> | স্টক: <strong class="text-danger">${p.quantity} ${p.unit_name}</strong>
                                        </p>
                                    </div>
                                </a>
                            `;
                        });
                        listContainer.innerHTML = html;
                    }
                }
                
                lastLowStockCount = count;
            }
        } catch (err) {
            console.log('Low stock notification fetch error:', err);
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        loadLowStockNotifications(false);

        const bellBtn = document.getElementById('page-header-notifications-dropdown-v');
        if (bellBtn) {
            bellBtn.addEventListener('click', function() {
                loadLowStockNotifications(false);
            });
        }

        // Silent polling every 60 seconds for live stock alerts (no audio chime)
        setInterval(() => {
            loadLowStockNotifications(false);
        }, 60000);
    });
  </script>
</body>

</html>