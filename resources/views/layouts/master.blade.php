<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O'Passage | {{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap');

        /* ===== DESIGN TOKENS ===== */
        :root {
            --brand-primary: #5B0FA8;
            --brand-accent: #FFC107;
            --brand-dark: #1a1d20;

            --bg-page: #f4f6f9;
            --bg-sidebar: #fafafa;
            --bg-surface: #ffffff;
            --bg-hover: #f0f2f5;
            --bg-muted: #f8f9fa;

            --border: #e9ecef;
            --border-strong: #dee2e6;

            --text-primary: #1a1d20;
            --text-secondary: #495057;
            --text-muted: #6c757d;
            --text-hint: #adb5bd;

            --radius-sm: 6px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-pill: 999px;

            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.04), 0 1px 2px rgba(0, 0, 0, 0.03);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.06);

            --sidebar-width: 250px;
            --transition: 150ms ease;
        }

        /* ===== RESET & BASE ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg-page);
            color: var(--text-secondary);
            overflow-x: hidden;
            margin: 0;
            -webkit-font-smoothing: antialiased;
        }

        /* ===== LAYOUT ===== */
        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        #sidebar-wrapper {
            width: var(--sidebar-width);
            background-color: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border);
        }

        .brand-logo {
            background-color: var(--brand-primary);
            color: var(--brand-accent);
            font-weight: 600;
            font-family: 'DM Mono', monospace;
            border-radius: var(--radius-sm);
            padding: 7px 10px;
            font-size: 13px;
            letter-spacing: -0.02em;
            flex-shrink: 0;
        }

        .brand-text h5 {
            margin: 0 0 1px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            line-height: 1.2;
        }

        .brand-text span {
            font-size: 11px;
            color: var(--text-hint);
        }

        .nav-section-title {
            font-size: 10px;
            color: var(--text-hint);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            padding: 20px 20px 6px;
            font-weight: 600;
        }

        .sidebar-nav {
            list-style: none;
            padding: 6px 0;
            margin: 0;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 20px;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 400;
            border-left: 3px solid transparent;
            transition: background-color var(--transition), color var(--transition);
        }

        .sidebar-nav li a i {
            font-size: 15px;
            color: var(--text-hint);
            transition: color var(--transition);
            width: 16px;
            text-align: center;
        }

        .sidebar-nav li a:hover {
            background-color: var(--bg-hover);
            color: var(--text-primary);
        }

        .sidebar-nav li a:hover i {
            color: var(--text-secondary);
        }

        .sidebar-nav li a.active {
            background-color: var(--bg-hover);
            font-weight: 600;
            color: var(--brand-primary);
            border-left-color: var(--brand-accent);
        }

        .sidebar-nav li a.active i {
            color: var(--brand-primary);
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 16px 20px;
            font-size: 11.5px;
            color: var(--text-hint);
            border-top: 1px solid var(--border);
            line-height: 1.5;
        }

        /* ===== MAIN CONTENT ===== */
        #page-content-wrapper {
            flex-grow: 1;
            padding: 28px 36px;
            min-width: 0;
        }

        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 20px;
            margin-bottom: 28px;
            border-bottom: 1px solid var(--border);
        }

        .page-header-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .page-header-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            background: var(--bg-muted);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: var(--text-muted);
            font-size: 15px;
        }

        .page-header-title {
            margin: 0 0 2px;
            font-size: 17px;
            font-weight: 600;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .page-header-sub {
            font-size: 12px;
            color: var(--text-hint);
        }

        .page-header-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .header-date {
            font-size: 12px;
            color: var(--text-muted);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            background: var(--bg-muted);
            border: 1px solid var(--border);
        }

        .header-badge-live {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: var(--text-secondary);
            padding: 6px 12px;
            border-radius: var(--radius-sm);
            background: var(--bg-surface);
            border: 1px solid var(--border);
        }

        .live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #22c55e;
            flex-shrink: 0;
        }

        .header-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            color: var(--text-secondary);
            padding: 7px 14px;
            border-radius: var(--radius-sm);
            background: var(--bg-surface);
            border: 1px solid var(--border-strong);
            cursor: pointer;
            transition: background-color var(--transition), color var(--transition);
        }

        .header-btn:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
        }

        /* ===== KPI CARDS ===== */
        .kpi-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
            transition: box-shadow var(--transition), transform var(--transition);
        }

        .kpi-card:hover {
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .kpi-card .card-body {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .kpi-title {
            color: var(--text-muted);
            font-size: 12px;
            margin-bottom: 8px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .kpi-value {
            font-size: 26px;
            font-weight: 600;
            margin: 0;
            color: var(--text-primary);
            letter-spacing: -0.03em;
            line-height: 1;
        }

        .kpi-icon {
            font-size: 20px;
            opacity: 0.8;
        }

        /* ===== CHART CARDS ===== */
        .chart-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            box-shadow: var(--shadow-sm);
        }

        .chart-card .card-body {
            padding: 24px;
        }

        .chart-title {
            font-size: 13.5px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 18px;
            letter-spacing: -0.01em;
        }

        /* ===== CONTENT CARD ===== */
        .content-card {
            background: var(--bg-surface);
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            padding: 24px;
            box-shadow: var(--shadow-sm);
        }

        .card-title-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        /* ===== TABLE ===== */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
        }

        .table thead th {
            border-top: none;
            color: var(--text-hint);
            font-weight: 500;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 1px solid var(--border);
            padding: 0 8px 14px;
        }

        .table tbody td {
            vertical-align: middle;
            font-size: 13.5px;
            padding: 16px 8px;
            border-bottom: 1px solid var(--bg-muted);
            color: var(--text-secondary);
            transition: background-color var(--transition);
        }

        .table tbody tr:hover td {
            background-color: var(--bg-muted);
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .username-cell {
            font-weight: 600;
            color: var(--text-primary);
        }

        /* ===== BADGES ===== */
        .badge-role-opasseur,
        .badge-role-client,
        .badge-otp-verified,
        .badge-otp-unverified {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            line-height: 1;
        }

        .badge-role-opasseur {
            background-color: var(--brand-dark);
            color: #ffffff;
            border-radius: var(--radius-pill);
            padding: 5px 14px;
        }

        .badge-role-client {
            background-color: var(--bg-hover);
            color: var(--text-secondary);
            border-radius: var(--radius-pill);
            padding: 5px 14px;
            border: 1px solid var(--border);
        }

        .badge-otp-verified {
            background-color: #eaf5ec;
            color: #2b6e35;
            border-radius: var(--radius-sm);
            padding: 4px 10px;
        }

        .badge-otp-unverified {
            background-color: #fff0f0;
            color: #c0392b;
            border-radius: var(--radius-sm);
            padding: 4px 10px;
        }

        /* ===== FORM ELEMENTS ===== */
        .search-input {
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            padding: 8px 14px;
            font-size: 13.5px;
            font-family: 'DM Sans', sans-serif;
            width: 250px;
            color: var(--text-primary);
            background: var(--bg-surface);
            transition: border-color var(--transition), box-shadow var(--transition);
            outline: none;
        }

        .search-input:focus {
            border-color: var(--brand-primary);
            box-shadow: 0 0 0 3px rgba(91, 15, 168, 0.08);
        }

        .filter-select {
            border-radius: var(--radius-sm);
            border: 1px solid var(--border-strong);
            padding: 8px 14px;
            font-size: 13.5px;
            font-family: 'DM Sans', sans-serif;
            width: 130px;
            font-weight: 500;
            color: var(--text-primary);
            background: var(--bg-surface);
            cursor: pointer;
            outline: none;
            transition: border-color var(--transition);
        }

        .filter-select:focus {
            border-color: var(--brand-primary);
        }

        .btn-add {
            background-color: var(--brand-dark);
            color: #ffffff;
            border-radius: var(--radius-sm);
            padding: 9px 20px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            border: none;
            font-size: 13.5px;
            cursor: pointer;
            transition: background-color var(--transition), transform var(--transition);
            letter-spacing: -0.01em;
        }

        .btn-add:hover {
            background-color: #2d3238;
        }

        .btn-add:active {
            transform: scale(0.98);
        }

        /* ===== ICON COLORS ===== */
        .text-blue {
            color: #339af0;
        }

        .text-green {
            color: #37b24d;
        }

        .text-yellow {
            color: #f59f00;
        }

        .text-purple {
            color: #9c36b5;
        }

        .text-orange {
            color: #f76707;
        }

        .text-teal {
            color: #0ca678;
        }

        /* ===== PROFILE DROPDOWN ===== */
        .profile-wrapper {
            position: relative;
        }

        .avatar-btn {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 4px 12px 4px 4px;
            border-radius: var(--radius-pill);
            border: 1px solid var(--border);
            background: var(--bg-surface);
            cursor: pointer;
            transition: background-color var(--transition), border-color var(--transition);
            font-family: 'DM Sans', sans-serif;
        }

        .avatar-btn:hover {
            background: var(--bg-hover);
            border-color: var(--border-strong);
        }

        .avatar-img,
        .avatar-initials {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .avatar-img {
            object-fit: cover;
        }

        .avatar-initials {
            background: linear-gradient(135deg, var(--brand-primary), #9c36b5);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 600;
            color: #fff;
        }

        .avatar-info {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
            text-align: left;
        }

        .avatar-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .avatar-role {
            font-size: 11px;
            color: var(--text-hint);
        }

        .avatar-chevron {
            font-size: 12px;
            color: var(--text-hint);
            transition: transform 200ms ease;
        }

        .avatar-chevron.open {
            transform: rotate(180deg);
        }

        /* Dropdown panel */
        .profile-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            width: 220px;
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            display: none;
            z-index: 100;
        }

        .profile-dropdown.open {
            display: block;
            animation: dd-in 150ms ease;
        }

        @keyframes dd-in {
            from {
                opacity: 0;
                transform: translateY(-6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dd-header {
            padding: 14px;
            border-bottom: 1px solid var(--border);
        }

        .dd-avatar-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .dd-avatar-img,
        .dd-avatar-initials {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .dd-avatar-img {
            object-fit: cover;
        }

        .dd-avatar-initials {
            background: linear-gradient(135deg, var(--brand-primary), #9c36b5);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .dd-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0 0 2px;
        }

        .dd-email {
            font-size: 11px;
            color: var(--text-hint);
            margin: 0;
        }

        .dd-section {
            padding: 6px;
        }

        .dd-separator {
            height: 1px;
            background: var(--border);
            margin: 2px 0;
        }

        .dd-item {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            padding: 9px 10px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-family: 'DM Sans', sans-serif;
            color: var(--text-secondary);
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            transition: background-color var(--transition), color var(--transition);
            text-align: left;
        }

        .dd-item i {
            font-size: 15px;
            width: 16px;
            text-align: center;
        }

        .dd-item:hover {
            background: var(--bg-hover);
            color: var(--text-primary);
        }

        .dd-item--danger {
            color: #c0392b;
        }

        .dd-item--danger:hover {
            background: #fff0f0;
            color: #a93226;
        }
    </style>

    @stack('csss')
</head>

<body>

    <div id="wrapper">
        @include('layouts.menu')
        <div id="page-content-wrapper">
            @include('layouts.header')
            @yield('content')
        </div>
    </div>

    @include('layouts.script')
</body>

</html>
