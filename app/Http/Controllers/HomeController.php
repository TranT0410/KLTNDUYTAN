<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $promotions = DB::table('products')
            ->join('promotion_detail', 'promotion_detail.product_id', '=', 'products.id')
            ->get();
        return view('front.home', compact('categories', 'products', 'promotions'));
    }
}