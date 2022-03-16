<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class LandingPageController extends Controller
{
    Public function index(){
        $product = Product::take(3)->get();
        return view('welcome', compact('product'));
    }
}
