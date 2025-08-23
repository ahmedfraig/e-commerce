<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'products' => ['required','array','min:1'],
            'products.*.product_id' => ['required','integer','exists:products,id'],
            'products.*.quantity' => ['required','integer','min:1'],
            'coupon_code' => ['nullable','string','exists:coupons,code']
        ];
    }

    public function withValidator($validator): void{
        $validator->after(function($validator){
            foreach($this->input('products',[]) as $key => $productData){
                $product = Product::find($productData['product_id'] ?? null);
                $qty = (int) ($productData['quantity'] ?? 0);

                if(!$product || $qty<1)
                    continue;
                
                if($product->quantity < $qty){
                    $validator->errors()->add("products.$key.quantity", 'Out of Stock');
                }

            }
        });
    }
}
