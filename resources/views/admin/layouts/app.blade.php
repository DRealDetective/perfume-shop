<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products | Luxury Perfumes</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --sidebar-width: 280px;
            --sidebar-bg: #ffffff;
            --main-bg: #fbfbfe;
            --text-main: #2d3748;
            --text-muted: #718096;
            --transition: all 0.25s ease;
        }

        body {
            background-color: var(--main-bg);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            background: var(--sidebar-bg);
            border-right: 1px solid #edf2f7;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 2.5rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-logo {
            width: 40px;
            height: 40px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .brand-text {
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.95rem;
            line-height: 1.2;
        }

        /* Nav Links */
        .nav-container {
            flex-grow: 1;
            padding: 0 1rem;
        }

        .nav-link {
            color: var(--text-muted);
            padding: 0.8rem 1.2rem;
            font-weight: 500;
            border-radius: 12px;
            margin-bottom: 5px;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-link:hover {
            color: #764ba2;
            background: #f7f6ff;
        }

        .nav-link.active {
            color: white !important;
            background: var(--primary-gradient);
            box-shadow: 0 4px 12px rgba(118, 75, 162, 0.25);
        }

        /* Sidebar Footer Logout */
        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid #edf2f7;
        }

        .btn-logout {
            color: #e53e3e;
            text-decoration: none;
            font-weight: 600;
            padding: 0.8rem 1.2rem;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: var(--transition);
        }

        .btn-logout:hover {
            background: #fff5f5;
        }

        /* Main Content Wrapper */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 0.8rem 2.5rem;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .content-body {
            padding: 2.5rem;
            flex-grow: 1;
        }

        footer {
            padding: 1.5rem 2.5rem;
            color: #adb5bd;
            font-size: 0.85rem;
            border-top: 1px solid #e9ecef;
            background: #fff;
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); transition: transform 0.3s; }
            .sidebar.active { transform: translateX(0); }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div class="sidebar-header">
            <div class="brand-logo">
                <i class="bi bi-droplet-fill"></i>
            </div>
            <div class="brand-text">
                Lux Perfume<br>
                <span class="text-muted small fw-normal">Admin Panel</span>
            </div>
        </div>

        <nav class="nav-container mt-2">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Manage Products</span>
            </a>
            <a href="{{ route('admin.orders.index') }}" class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                <i class="bi bi-receipt"></i>
                <span>View Orders</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ route('admin.logout') }}" class="btn-logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
            </a>
        </div>
    </aside>

    <div class="main-wrapper">
        <header class="top-navbar">
            <div class="d-flex align-items-center">
                <div class="text-end me-3">
                    <p class="mb-0 small fw-bold">Badr BAZIZI</p>
                    <p class="mb-0 x-small text-muted" style="font-size: 0.75rem;">Administrator</p>
                </div>
                <div class="rounded-circle bg-white shadow-sm d-flex align-items-center justify-content-center border" style="width: 40px; height: 40px;">
                    <i class="bi bi-person-fill text-primary"></i>
                </div>
            </div>
        </header>

        <main class="content-body">
            @yield('content')
        </main>

        <footer>
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0">&copy; 2025 Luxury Perfume Shop</p>
                <p class="mb-0 opacity-50">v1.0.4</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>