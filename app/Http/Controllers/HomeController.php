<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $showProducts= Product::paginate(2);
        return view('frontend.index',compact('showProducts'));
    }
}
