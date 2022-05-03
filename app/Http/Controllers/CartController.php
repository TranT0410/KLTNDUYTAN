<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $mycart = session('my_cart');
        $products = Product::all();
        $supplier = Supplier::all();
        return view('front.cart.myCart', compact('mycart', 'supplier', 'products'));
        // $request->session()->flush();
    }

    public function addCart($id)
    {
        $product = Product::select('products.*', 'promotion_detail.rate', 'promotion_detail.product_id')
            ->leftJoin('promotion_detail', 'products.id', '=', 'promotion_detail.product_id')
            ->where('products.id', $id)
            ->first();
        $cart = session()->get('my_cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                'category_id' => $product->category_id,
                'supplier_id' => $product->supplier_id,
                'rate' => $product->rate
            ];
        }
        session()->put('my_cart', $cart);
        return redirect()->back()->with('success', 'Sản phẩm được thêm vào giỏ hàng thành công!');
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $cart = session()->get('my_cart');
        foreach ($data['quantity'] as $key => $value) {
            foreach ($cart as $id => $product_vl) {
                if ($product_vl['id'] == $key) {
                    $cart[$id]['quantity'] = $value;
                }
            }
        }
        session()->put('my_cart', $cart);
        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công!');
    }

    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('my_cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('my_cart', $cart);
            }
        }
    }
}