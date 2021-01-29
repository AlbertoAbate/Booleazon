<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StaticPageController extends Controller
{
    public function home() {

        $products = Product::all();
        
        return view('home', compact('products'));
    } 
}
