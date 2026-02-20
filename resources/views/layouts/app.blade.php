<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Cuti BPVP Kendari')</title>
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Inter', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #111827;
        }

        /* Navigation Bar */
        .navbar {
            background: #ffffff;
            padding: 0;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .nav-link {
            text-decoration: none;
            padding: 20px 25px;
            color: #4b5563;
            font-weight: 500;
            transition: all 0.2s;
            font-size: 14px;
            border-bottom: 2px solid transparent;
        }

        .nav-link:hover {
            color: #059669;
            background: #f9fafb;
        }

        .nav-link.active {
            color: #059669;
            border-bottom: 2px solid #059669;
            background: transparent;
        }

        .main-content {
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        @yield('additional_styles')
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('welcome') }}" class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}">
            Beranda
        </a>
      
        <a href="{{ route('leave.form') }}" class="nav-link {{ request()->routeIs('leave.form') ? 'active' : '' }}">
            Formulir Permintaan Cuti
        </a>
        <a href="{{ route('leave.izin') }}" class="nav-link {{ request()->routeIs('leave.izin') ? 'active' : '' }}">
            Surat Izin Cuti
        </a>
    </nav>

    <div class="main-content">
        @yield('content')
    </div>

    @yield('scripts')
</body>
</html>
