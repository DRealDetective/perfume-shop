@extends('shop.layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark display-6">Your Shopping Cart</h2>
        <div class="mx-auto mt-2" style="width: 50px; height: 3px; background: var(--primary-gradient); border-radius: 10px;"></div>
    </div>

    @if(count($cart) > 0)
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="bg-light">
                                    <tr style="border-bottom: 2px solid #f8f9fa;">
                                        <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">Product</th>
                                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Price</th>
                                        <th class="py-3 text-uppercase small fw-bold text-muted text-center">Qty</th>
                                        <th class="py-3 text-uppercase small fw-bold text-muted">Total</th>
                                        <th class="pe-4 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandTotal = 0; @endphp
                                    @foreach($cart as $id => $item)
                                        @php 
                                            $lineTotal = $item['price'] * $item['quantity']; 
                                            $grandTotal += $lineTotal; 
                                        @endphp
                                        <tr>
                                            <td class="ps-4 py-4">
                                                <div class="d-flex align-items-center gap-3">
                                                    @if(!empty($item['image']))
                                                        <img src="{{ asset('storage/uploads/products/' . $item['image']) }}" 
                                                             alt="{{ $item['name'] }}"
                                                             class="rounded-3 shadow-sm"
                                                             style="width: 70px; height: 70px; object-fit: cover; border: 1px solid #eee;">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center rounded-3"
                                                             style="width: 70px; height: 70px;">
                                                            <i class="bi bi-droplet text-muted opacity-50"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <span class="fw-bold text-dark d-block">{{ $item['name'] }}</span>
                                                        <span class="xx-small text-muted text-uppercase ls-1">Luxury Item</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center text-muted">${{ number_format($item['price'], 2) }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                                                    @csrf
                                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                                           class="form-control form-control-sm text-center fw-bold border-0 bg-light rounded-pill" 
                                                           style="width: 60px; height: 35px; box-shadow: none;">
                                                    <button type="submit" class="btn btn-sm btn-action-update rounded-circle">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <span class="fw-bold text-dark">${{ number_format($lineTotal, 2) }}</span>
                                            </td>
                                            <td class="pe-4 text-end">
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm text-danger opacity-50 hover-opacity-100 p-0 border-0 bg-transparent">
                                                        <i class="bi bi-trash3 fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('shop.index') }}" class="btn btn-link text-decoration-none text-muted small px-0">
                        <i class="bi bi-arrow-left me-1"></i> Continue Shopping
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm sticky-top" style="border-radius: 20px; top: 100px;">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-4 text-uppercase ls-1 small text-primary">Cart Summary</h6>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted small">Subtotal</span>
                            <span class="fw-bold text-dark">${{ number_format($grandTotal, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-muted small">Estimated Delivery</span>
                            <span class="text-success small fw-bold">Free</span>
                        </div>

                        <hr class="opacity-10 my-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="h5 fw-bold mb-0 text-dark">Total</span>
                            <span class="h4 fw-bold mb-0" style="color: #764ba2;">${{ number_format($grandTotal, 2) }}</span>
                        </div>

                        <a href="#" class="btn btn-luxury w-100 py-3 shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <span>Proceed to Checkout</span>
                            <i class="bi bi-credit-card"></i>
                        </a>

                        <div class="mt-4 p-3 rounded-4 bg-light text-center">
                            <div class="d-flex gap-2 align-items-center justify-content-center opacity-75 mb-1">
                                <i class="bi bi-shield-lock-fill text-primary small"></i>
                                <span class="xx-small fw-bold text-uppercase ls-1">Secure Checkout</span>
                            </div>
                            <p class="xx-small text-muted mb-0">SSL Encrypted Transaction</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5 mt-4">
            <div class="icon-box mx-auto mb-4 bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                <i class="bi bi-bag-x text-muted opacity-25 fs-1"></i>
            </div>
            <h4 class="fw-bold text-dark">Your cart is currently empty</h4>
            <p class="text-muted mb-4">Discovery awaits. Explore our signature fragrance collection.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-luxury px-5 py-3">Browse Products</a>
        </div>
    @endif
</div>

<style>
    .ls-1 { letter-spacing: 1px; }
    .xx-small { font-size: 0.65rem; }
    
    .btn-action-update {
        background: #f7f6ff;
        color: #764ba2;
        border: none;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    .btn-action-update:hover {
        background: #764ba2;
        color: white;
        transform: rotate(90deg);
    }

    .hover-opacity-100:hover { opacity: 1 !important; }

    .table thead th {
        font-size: 0.7rem;
        border: none;
    }

    .btn-luxury {
        background: var(--primary-gradient);
        color: white;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-luxury:hover {
        opacity: 0.9;
        color: white;
        transform: translateY(-2px);
    }
</style>
@endsection