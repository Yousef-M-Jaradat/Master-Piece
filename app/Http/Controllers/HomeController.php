<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use App\Models\coupons;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Categories::all();
        $discount = Coupons::first();
        $product = Products::orderBy('created_at', 'desc')->take(8)->get();

        return view('template.home.home',compact('category','product','discount'));
    }
}
