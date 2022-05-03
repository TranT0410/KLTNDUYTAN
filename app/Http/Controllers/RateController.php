<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;

class RateController extends Controller
{
    public function index()
    {
        $rates = Rate::all();

        return view('admin.rate.list', compact('rates'));
    }

    public function view($id)
    {
        $rate = Rate::find($id);

        return view('admin.rate.view', compact('rate'));
    }

    public function delete($id)
    {
        $rate = Rate::find($id);
        $rate->delete();

        return redirect(route('admin.rate.list'))->with('status', 'Xóa đánh giá thành công');
    }
}