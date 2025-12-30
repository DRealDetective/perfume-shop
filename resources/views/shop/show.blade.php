@extends('shop.layouts.app')

@section('content')
<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="{{ route('shop.index') }}" class="text-decoration-none text-muted">Collection</a></li>
            <li class="breadcrumb-item active fw-bold text-primary text-uppercase ls-1" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="row g-5 align-items-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm p-3" style="border-radius: 25px; background: #fff;">
                <div class="position-relative overflow-hidden" style="border-radius: 20px; background: #fcfcfc;">
                    @if($product->image)
                        <img src="{{ asset('storage/uploads/products/' . $product->image) }}" 
                             class="img-fluid w-100" 
                             alt="{{ $product->name }}"
                             style="max-height: 600px; object-fit: cover;">
                    @else
                        <div class="d-flex align-items-center justify-content-center bg-light" style="height: 500px;">
                            <i class="bi bi-droplet text-muted opacity-25 display-1"></i>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ps-lg-4">
                <h6 class="text-uppercase ls-1 fw-bold text-primary mb-2" style="font-size: 0.8rem;">Luxury Collection</h6>
                <h1 class="fw-bold text-dark display-5 mb-3">{{ $product->name }}</h1>
                
                <div class="d-flex align-items-center mb-4">
                    <span class="h3 fw-bold mb-0 text-dark">${{ number_format($product->price, 2) }}</span>
                    <span class="ms-3 badge bg-soft-purple text-primary rounded-pill px-3 py-2">Free Shipping</span>
                </div>

                <hr class="my-4 opacity-50">

                <div class="mb-4">
                    <label class="text-muted xx-small text-uppercase fw-bold ls-1 d-block mb-2">Description & Notes</label>
                    <p class="text-secondary leading-relaxed" style="font-size: 1.05rem;">
                        {{ $product->description ?? 'Experience the essence of luxury with this masterfully crafted fragrance.' }}
                    </p>
                </div>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="add-to-cart mt-5">
    @csrf
    <div class="row g-3">
        <div class="col-md-4">
            <label for="quantity" class="text-muted xx-small text-uppercase fw-bold ls-1 d-block mb-2">Quantity</label>
            <div class="input-group border rounded-pill overflow-hidden bg-light" style="border-color: #eee !important;">
                <input type="number" name="quantity" id="quantity" value="1" min="1" 
                       class="form-control border-0 bg-transparent text-center fw-bold" 
                       style="box-shadow: none;">
            </div>
        </div>
        <div class="col-md-8 d-flex align-items-end">
            <button type="submit" class="btn btn-luxury w-100 py-3 shadow-sm">
                <i class="bi bi-bag-plus me-2"></i> Add to Cart
            </button>
        </div>
    </div>
</form>

</form>




                        </div>
                    </div>
                </form>

                <div class="mt-5 pt-4 border-top">
                    <div class="d-flex gap-4">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-primary"></i>
                            <span class="small fw-semibold">Authentic Product</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-box-seam text-primary"></i>
                            <span class="small fw-semibold">Premium Packaging</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-soft-purple { background-color: #f7f6ff; }
    .ls-1 { letter-spacing: 2px; }
    .xx-small { font-size: 0.7rem; }
    .leading-relaxed { line-height: 1.8; }
    
    .breadcrumb-item + .breadcrumb-item::before {
        content: "\F285";
        font-family: "bootstrap-icons";
        font-size: 0.6rem;
    }

    /* Custom input styling */
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        opacity: 1;
    }
</style>
@endsection
