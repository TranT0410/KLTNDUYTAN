<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(config('constants.paginate_10'));

        return view('supplier.product.list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('supplier.product.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('images/product', 'images');
        }
        Product::create($data);

        return redirect(route('supplier.product.list'))->with('status', 'Inserts product successfully!');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::all();

        return view('supplier.product.update', compact('product', 'category'));
    }

    public function update(ProductRequest $request, $id)
    {

        $data = $request->all();
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $data['image'] = $file->store('images/product', 'images');
        }
        $product->update($data);

        return redirect(route('supplier.product.list'))->with('status', 'Update product successfully');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect(route('supplier.product.list'))->with('status', 'Delete product successfully');
    }

    public function productDetail($id)
    {
        $product = Product::find($id);

        return view('front.product.productDetail', compact('product'));
    }
}