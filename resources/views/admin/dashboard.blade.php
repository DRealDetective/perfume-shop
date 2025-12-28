<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <div class="container">
        <h1 class="mb-4">Admin Dashboard</h1>
        <p>Welcome, admin!</p>

        <!-- Logout -->
        <a href="{{ route('admin.logout') }}" class="btn btn-danger mb-4">Logout</a>

        <!-- Admin actions placeholders -->
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary w-100">Manage Products</a>
            </div>
            <div class="col-md-4">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary w-100">View Orders</a>
            </div>
        </div>
    </div>

</body>
</html>
