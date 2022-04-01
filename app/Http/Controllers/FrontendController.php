<?php

namespace App\Http\Controllers;

use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome',compact('products'));
    }
}
