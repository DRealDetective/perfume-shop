<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Luxury Perfumes</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
            overflow-x: hidden;
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
            padding: 0;
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
            border: none;
        }

        .nav-link i {
            font-size: 1.2rem;
        }

        .nav-link:hover {
            color: #764ba2;
            background: #f7f6ff;
        }

        .nav-link.active {
            color: white;
            background: var(--primary-gradient);
            box-shadow: 0 4px 12px rgba(118, 75, 162, 0.25);
        }

        /* Logout section pinned to bottom */
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

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 2.5rem;
            min-height: 100vh;
        }

        /* Welcome Section */
        .welcome-section {
            background: var(--primary-gradient);
            padding: 2.5rem;
            border-radius: 24px;
            color: white;
            margin-bottom: 2.5rem;
            position: relative;
            overflow: hidden;
        }

        /* Cards */
        .stats-card {
            border: none;
            border-radius: 20px;
            background: #fff;
            padding: 1.5rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.02);
            transition: var(--transition);
            height: 100%;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        }

        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            color: white;
        }

        .bg-primary-grad { background: var(--primary-gradient); }
        .bg-secondary-grad { background: var(--secondary-gradient); }

        .btn-action {
            font-size: 0.85rem;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 10px;
            transition: var(--transition);
        }

        @media (max-width: 992px) {
            .sidebar { margin-left: -var(--sidebar-width); }
            .main-content { margin-left: 0; padding: 1.5rem; }
        }
    </style>
</head>
<body>

    <aside class="sidebar d-none d-lg-flex">
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
            <a href="#" class="nav-link active">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.products.index') }}" class="nav-link">
                <i class="bi bi-box-seam"></i>
                <span>Manage Products</span>
            </a>
            <a href="{{ route('admin.orders.index') }}" class="nav-link">
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

    <main class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold m-0">Overview</h2>
                <p class="text-muted small mb-0">Analytics and store management</p>
            </div>
            <div class="badge bg-white text-dark shadow-sm p-3 rounded-4 border">
                <i class="bi bi-calendar3 me-2 text-primary"></i> 
                <span class="fw-semibold">{{ date('F d, Y') }}</span>
            </div>
        </div>

        <div class="welcome-section shadow-lg">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3 class="fw-bold mb-2">Welcome back, Admin! ✨</h3>
                    <p class="mb-0 opacity-75">What'd you need today?</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-xl-4">
                <div class="card stats-card">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <p class="text-muted small text-uppercase fw-bold mb-2 ls-1">Inventory</p>
                            <h4 class="fw-bold mb-3">Product Catalog</h4>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-light btn-action text-primary border">
                                Manage <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                        <div class="icon-box bg-primary-grad">
                            <i class="bi bi-tags"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card stats-card">
                    <div class="d-flex align-items-start justify-content-between">
                        <div>
                            <p class="text-muted small text-uppercase fw-bold mb-2 ls-1">Sales</p>
                            <h4 class="fw-bold mb-3">Total Orders</h4>
                            <a href="{{ route('admin.orders.index') }}" class="btn btn-light btn-action text-danger border">
                                View All <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                        <div class="icon-box bg-secondary-grad">
                            <i class="bi bi-cart3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="card stats-card" style="border: 2px dashed #e2e8f0; background: transparent; box-shadow: none;">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100 text-center py-2">
                        <div class="rounded-circle bg-white shadow-sm d-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                            <i class="bi bi-laptop text-muted fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Customer View</h5>
                        <p class="text-muted small mb-3">Check live store appearance</p>
                        <a href="/" target="_blank" class="btn btn-dark btn-action px-4 rounded-pill">
                            Go to Storefront
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>