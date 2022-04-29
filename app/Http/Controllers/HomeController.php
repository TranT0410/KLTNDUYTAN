<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // $promotions = DB::table('products')
        //     ->join('promotion_detail', 'promotion_detail.product_id', '=', 'products.id')
        //     ->get();
        $products = Product::select('products.*', 'promotion_detail.rate', 'promotion_detail.product_id')
            ->leftJoin('promotion_detail', 'promotion_detail.product_id', '=', 'products.id')
            ->get();
        $news = News::all();
        if (count($news) > 3) {
            $news = $news->random(3);
        }

        return view('front.home', compact('categories', 'products', 'news'));
    }
}