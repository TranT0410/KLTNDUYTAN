<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id = null)
    {
        $categories_random = Category::all()->random(3);
        $categories = Category::all();
        // $promotions = DB::table('products')
        //     ->join('promotion_detail', 'promotion_detail.product_id', '=', 'products.id')
        //     ->get();
        if ($id != null) {
            $products = Product::select('products.*', 'promotion_detail.rate',  'promotion_detail.product_id')
                ->leftJoin('promotion_detail', 'promotion_detail.product_id', '=', 'products.id')
                ->where('category_id', $id)
                ->get();
        } else {
            $products = Product::select('products.*', 'promotion_detail.rate',  'promotion_detail.product_id')
                ->leftJoin('promotion_detail', 'promotion_detail.product_id', '=', 'products.id')
                ->get();
        }
        $news = News::all();
        if (count($news) > 3) {
            $news = $news->random(3);
        }
        return view('front.home', compact('categories_random', 'products', 'news', 'categories'));
    }
}