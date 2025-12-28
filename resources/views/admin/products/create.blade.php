@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb small">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-muted">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}" class="text-decoration-none text-muted">Products</a></li>
            <li class="breadcrumb-item active fw-bold text-primary" aria-current="page text-uppercase">Add New</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold text-dark mb-1">Add New Perfume</h3>
            <p class="text-muted small mb-0">Create a new entry in your luxury collection catalog.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="btn btn-white btn-sm border rounded-pill px-3 shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Back
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-xxl-9 col-xl-11">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                            <div class="card-body p-4">
                                <h6 class="fw-bold mb-4 text-uppercase ls-1 small text-primary">Basic Information</h6>
                                
                                <div class="mb-3">
                                    <label for="name" class="form-label small fw-semibold">Product Name</label>
                                    <input type="text" name="name" id="name" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           value="{{ old('name') }}" 
                                           placeholder="e.g. Royal Oud Intense" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="price" class="form-label small fw-semibold">Retail Price ($)</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light border-end-0 text-muted small">$</span>
                                            <input type="number" name="price" id="price" 
                                                   class="form-control border-start-0 @error('price') is-invalid @enderror" 
                                                   value="{{ old('price') }}" required step="0.01">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label small fw-semibold">Status</label>
                                        <select class="form-select">
                                            <option value="1">Active / Published</option>
                                            <option value="0">Draft</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-0">
                                    <label for="description" class="form-label small fw-semibold">Fragrance Notes & Description</label>
                                    <textarea name="description" id="description" rows="5" 
                                              class="form-control @error('description') is-invalid @enderror" 
                                              placeholder="Top notes, Heart notes, and Base notes...">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm mb-4" style="border-radius: 20px;">
                            <div class="card-body p-4 text-center">
                                <h6 class="fw-bold mb-3 text-uppercase ls-1 small text-primary text-start">Media</h6>
                                
                                <div class="upload-zone py-4">
                                    <i class="bi bi-image text-muted fs-2 mb-2"></i>
                                    <label for="image" class="d-block small fw-bold text-muted mb-2">Upload Product Image</label>
                                    <input type="file" name="image" id="image" class="form-control form-control-sm @error('image') is-invalid @enderror">
                                    <p class="text-muted xx-small mt-2 mb-0">Max 2MB. JPG or PNG.</p>
                                </div>
                                @error('image') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                            <div class="card-body p-4">
                                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold mb-2 shadow-sm" 
                                        style="background: var(--primary-gradient); border: none; border-radius: 12px;">
                                    <i class="bi bi-cloud-check me-2"></i> Save Product
                                </button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-link btn-sm w-100 text-decoration-none text-muted">Discard Changes</a>
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

    .form-control:focus {
        border-color: #764ba2;
        box-shadow: 0 0 0 4px rgba(118, 75, 162, 0.05);
    }

    .upload-zone {
        border: 2px dashed #edf2f7;
        border-radius: 15px;
        background: #fbfbfe;
        padding: 1rem;
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