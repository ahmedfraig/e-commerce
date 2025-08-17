<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $carts = Cart::with('user')
                 ->where('user_id', $userId)
                 ->get();
        $cartItems = session('cart', []);
        $products = Product::whereIn('id', array_keys($cartItems))->get();
        
        return view('carts.index',compact('carts','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1'
    ]);

        $userId = Auth::user()->id;

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {

            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return redirect()->route('home.index')->with('success', 'Item added to cart successfully');
    }

    /*
   


    /*
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        if($cart->quantity>1){
           $cart->quantity-=1;
           $cart->save();
        }
        else 
            $cart->delete();
        return redirect()->route('cart.index')->with('success','Cart deleted successfully');
    }
}
