@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-muted">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none text-muted">Products</a></li>
            <li class="breadcrumb-item active fw-bold text-primary" aria-current="page text-uppercase">Edit Item</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Edit Product</h3>
            <p class="text-muted small mb-0">Updating: <span class="text-primary fw-semibold">{{ $product->name }}</span></p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-white btn-sm border rounded-pill px-3 shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Back to Catalog
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-xxl-9 col-xl-11">
            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-4 text-uppercase ls-1 small text-primary">Core Details</h6>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label small fw-semibold">Product Name</label>
                                    <input type="text" name="name" id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name', $product->name) }}" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label small fw-semibold">Price ($)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0 text-muted small">$</span>
                                            <input type="number" name="price" id="price" 
                                                   class="form-control border-start-0 @error('price') is-invalid @enderror" 
                                                   value="{{ old('price', $product->price) }}" required step="0.01">
                                        </div>
                                        @error('price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small fw-semibold">Stock Status</label>
                                        <select class="form-select">
                                            <option value="1">In Stock</option>
                                            <option value="0">Out of Stock</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <label for="description" class="form-label small fw-semibold">Fragrance Notes & Description</label>
                                    <textarea name="description" id="description" rows="6" 
                                              class="form-control @error('description') is-invalid @enderror" 
                                              placeholder="Update notes...">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-3 text-uppercase ls-1 small text-primary">Product Media</h6>
                                
                                @if($product->image)
                                <div class="mb-3 text-center">
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="img-fluid rounded-4 shadow-sm" 
                                             style="max-height: 180px; width: 100%; object-fit: cover;">
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark border border-light">
                                            Current
                                        </span>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="upload-zone p-3 text-center">
                                    <i class="bi bi-cloud-arrow-up text-muted fs-4"></i>
                                    <label for="image" class="d-block small fw-bold text-muted mt-1 mb-2">Change Image</label>
                                    <input type="file" name="image" id="image" class="form-control form-control-sm">
                                </div>
                                <p class="text-center text-muted xx-small mt-2 mb-0">Leave empty to keep current photo.</p>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                            <div class="card-body p-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mb-2 shadow-sm" 
                                        style="background: var(--primary-gradient); border: none; border-radius: 12px;">
                                    <i class="bi bi-arrow-repeat me-2"></i> Update Changes
                                </button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-link btn-sm w-100 text-decoration-none text-muted">Cancel Editing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .ls-1 { letter-spacing: 1px; }
    .xx-small { font-size: 0.7rem; }
    
    .form-control, .form-select, .input-group-text {
        border-color: #edf2f7;
        padding: 0.6rem 0.8rem;
        font-size: 0.9rem;
        border-radius: 10px;
    }

    .form-control:focus, .form-select:focus {
        border-color: #764ba2;
        box-shadow: 0 0 0 4px rgba(118, 75, 162, 0.05);
    }

    .upload-zone {
        border: 2px dashed #edf2f7;
        border-radius: 15px;
        background: #fbfbfe;
        transition: all 0.3s ease;
    }

    .upload-zone:hover {
        border-color: #764ba2;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "\F285";
        font-family: "bootstrap-icons";
        font-size: 0.6rem;
        color: #adb5bd;
    }
    
    .btn-white { background: #fff; color: #333; }
</style>
@endsection