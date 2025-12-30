<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Luxury Perfumes | Excellence in Fragrance</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@if(session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

    <style>
        
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --soft-purple: #f7f6ff;
            --luxury-dark: #1a1a1a;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8f9fa;
            color: var(--luxury-dark);
        }

        /* Luxury Navbar */
        .navbar {
            background: white !important;
            padding: 1.25rem 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--luxury-dark) !important;
            font-size: 1.5rem;
        }

        .navbar-brand span {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Global Component Styling */
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.04);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.08);
        }

        .btn-luxury {
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-luxury:hover {
            opacity: 0.9;
            transform: scale(1.02);
            color: white;
        }

        .text-gradient {
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .ls-1 { letter-spacing: 1px; }
        /* Minicart */
        .mini-cart {
    position: fixed;
    top: 0;
    right: -350px;
    width: 350px;
    height: 100%;
    background: #fff;
    box-shadow: -10px 0 30px rgba(0,0,0,.1);
    padding: 20px;
    transition: right .3s ease;
    z-index: 9999;
}

.mini-cart.open {
    right: 0;
}

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('shop.index') }}">
                LUXURY<span>PERFUMES</span>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#shopNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="shopNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold px-3" href="{{ route('shop.index') }}">Collection</a>
                    </li>
                    <li class="nav-item dropdown">
    <a class="nav-link position-relative px-3" href="#" id="cartDropdown">
    <i class="bi bi-bag fs-5"></i>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
        {{ session('cart') ? count(session('cart')) : 0 }}
    </span>
</a>

</li>


                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        @yield('content')
    </main>

    <footer class="py-5 bg-white border-top">
        <div class="container text-center">
            <p class="text-muted small mb-0">&copy; {{ date('Y') }} Luxury Perfumes Collection. All Rights Reserved.</p>
        </div>
    </footer>

    
    <div id="mini-cart" class="mini-cart shadow-lg border-0">
    <div class="mini-cart-header d-flex justify-content-between align-items-center p-4 border-bottom">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-bag text-primary fs-5"></i>
            <h6 class="fw-bold mb-0 text-dark text-uppercase ls-1 small">Your Selection</h6>
        </div>
        <button onclick="closeMiniCart()" class="btn-close shadow-none" style="font-size: 0.8rem;"></button>
    </div>

    <div id="mini-cart-body" class="p-4" style="max-height: 400px; overflow-y: auto;">
        </div>

    <div class="p-4 border-top bg-white mt-auto">
        <a href="{{ route('cart.index') }}" class="btn btn-luxury w-100 py-2 shadow-sm d-flex align-items-center justify-content-center gap-2">
            <span>View Full Cart</span>
            <i class="bi bi-arrow-right small"></i>
        </a>
    </div>
</div>

<style>
    .mini-cart {
        position: fixed;
        right: -400px; /* Hidden by default */
        top: 0;
        width: 350px;
        height: 100vh;
        background: #fff;
        z-index: 1050;
        transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        flex-direction: column;
    }

    .mini-cart.active {
        right: 0;
    }

    .mini-cart-header {
        background: #fff;
    }

    /* Custom Scrollbar for Luxury Feel */
    #mini-cart-body::-webkit-scrollbar {
        width: 5px;
    }
    #mini-cart-body::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    #mini-cart-body::-webkit-scrollbar-thumb {
        background: #e0e0e0;
        border-radius: 10px;
    }

    .ls-1 { letter-spacing: 1px; }

    /* Button consistent with shop-side style */
    .btn-luxury {
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .btn-luxury:hover {
        opacity: 0.95;
        transform: translateY(-2px);
        color: white;
    }
</style>
    
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/shop.js') }}"></script>
</body>
</html>