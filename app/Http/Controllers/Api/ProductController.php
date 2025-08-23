<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->searchByName($request->name)
        ->priceRange($request->max,$request->min)
        ->filterByCategory($request->category_id)
        ->inStock($request->availability)->paginate(3);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
        $request->validate([
            'name'=>'required|string|max:255', 
            'price'=>'required|numeric|min:0',
            'quantity'=>'required|integer',
            'image'=>'file|mimes:jpeg,png,pdf,docx,jpg',
            'category_id'=>'required',
            'description'=>'required|string'
        ]);

        $imageName=time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        $product = Product::create([
            'name'=>$request->name, 
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'image'=>$imageName,
            'description'=>$request->description
        ]);
        return response()->json([
            'status' => true,
            'message' =>'Product created successfully',
            'data' =>$product
        ],201);
    }

    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if(!$product){
            return response()->json([
                'status' => false,
                'message' => 'Product not found'
            ],404);
        }

        return response()->json([
            'status' => true,
            'data' => $product
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                    'name'=>'required|string|max:255', 
                    'price'=>'required|numeric|min:0',
                    'quantity'=>'required|integer',
                    'image'=>'file|mimes:jpeg,png,pdf,docx,jpg',
                    'category_id'=>'required',
                    'description'=>'required|string'
                ]);

        $product = Product::with('category')->find($id);
        if($request->hasFile('image')){

            if($product->image && file_exists(public_path('uploads/'.'.'.$product->image)))
                unlink(public_path('uploads/'.'.'.$product->image));
            
            // if($request->hasFile('image')){
            //     $imagePath=$request->File('image')->store('products','public');
            // }
            
            $imageName=time().'.'.$request->File('image')->getClientOriginalExtension();
            $request->File('image')->move(public_path('uploads'),$imageName);}
        else
            $imageName=$product->image;

        $product->update([
            'name'=>$request->name, 
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'image'=>$imageName,
            'description'=>$request->description            
        ]);
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
