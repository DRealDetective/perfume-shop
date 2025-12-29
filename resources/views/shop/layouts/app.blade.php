<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <a class="nav-link position-relative px-3" href="#" id="cartDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-bag fs-5"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
            {{ session('cart') ? count(session('cart')) : 0 }}
        </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;" aria-labelledby="cartDropdown">
        @if(session('cart') && count(session('cart')) > 0)
            @foreach(session('cart') as $id => $item)
                <li class="d-flex justify-content-between mb-2">
                    <span>{{ $item['name'] }}</span>
                    <span>${{ number_format($item['price'], 2) }} x {{ $item['quantity'] }}</span>
                </li>
            @endforeach
            <li><hr class="dropdown-divider"></li>
            <li>
                <a href="{{ route('cart.index') }}" class="btn btn-primary w-100">View Cart / Checkout</a>
            </li>
        @else
            <li class="text-center text-muted">Your cart is empty</li>
        @endif
    </ul>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>