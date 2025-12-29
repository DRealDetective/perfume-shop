<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display the public product catalog.
     */
    public function index()
    {
        // Fetch all products
        $products = Product::all();

        // Return the public shop view
        return view('shop.index', compact('products'));
    }

    /**
     * Optionally, show a single product detail page.
     */
    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}
