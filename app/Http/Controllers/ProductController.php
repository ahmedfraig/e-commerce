<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::all();
        $products=Product::with('category')->get();
        return view('products.index',compact('products','categories'));
    }

    public function productsAtCategory($id=-1,$name='',$quantity=-1,$price=-1){
        $categories=Category::all();
        $products=Product::with('category')->where('category_id',$id)->get();
        return view('products.index',compact('products','categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('products.create',compact('categories'));
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
            'image'=>'required|file|mimes:jpeg,png,pdf,docx',
            'category_id'=>'required',
            'description'=>'required|string'
        ]);

        $imageName=time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        Product::create([
            'name'=>$request->name, 
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'image'=>$imageName,
            'description'=>$request->description
        ]);
        return redirect()->route('product.index')->with('success','Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('image')){

            // if($product->image && file_exists(public_path('uploads/'.'.'.$product->image)))
            //     unlink(public_path('uploads/'.'.'.$product->image));
            
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
        return redirect()->route('product.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success','Product deleted successfully');
    }
}
