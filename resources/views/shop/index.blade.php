@extends('shop.layouts.app')

@section('content')
<div class="container py-4">
    <div class="text-center mb-5">
        <h6 class="text-uppercase ls-1 fw-bold text-primary mb-2" style="font-size: 0.8rem;">Exquisite Selection</h6>
        <h2 class="fw-bold text-dark display-6">Our Perfume Collection</h2>
        <div class="mx-auto mt-3" style="width: 50px; height: 3px; background: var(--primary-gradient); border-radius: 10px;"></div>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="position-relative h-100">
                    <!-- Link wraps card content except Add to Cart -->
                    <a href="{{ route('shop.show', $product->id) }}" class="text-decoration-none text-dark d-block h-100">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden" style="border-radius: 20px;">
                            <div class="position-relative overflow-hidden" style="height: 280px; background: #fcfcfc;">
                                @if($product->image)
                                    <img src="{{ asset('storage/uploads/products/' . $product->image) }}" 
                                         class="w-100 h-100" 
                                         alt="{{ $product->name }}" 
                                         style="object-fit: cover; transition: transform 0.5s ease;">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                        <i class="bi bi-droplet text-muted opacity-25 fs-1"></i>
                                    </div>
                                @endif

                                <div class="position-absolute bottom-0 start-0 m-3">
                                    <span class="badge bg-white text-dark shadow-sm px-3 py-2 fs-6 rounded-pill">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column p-4 text-center">
                                <h5 class="fw-bold text-dark mb-3" style="letter-spacing: -0.5px;">{{ $product->name }}</h5>
                            </div>
                        </div>
                    </a>

                    <!-- Add to Cart stays outside the link -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button type="submit" class="btn btn-luxury w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                            <i class="bi bi-bag-plus"></i> Add to Cart
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="bi bi-search fs-1 text-muted opacity-25"></i>
                <p class="mt-3 text-muted">Our collection is currently being curated. Please check back soon.</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    /* Hover Zoom Effect */
    .card:hover img {
        transform: scale(1.1);
    }

    .card {
        background: #fff;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .ls-1 { letter-spacing: 2px; }
</style>
@endsection
