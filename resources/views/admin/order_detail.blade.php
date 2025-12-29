@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-white border shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                <i class="bi bi-chevron-left"></i>
            </a>
            <div>
                <h2 class="fw-bold text-dark mb-1">Order Details</h2>
                <p class="text-muted small mb-0">Reviewing transaction <span class="fw-bold text-primary">#{{ $order->id }}</span></p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-4 text-uppercase ls-1 small text-primary">Customer & Shipping Information</h6>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="text-muted xx-small text-uppercase fw-bold ls-1 d-block mb-1">Full Name</label>
                            <p class="fw-semibold text-dark mb-0">{{ $order->fullname }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted xx-small text-uppercase fw-bold ls-1 d-block mb-1">Email Address</label>
                            <p class="fw-semibold text-dark mb-0">{{ $order->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted xx-small text-uppercase fw-bold ls-1 d-block mb-1">Phone Number</label>
                            <p class="fw-semibold text-dark mb-0">{{ $order->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted xx-small text-uppercase fw-bold ls-1 d-block mb-1">Shipping Address</label>
                            <p class="fw-semibold text-dark mb-0">{{ $order->address }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px; background: var(--primary-gradient);">
                <div class="card-body p-4 text-white">
                    <h6 class="fw-bold mb-4 text-uppercase ls-1 small opacity-75">Order Summary</h6>
                    
                    <div class="d-flex justify-content-between mb-3">
                        <span class="opacity-75 small">Placed On</span>
                        <span class="fw-bold small">{{ $order->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span class="opacity-75 small">Time</span>
                        <span class="fw-bold small">{{ $order->created_at->format('H:i') }}</span>
                    </div>
                    
                    <hr class="opacity-25">
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="h5 mb-0 fw-bold">Total</span>
                        <span class="h3 mb-0 fw-bold">${{ number_format($order->total, 2) }}</span>
                    </div>
                </div>
            </div>

            <div class="d-grid px-2">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary border-0 small text-muted">
                    <i class="bi bi-arrow-left me-2"></i> Back to Orders
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .ls-1 { letter-spacing: 1px; }
    .xx-small { font-size: 0.7rem; }
    
    .btn-white { background: #fff; color: #666; transition: all 0.2s; }
    .btn-white:hover { background: #f8f9fa; transform: translateY(-2px); }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "\F285";
        font-family: "bootstrap-icons";
        font-size: 0.6rem;
        color: #adb5bd;
    }
</style>
@endsection