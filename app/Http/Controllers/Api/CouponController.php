<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Coupon::latest()->paginate(10));
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
    public function store(CouponRequest $request)
    {
        $coupon = Coupon::create($request->validated());
        return response()->json($coupon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return response()->json($coupon);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->validated());
        return response()->json($coupon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response()->json([
            'message' => 'Coupon deleted successfully.'
        ], 204);
    }
}
