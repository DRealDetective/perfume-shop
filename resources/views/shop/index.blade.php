@extends('shop.layouts.app')

@section('content')
<div class="container py-3 py-md-5">
    <div class="text-center mb-4 mb-md-5">
        <h6 class="text-uppercase ls-1 fw-bold text-primary mb-2" style="font-size: 0.7rem;">Exquisite Selection</h6>
        <h2 class="fw-bold text-dark display-6 fs-3 fs-md-2">Our Perfume Collection</h2>
        <div class="mx-auto mt-3" style="width: 40px; height: 3px; background: var(--primary-gradient); border-radius: 10px;"></div>
    </div>

    <div class="row g-3 g-md-4">
        @forelse($products as $product)
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border-0 shadow-sm overflow-hidden position-relative" style="border-radius: 20px;">
                    
                    <a href="{{ route('shop.show', $product->id) }}" class="text-decoration-none text-dark d-block">
                        <div class="position-relative overflow-hidden product-image-wrapper bg-light">
                            @if($product->image)
                                <img src="{{ asset('storage/uploads/products/' . $product->image) }}" 
                                     class="w-100 h-100 product-img" 
                                     alt="{{ $product->name }}">
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                    <i class="bi bi-droplet text-muted opacity-25 fs-1"></i>
                                </div>
                            @endif

                            <div class="position-absolute bottom-0 start-0 m-2 m-md-3">
                                <span class="badge bg-white text-dark shadow-sm px-2 px-md-3 py-1 py-md-2 rounded-pill fw-bold" style="font-size: 0.75rem; @media(min-width: 768px){ font-size: 0.9rem; }">
                                    ${{ number_format($product->price, 2) }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body p-3 p-md-4 text-center">
                            <h6 class="fw-bold text-dark mb-0 text-truncate px-1" title="{{ $product->name }}">
                                {{ $product->name }}
                            </h6>
                        </div>
                    </a>

                    <div class="px-3 pb-3">
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart">
    @csrf
    <button type="submit" class="btn btn-luxury w-100 py-2 py-md-2-5 d-flex align-items-center justify-content-center gap-1 gap-md-2">
        <i class="bi bi-bag-plus small"></i> 
        <span class="small fw-bold text-uppercase" style="font-size: 0.65rem; @media(min-width: 768px){ font-size: 0.75rem; }">Add</span>
    </button>
</form>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-search fs-1 text-muted opacity-25"></i>
                <p class="mt-3 text-muted">Our collection is currently being curated.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    /* Responsive Image Heights */
    .product-image-wrapper {
        height: 180px; /* Small height for mobile */
    }
    @media (min-width: 768px) {
        .product-image-wrapper { height: 280px; }
    }

    .product-img {
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card:hover .product-img {
        transform: scale(1.1);
    }

    .card {
        background: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Subtle hover effect for the whole card on desktop */
    @media (min-width: 992px) {
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0,0,0,0.08) !important;
        }
    }

    .ls-1 { letter-spacing: 1px; }

    .btn-luxury {
        background: var(--primary-gradient);
        color: white;
        border: none;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    /* Prevent text wrapping on very small screens */
    .text-truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endsection