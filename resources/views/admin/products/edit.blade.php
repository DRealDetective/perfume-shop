@extends('admin.layouts.app')@section('content')<div class="container py-5"><!-- Page Title --><div class="mb-4"><h1 class="fw-bold text-dark">Edit Product</h1><p class="text-muted">Modify the details for <strong>{{ $product->name }}</strong></p></div><div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label fw-bold text-muted">Product Name</label>
                <input type="text" name="name" id="name" 
                       class="form-control @error('name') is-invalid @enderror" 
                       value="{{ old('name', $product->name) }}" 
                       placeholder="Enter product name" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Product Price -->
            <div class="mb-3">
                <label for="price" class="form-label fw-bold text-muted">Price ($)</label>
                <input type="number" name="price" id="price" 
                       class="form-control @error('price') is-invalid @enderror" 
                       value="{{ old('price', $product->price) }}" 
                       required step="0.01" placeholder="0.00">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Current Image Preview -->
            @if($product->image)
            <div class="mb-3">
                <label class="form-label fw-bold text-muted d-block">Current Image</label>
                <img src="{{ asset('uploads/products/' . $product->image) }}" 
                     alt="{{ $product->name }}" 
                     class="img-thumbnail" 
                     style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            @endif

            <!-- Upload New Image -->
            <div class="mb-4">
                <label for="image" class="form-label fw-bold text-muted">Update Image (Optional)</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                <div class="form-text text-muted small">Leave blank to keep the current image.</div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4">

            <!-- Actions -->
            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-success px-5 py-2 fw-bold">
                    Update Product
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-link text-decoration-none text-muted">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
</div><style>.container {max-width: 800px;}.form-control:focus {border-color: #198754;box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.1);}.card {border-radius: 12px;}.btn-success {border-radius: 8px;}</style>@endsection