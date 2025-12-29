@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-white border shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;" title="Back to Dashboard">
                <i class="bi bi-chevron-left"></i>
            </a>
            <div>
                <h2 class="fw-bold text-dark mb-0">Products Catalog</h2>
                <p class="text-muted small mb-0">Manage your luxury fragrance inventory</p>
            </div>
        </div>
        
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm" style="background: var(--primary-gradient); border: none;">
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
                                <td class="ps-4 text-muted small">#{{ $product->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                            class="me-3 rounded-3 shadow-sm" 
                                            style="width: 45px; height: 45px; object-fit: cover; border: 1px solid #eee;">

                                        @else
                                            <div class="icon-box me-3 bg-light text-primary" style="width: 45px; height: 45px; border-radius: 12px; flex-shrink: 0; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-droplet"></i>
                                            </div>
                                        @endif
                                        
                                        <div>
                                            <span class="fw-bold text-dark d-block">{{ $product->name }}</span>
                                            <span class="text-muted xx-small text-uppercase ls-1">Luxury Collection</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold px-3 py-1 rounded-pill small" style="background: #f7f6ff; color: #764ba2;">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                </td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-action-edit rounded-pill px-3">
                                            <i class="bi bi-pencil-square me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-action-delete rounded-pill px-3" onclick="return confirm('Are you sure you want to remove this perfume?')">
                                                <i class="bi bi-trash3 me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-box-seam d-block fs-1 mb-3 opacity-25"></i>
                                    <p class="mb-0">No products found in the database.</p>
                                    <a href="{{ route('admin.products.create') }}" class="btn btn-link text-primary text-decoration-none small mt-2">Create your first product</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .xx-small { font-size: 0.65rem; }
    .ls-1 { letter-spacing: 0.5px; }
    
    .btn-white { background: #fff; color: #666; transition: all 0.2s; }
    .btn-white:hover { background: #f8f9fa; color: #764ba2; transform: translateX(-3px); }

    /* Custom Action Buttons */
    .btn-action-edit {
        background: #fff;
        border: 1px solid #edf2f7;
        color: #4a5568;
        font-weight: 600;
        font-size: 0.8rem;
    }
    .btn-action-edit:hover {
        background: #f7f6ff;
        color: #764ba2;
        border-color: #764ba2;
    }

    .btn-action-delete {
        background: #fff;
        border: 1px solid #fff5f5;
        color: #e53e3e;
        font-weight: 600;
        font-size: 0.8rem;
    }
    .btn-action-delete:hover {
        background: #fff5f5;
        border-color: #feb2b2;
    }

    .table thead th {
        letter-spacing: 1px;
        font-size: 0.7rem;
        border: none;
    }
</style>
@endsection