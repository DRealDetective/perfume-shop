@extends('shop.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Your Shopping Cart</h2>

    @if(count($cart) > 0)
        <div class="row">
            <div class="col-lg-8">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $id => $item)
                        <tr>
                            <td class="d-flex align-items-center gap-3">
                                @if($item['image'])
                                    <img src="{{ asset('storage/uploads/products/' . $item['image']) }}" alt="{{ $item['name'] }}" width="50" height="50" style="object-fit: cover;">
                                @endif
                                <span>{{ $item['name'] }}</span>
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex gap-1">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control form-control-sm" style="width: 60px;">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4">
                <div class="card p-4 shadow-sm">
                    <h5 class="mb-3">Cart Summary</h5>
                    <p class="mb-2">Total: <strong>${{ number_format($total, 2) }}</strong></p>
                    <a href="#" class="btn btn-primary w-100">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-cart-x fs-1 text-muted opacity-25"></i>
            <p class="mt-3 text-muted">Your cart is empty.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary mt-2">Browse Products</a>
        </div>
    @endif
</div>
@endsection
