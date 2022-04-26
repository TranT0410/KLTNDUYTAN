<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $mycart = session('my_cart');
        return view('front.cart.myCart', compact('mycart'));
        // $request->session()->flush();
    }

    public function addCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('my_cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }
        session()->put('my_cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
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
        return redirect()->back()->with('success', 'Update added to cart successfully!');
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