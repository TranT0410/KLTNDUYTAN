<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ordersNew()
    {
        $orders = Order::where('status', 1)->paginate(config('constants.paginate_10'));

        return view('supplier.order.listOrderNew', compact('orders'));
    }

    public function confirm(Request $request, $id)
    {
        $order = Order::find($id);
        $order['status'] = 2;
        $order->update($request->all());

        return redirect(route('supplier.order.orders_new',))->with('status', 'Confirm Order Successful');
    }

    public function ordersShiping()
    {
        $orders = Order::where('status', 2)->paginate(config('constants.paginate_10'));

        return view('supplier.order.listOrderShipping', compact('orders'));
    }

    public function ordersShipped()
    {
        $orders = Order::where('status', 3)->paginate(config('constants.paginate_10'));

        return view('supplier.order.listOrderShiped', compact('orders'));
    }

    public function confirmShiped(Request $request, $id)
    {
        $order = Order::find($id);
        $order['status'] = 3;
        $order->update($request->all());

        return redirect(route('supplier.order.orders_shipping',))->with('status', 'Confirm Order Successful');
    }
    public function block(Request $request, $id)
    {
        $order = Order::find($id);
        $order['status'] = 4;
        $order->update($request->all());

        return redirect(route('supplier.order.orders_new',))->with('status', 'Delete Order Successful');
    }

    public function listOrderBlock()
    {
        $orders = Order::where('status', 4)->paginate(config('constants.paginate_10'));

        return view('supplier.order.listOrderBlock', compact('orders'));
    }

    public function orderDetail($id)
    {
        $order = OrderDetail::where('order_id', $id)->get();

        return view('supplier.order.orderDetail', compact('order'));
    }
}