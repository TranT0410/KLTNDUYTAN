<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StatisticalController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->filter;
        $monthNow = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        if ($monthNow != 1) {
            $monthBefore = $monthNow - 1;
        } else {
            $monthBefore = 12;
        }
        if ($filter == null) {
            $orderFinish = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
                ->where('orders.status', 3)
                ->get();
        }
        if ($filter == 'monthnow') {
            $orderFinish = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
                ->where('orders.status', 3)
                ->whereMonth('order_details.created_at', $monthNow)
                ->get();
        }
        if ($filter == 'monthbefore') {
            $orderFinish = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
                ->where('orders.status', 3)
                ->whereMonth('order_details.created_at', $monthBefore)
                ->get();
        }
        if ($filter == 'year') {
            $orderFinish = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
                ->where('orders.status', 3)
                ->whereYear('order_details.created_at', $year)
                ->get();
        }
        $total_price = 0;
        foreach ($orderFinish as $order) {
            $subtotal = $order['price'] * $order['quantity'];
            $total_price = $total_price + $subtotal;
        }
        $countFinish = count($orderFinish);
        $order = Order::all();
        $order_count = count($order);

        return view('admin.statistical.list', compact('countFinish', 'order_count', 'orderFinish', 'total_price'));
    }

    public function sales(Request $request)
    {
        $orderFinish = OrderDetail::select('order_details.*')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('orders.status', 3)
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->get();
        $filter = $request->filter;
        $monthNow = Carbon::now('Asia/Ho_Chi_Minh')->month;
        $year = Carbon::now('Asia/Ho_Chi_Minh')->year;
        if ($monthNow != 1) {
            $monthBefore = $monthNow - 1;
        } else {
            $monthBefore = 12;
        }
        if ($filter == null) {
            $orderFinish = OrderDetail::select('order_details.*')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->where('orders.status', 3)
                ->where('suppliers.id', auth()->user()->suppliers->id)
                ->get();
        }
        if ($filter == 'monthnow') {
            $orderFinish = OrderDetail::select('order_details.*')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->where('orders.status', 3)
                ->whereMonth('order_details.created_at', $monthNow)
                ->where('suppliers.id', auth()->user()->suppliers->id)
                ->get();
        }
        if ($filter == 'monthbefore') {
            $orderFinish = OrderDetail::select('order_details.*')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->where('orders.status', 3)
                ->whereMonth('order_details.created_at', $monthBefore)
                ->where('suppliers.id', auth()->user()->suppliers->id)
                ->get();
        }
        if ($filter == 'year') {
            $orderFinish = OrderDetail::select('order_details.*')
                ->join('orders', 'order_details.order_id', '=', 'orders.id')
                ->join('products', 'products.id', '=', 'order_details.product_id')
                ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
                ->where('orders.status', 3)
                ->whereYear('order_details.created_at', $year)
                ->where('suppliers.id', auth()->user()->suppliers->id)
                ->get();
        }
        $total_price = 0;
        foreach ($orderFinish as $row) {
            $subtotal = $row['price'] * $row['quantity'];
            $total_price = $total_price + $subtotal;
        }
        $countFinish = count($orderFinish);
        $order  = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->get();
        $order_count = count($order);
        return view('supplier.statistical.list', compact('countFinish', 'order_count', 'orderFinish', 'total_price'));
    }
}