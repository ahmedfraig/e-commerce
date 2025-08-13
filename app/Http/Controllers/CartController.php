<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::all();
        return view('carts.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cart::create([
            'name'=>$request->name
        ]);

        return redirect()->route('cart.index')->with('success','Cart added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        return view('carts.edit',compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'name'=>$request->name
        ]);
        return redirect()->route('cart.index')->with('success','Cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success','Cart deleted successfully');
    }
}
