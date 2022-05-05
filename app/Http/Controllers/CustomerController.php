<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = Order::select('orders.id', 'orders.receiver', 'orders.phone', 'orders.address')
            ->distinct()
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->get();
        return view('supplier.customer.list', compact('customer'));
    }
}