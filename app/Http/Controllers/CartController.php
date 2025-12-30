<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    
    public function index()
{
    $cart = session()->get('cart', []); // get cart from session, default empty
    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    return view('shop.cart', compact('cart', 'total'));
}

    public function addToCart(Product $product)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity']++;
    } else {
        $cart[$product->id] = [
            'name'     => $product->name,
            'price'    => $product->price,
            'quantity' => 1,
            'image'    => $product->image ?? null,
        ];
    }

    session()->put('cart', $cart);

    return response()->json([
        'success' => true,
        'cart' => $cart
    ]);
}


    public function update(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', "$product->name removed from cart!");
    }
}
