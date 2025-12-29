@extends('admin.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-white border shadow-sm rounded-circle d-flex align-items-center justify-content-center" style="width: 42px; height: 42px;">
                <i class="bi bi-chevron-left"></i>
            </a>
            <div>
                <h2 class="fw-bold text-dark mb-1">Orders</h2>
                <p class="text-muted small mb-0">Manage and track your incoming luxury fragrance sales</p>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr style="border-bottom: 2px solid #f8f9fa;">
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">ID</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Full Name</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Contact Info</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Address</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">Total</th>
                            <th class="pe-4 py-3 text-uppercase small fw-bold text-muted text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td class="ps-4 text-muted small">#{{ $order->id }}</td>
                                <td>
                                    <span class="fw-bold text-dark">{{ $order->fullname }}</span>
                                </td>
                                <td>
                                    <div class="small">
                                        <div class="text-dark"><i class="bi bi-telephone me-1 opacity-50"></i>{{ $order->phone }}</div>
                                        <div class="text-muted"><i class="bi bi-envelope me-1 opacity-50"></i>{{ $order->email }}</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted small">{{ Str::limit($order->address, 30) }}</span>
                                </td>
                                <td>
                                    <span class="fw-bold" style="color: #764ba2;">${{ number_format($order->total, 2) }}</span>
                                </td>
                                <td class="pe-4 text-end">
                                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-action-view rounded-pill px-3">
                                        <i class="bi bi-eye me-1"></i> View
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-receipt d-block fs-1 mb-3 opacity-25"></i>
                                    No orders yet.
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
    .btn-white { background: #fff; color: #666; transition: all 0.2s; }
    .btn-white:hover { background: #f8f9fa; transform: translateX(-3px); }

    .btn-action-view {
        background: #fff;
        border: 1px solid #edf2f7;
        color: #4a5568;
        font-weight: 600;
        font-size: 0.8rem;
        transition: all 0.25s;
    }
    .btn-action-view:hover {
        background: #f7f6ff;
        color: #764ba2;
        border-color: #764ba2;
    }

    .table thead th {
        letter-spacing: 1px;
        font-size: 0.7rem;
        border: none;
    }
</style>
@endsection