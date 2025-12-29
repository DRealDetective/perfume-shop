@extends('shop.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Your Shopping Cart</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(count($cart) > 0)
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $grandTotal = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
                        <tr>
                            <td class="d-flex align-items-center">
                                @if($item['image'])
                                    <img src="{{ asset('storage/uploads/products/'.$item['image']) }}" width="60" class="me-2" alt="{{ $item['name'] }}">
                                @endif
                                {{ $item['name'] }}
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="form-control me-2" style="width:70px;">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($total, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                        <td colspan="2" class="fw-bold">${{ number_format($grandTotal, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="text-end mt-3">
            <a href="#" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @else
        <div class="text-center py-5">
            <p class="text-muted">Your cart is empty.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary">Back to Shop</a>
        </div>
    @endif
</div>
@endsection
