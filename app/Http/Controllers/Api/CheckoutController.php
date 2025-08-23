<?php

namespace App\Http\Controllers\Api;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {
            foreach ($data['products'] as $line) {
                $product = Product::lockForUpdate()->findOrFail($line['product_id']);
                $product->deductStock((int)$line['quantity']);
            }

            $total = $this->calculateTotal($data['products']);

            if (!empty($data['coupon_code'])) {
                $coupon = Coupon::where('code', $data['coupon_code'])->firstOrFail();
                if (!$coupon->isValid($total)) {
                    throw ValidationException::withMessages(['coupon_code' => 'Coupon not valid']);
                }
                $discount = $coupon->discountFor($total);
                $total = max(0, round($total - $discount, 2));
                $coupon->increment('uses');
            }
        });

        return response()->json([
            'status' => true,
            'message' => 'Order placed successfully'
        ], 201);
    }

    private function calculateTotal(array $lines): float
    {
        $sum = 0.0;
        foreach ($lines as $line) {
            $product = Product::find($line['product_id']);
            if ($product) {
                $sum += (float)$product->price * (int)$line['quantity'];
            }
        }
        return round($sum, 2);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
