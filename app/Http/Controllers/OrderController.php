<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use App\Models\Order;

    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.orders.index', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    use App\Models\Order;

    public function store(Request $request)
    {
        // 1️⃣ Validate
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'phone'    => 'required|string|max:20',
            'email'    => 'required|email',
            'address'  => 'required|string',
            'total'    => 'required|numeric|min:0',
        ]);

        // 2️⃣ Store order
        Order::create($validated);

        // 3️⃣ Redirect
        return redirect()
            ->route('orders.index')
            ->with('success', 'Order created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
