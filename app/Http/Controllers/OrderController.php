<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $orders = Order::latest()->get();
       // dd($orders);
        return view('admin.orders', compact('orders'));
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
            ->route('admin.orders.index')
            ->with('success', 'Order created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::findOrFail($id); // fetch single order
        return view('admin.order_detail', compact('order'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.edit', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $validated = $request->validate([
        'fullname' => 'required|string|max:255',
        'phone'    => 'required|string|max:30',
        'email'    => 'required|email',
        'address'  => 'required|string',
        'total'    => 'required|numeric|min:0',
    ]);

    $order->update($validated);

    return redirect()
        ->route('admin.orders.index')
        ->with('success', 'Order updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $order = Order::findOrFail($id);
    $order->delete();

    return redirect()
        ->route('admin.orders.index')
        ->with('success', 'Order deleted successfully');
}

}
