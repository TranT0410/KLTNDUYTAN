<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PromotionDetail;
use App\Models\Tax;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function ordersNew()
    {
        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->where('orders.status', 1)
            ->select('orders.id', 'orders.receiver', 'orders.phone', 'orders.address', 'products.name', 'orders.created_at')
            ->orderByDesc('created_at')
            ->get();
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
        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->where('orders.status', 2)
            ->select('orders.id', 'orders.receiver', 'orders.phone', 'orders.address', 'products.name', 'orders.created_at')
            ->orderByDesc('created_at')
            ->get();

        return view('supplier.order.listOrderShipping', compact('orders'));
    }

    public function ordersShipped()
    {
        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->where('orders.status', 3)
            ->select('orders.id', 'orders.receiver', 'orders.phone', 'orders.address', 'products.name', 'orders.created_at')
            ->orderByDesc('created_at')
            ->get();

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
        $orders = DB::table('orders')
            ->join('order_details', 'orders.id', '=', 'order_details.order_id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('suppliers.id', auth()->user()->suppliers->id)
            ->where('orders.status', 4)
            ->select('orders.id', 'orders.receiver', 'orders.phone', 'orders.address', 'products.name', 'orders.created_at')
            ->orderByDesc('created_at')
            ->get();

        return view('supplier.order.listOrderBlock', compact('orders'));
    }

    public function orderDetail($id)
    {
        $supplier_id = auth()->user()->suppliers->id;
        $order = OrderDetail::select('order_details.*')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->join('suppliers', 'products.supplier_id', '=', 'suppliers.id')
            ->where('order_details.order_id', $id)
            ->where('suppliers.id', $supplier_id)
            ->get();

        return view('supplier.order.orderDetail', compact('order'));
    }

    public function checkOut()
    {
        $mycart = session()->get('my_cart');
        $tax = Tax::first();
        return view('front.checkout.checkout', compact('mycart', 'tax'));
    }

    public function createOrder(Request $request)
    {
        $order = $request->all();
        $tax = Tax::first();
        $order['status'] = config('constants.order_status');
        Order::create($order);
        $data_order = Order::select('id')
            ->orderByDesc('created_at')
            ->limit(1)->first();

        $mycart = session()->get('my_cart');

        foreach ($mycart as $key => $row) {
            $price = $row['price'] + ($row['price'] * ($tax['rate_tax'] / 100));
            $data_promotion = PromotionDetail::select('rate')
                ->Where('product_id', $key)
                ->first();
            if ($data_promotion != null) {
                $data = ['quantity' => $row['quantity'], 'price' => $price, 'Promotion_rate' => $data_promotion['rate'], 'category_id' => $row['category_id'], 'product_id' => $key, 'order_id' => $data_order['id']];
            } else {
                $data = ['quantity' => $row['quantity'], 'price' => $price, 'Promotion_rate' => null, 'category_id' => $row['category_id'], 'product_id' => $key, 'order_id' => $data_order['id']];
            }
            OrderDetail::create($data);
            $products = Product::all();
            foreach ($products as $id_product => $row_product) {
                if ($key === $id_product) {
                    $update = Product::find($id_product);
                    $update['quantity'] = $update['quantity'] - $row['quantity'];
                    $update->update();
                }
            }
        }
        if ($order['optradio'] == 0) {
            $request->session()->forget('my_cart');
            return redirect(route('home.cart.list'));
        }
        if ($order['optradio'] == 1) {
            return redirect(route('front.payment'));
        }
    }

    public function userOrderNews()
    {
        $products = Product::all();
        $user_orders = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->select('orders.id', 'receiver', 'phone', 'address', 'description', 'quantity', 'price', 'Promotion_rate', 'category_id', 'product_id', 'order_id')
            ->where('status', 1)
            ->get();
        return view('front.order.orderConfirm', compact('user_orders', 'products'));
    }

    public function allOrder()
    {
        $products = Product::all();
        $user_orders = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->select('orders.id', 'receiver', 'phone', 'address', 'description', 'quantity', 'price', 'Promotion_rate', 'category_id', 'product_id', 'order_id')
            ->get();
        return view('front.order.orderAll', compact('user_orders', 'products'));
    }

    public function orderShip()
    {
        $products = Product::all();
        $user_orders = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->select('orders.id', 'receiver', 'phone', 'address', 'description', 'quantity', 'price', 'Promotion_rate', 'category_id', 'product_id', 'order_id')
            ->where('status', 2)
            ->get();
        return view('front.order.orderShip', compact('user_orders', 'products'));
    }
    public function orderFinish()
    {
        $products = Product::all();
        $user_orders = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->select('orders.id', 'receiver', 'phone', 'address', 'description', 'quantity', 'price', 'Promotion_rate', 'category_id', 'product_id', 'order_id')
            ->where('status', 3)
            ->get();
        return view('front.order.orderFinish', compact('user_orders', 'products'));
    }
    public function orderBlock()
    {
        $products = Product::all();
        $user_orders = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_details.order_id')
            ->select('orders.id', 'receiver', 'phone', 'address', 'description', 'quantity', 'price', 'Promotion_rate', 'category_id', 'product_id', 'order_id')
            ->where('status', 4)
            ->get();
        return view('front.order.orderBlock', compact('user_orders', 'products'));
    }

    public function blockfront(Request $request, $id)
    {
        $order = Order::find($id);
        $order['status'] = 4;
        $order->update($request->all());

        return redirect(route('home.orders_confirm'));
    }
}