<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class StatisticalController extends Controller
{
    public function index()
    {
        $orderFinish = OrderDetail::join('orders', 'orders.id', '=', 'order_details.order_id')
            ->where('orders.status', 3)
            ->get();
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

    public function sales()
    {
        $orderFinish = OrderDetail::select('order_details.*')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('orders.status', 3)
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->get();

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