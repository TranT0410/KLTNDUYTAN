<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\PromotionDetail;
use Carbon\Carbon;
use App\Http\Requests\PromotionRequest;

class PromotionController extends Controller
{
    public function index()
    {
        $promotion = Promotion::paginate(config('constants.paginate_10'));
        $date = Carbon::now('Asia/Ho_Chi_Minh');

        return view('supplier.promotion.list', compact('promotion', 'date'));
    }

    public function create()
    {
        return view('supplier.promotion.create');
    }

    public function store(PromotionRequest $request)
    {
        $promotion = $request->all();
        $promotion['status'] = config('constants.status');
        Promotion::create($promotion);

        return redirect(route('supplier.promotion.list'))->with('status', 'Insert promotion successfully');
    }

    public function edit($id)
    {
        $promotion = Promotion::find($id);

        return view('supplier.promotion.update', compact('promotion'));
    }

    public function update(PromotionRequest $request, $id)
    {
        $promotion = Promotion::find($id);
        $data = $request->all();
        $promotion->update($data);

        return redirect(route('supplier.promotion.list'))->with('status', 'Update promotion successfully');
    }

    public function delete($id)
    {
        $promotion = Promotion::find($id);
        $promotion->delete();

        return redirect(route('supplier.promotion.list'))->with('status', 'Delete promotion successfully');
    }

    public function promotionDetail($id)
    {
        $promotion = PromotionDetail::where('promotion_id', $id)->get();

        return view('supplier.promotion.view', compact('promotion'));
    }

    public function formProductPromotion($id)
    {
        $promotion = Promotion::find($id);
        $products = Product::get();

        return view('supplier.promotion.product_view', compact('promotion', 'products'));
    }

    public function addProduct(Request $request)
    {
        $data = $request->all();
        PromotionDetail::create($data);

        return redirect(route('supplier.promotion.list'))->with('status', 'Insert successfully');
    }

    public function deleteProduct($id)
    {
        $product = PromotionDetail::find($id);
        $product->delete();

        return redirect(route('supplier.promotion.list'))->with('status', 'Delete successfully');
    }

    public function formUpdateProduct($id)
    {
        $promotion = PromotionDetail::find($id);
        $products = Product::get();

        return view('supplier.promotion.update_product', compact('promotion', 'products'));
    }

    public function updateProduct($id, Request $request)
    {
        $promotion = PromotionDetail::find($id);
        $data = $request->all();
        $promotion->update($data);

        return redirect(route('supplier.promotion.list'))->with('status', 'Update successfully');
    }
}