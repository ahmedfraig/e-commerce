<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderItems = OrderItem::all();
        return view('orderItems.index',compact('orderItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orderItems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        OrderItem::create([
            'name'=>$request->name
        ]);

        return redirect()->route('orderItem.index')->with('success','OrderItem added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderItem $orderItem)
    {
        return view('orderItems.edit',compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $orderItem->update([
            'name'=>$request->name
        ]);
        return redirect()->route('orderItem.index')->with('success','OrderItem updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('orderItem.index')->with('success','OrderItem deleted successfully');
    }
}
