<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StaticPageController extends Controller
{
    public function home() {

        $products = Product::orderBy('created_at', 'asc')->limit(5)->get();
        
        return view('home', compact('products'));
    } 
}
