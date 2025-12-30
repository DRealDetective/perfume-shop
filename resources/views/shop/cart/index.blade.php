@extends('shop.layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark display-6">Your Shopping Cart</h2>
        <div class="mx-auto mt-2" style="width: 50px; height: 3px; background: var(--primary-gradient); border-radius: 10px;"></div>
    </div>

    @if(session('success'))
        <div class="alert border-0 shadow-sm alert-success rounded-4 px-4 py-3 mb-4" role="alert" style="background-color: #f0fff4; color: #22543d;">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

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
                                        <th class="py-3 text-uppercase small fw-bold text-muted">Price</th>
                                        <th class="py-3 text-uppercase small fw-bold text-muted" style="width: 150px;">Quantity</th>
                                        <th class="py-3 text-uppercase small fw-bold text-muted text-end">Total</th>
                                        <th class="pe-4 py-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $grandTotal = 0; @endphp
                                    @foreach($cart as $id => $item)
                                        @php 
                                            $total = $item['price'] * $item['quantity']; 
                                            $grandTotal += $total; 
                                        @endphp
                                        <tr>
                                            <td class="ps-4 py-4">
                                                <div class="d-flex align-items-center">
                                                    @if($item['image'])
                                                        <img src="{{ asset('storage/uploads/products/'.$item['image']) }}" 
                                                             class="rounded-3 shadow-sm me-3" 
                                                             style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #eee;">
                                                    @endif
                                                    <span class="fw-bold text-dark">{{ $item['name'] }}</span>
                                                </div>
                                            </td>
                                            <td class="text-muted">${{ number_format($item['price'], 2) }}</td>
                                            <td>
                                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                                    @csrf
                                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" 
                                                           class="form-control form-control-sm text-center fw-bold me-2 border-0 bg-light rounded-pill" 
                                                           style="width: 60px; box-shadow: none;">
                                                    <button type="submit" class="btn btn-sm btn-action-update rounded-circle">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-end fw-bold text-dark">${{ number_format($total, 2) }}</td>
                                            <td class="pe-4 text-end">
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm text-danger border-0 bg-transparent opacity-75 hover-opacity-100">
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
                        <h6 class="fw-bold mb-4 text-uppercase ls-1 small text-primary">Order Summary</h6>
                        
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted small">Subtotal</span>
                            <span class="fw-bold text-dark small">${{ number_format($grandTotal, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="text-muted small">Shipping</span>
                            <span class="text-success small fw-bold">Calculated at checkout</span>
                        </div>

                        <hr class="opacity-10 my-4">

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="h5 fw-bold mb-0">Total</span>
                            <span class="h4 fw-bold mb-0" style="color: #764ba2;">${{ number_format($grandTotal, 2) }}</span>
                        </div>

                        <a href="#" class="btn btn-luxury w-100 py-3 shadow-sm d-flex align-items-center justify-content-center gap-2">
                            <span>Proceed to Checkout</span>
                            <i class="bi bi-credit-card"></i>
                        </a>

                        <div class="mt-4 p-3 rounded-4 bg-light">
                            <div class="d-flex gap-2 align-items-center justify-content-center opacity-75">
                                <i class="bi bi-shield-lock-fill text-primary"></i>
                                <span class="xx-small fw-bold text-uppercase ls-1">Secure Checkout</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <div class="icon-box mx-auto mb-4 bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                <i class="bi bi-bag-x text-muted opacity-25 fs-1"></i>
            </div>
            <h4 class="fw-bold text-dark">Your cart is empty</h4>
            <p class="text-muted mb-4">Looks like you haven't added any luxury perfumes yet.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-luxury px-5 py-3">Explore Collection</a>
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
        width: 30px;
        height: 30px;
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

    .hover-opacity-100:hover {
        opacity: 1 !important;
    }

    .table thead th {
        font-size: 0.7rem;
        border: none;
    }

    .card.sticky-top {
        z-index: 10;
    }
</style>
@endsection