@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1">Products Catalog</h2>
            <p class="text-muted small">Manage your luxury fragrance inventory</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill px-4" style="background: var(--primary-gradient); border: none;">
            <i class="bi bi-plus-lg me-2"></i> Add New Product
        </a>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr style="border-bottom: 2px solid #f8f9fa;">
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">ID</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Product Details</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Price</th>
                            <th class="pe-4 py-3 text-uppercase small fw-bold text-muted text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products ?? [] as $product)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $product->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box me-3" style="width: 40px; height: 40px; font-size: 1rem; border-radius: 10px; flex-shrink: 0;">
                                            <i class="bi bi-droplet"></i>
                                        </div>
                                        <span class="fw-bold text-dark">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold" style="color: #764ba2;">${{ number_format($product->price, 2) }}</span>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                            <i class="bi bi-pencil me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Are you sure?')">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-seam d-block fs-1 mb-3 opacity-25"></i>
                                    No products found in the database.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection