<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create([
            'name'=>$request->name
        ]);

        return redirect()->route('order.index')->with('success','Order added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'name'=>$request->name
        ]);
        return redirect()->route('order.index')->with('success','Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')->with('success','Order deleted successfully');
    }
}
