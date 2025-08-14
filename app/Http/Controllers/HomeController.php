<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        $showProducts= Product::paginate(2);
        return view('frontend.index',compact('showProducts','categories'));
    }

  
    public function productsAtCategory($id){
        $categories=Category::all();
        $showProducts=Product::with('category')
                           ->where('category_id', $id)
                           ->paginate(2);
        return view('frontend.index',compact('showProducts','categories'));
    }  
}
