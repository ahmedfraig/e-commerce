<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddToWishlistRequest;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){
        $request->validate([
            'user_id' => ['required','integer','exists:users,id'],
        ]);
    $user = User::findOrFail($request->input('user_id'));
    $wishlist = $user->wishlist()->get();
    return response()->json(['wishlist' => $wishlist]);
    }

    public function store(AddToWishlistRequest $request){
        $user = User::findOrFail($request->input('user_id'));
        $user->wishlist()->syncWithoutDetaching($request->product_id);

        return response()->json([
            'status' => true,
            'message' => 'Product added to wishlist successfully'
        ], 201);
    }

    public function destroy(Request $request,$product_id){
        $user = User::findOrFail($request->input('user_id'));
        $user->wishlist()->detach($product_id);
        
        return response()->json([
            'status' => true,
            'message' => 'Product removed from wishlist successfully'
        ]);
    }
}
