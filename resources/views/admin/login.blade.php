<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Luxury Perfumes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.95);
        }
        .login-header {
            background: #ffffff;
            padding: 40px 30px 20px;
            text-align: center;
        }
        .login-header i {
            font-size: 3rem;
            color: #764ba2;
            margin-bottom: 10px;
        }
        .login-body {
            padding: 30px;
        }
        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.2);
            border-color: #764ba2;
        }
        .btn-login {
            background: #764ba2;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background: #5a377d;
            transform: translateY(-2px);
        }
        .brand-text {
            color: #333;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6 col-lg-4">
            <div class="card login-card">
                <div class="login-header">
                    <i class="bi bi-droplet-half"></i>
                    <h4 class="brand-text">Perfume Shop</h4>
                    <p class="text-muted small">Administration Portal</p>
                </div>

                <div class="login-body">
                    <!-- Display error message -->
                    @if(session('error'))
                        <div class="alert alert-danger d-flex align-items-center mb-4" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <div>{{ session('error') }}</div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label text-muted small fw-bold">EMAIL ADDRESS</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" class="form-control border-start-0 bg-light" id="email" name="email" placeholder="admin@shop.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label text-muted small fw-bold">PASSWORD</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" class="form-control border-start-0 bg-light" id="password" name="password" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                            SIGN IN
                        </button>
                        
                        <div class="text-center">
                            <a href="/" class="text-decoration-none small text-muted">
                                <i class="bi bi-arrow-left me-1"></i> Back to Store
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <p class="text-center mt-4 text-white-50 small">
                &copy; {{ date('Y') }} Luxury Perfumes Admin Panel
            </p>
        </div>
    </div>
</div>

</body>
</html>