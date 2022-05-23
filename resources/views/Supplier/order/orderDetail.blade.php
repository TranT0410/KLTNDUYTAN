@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Chi Tiết Đơn Hàng</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Danh Mục</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số Lượng</th>
                                <th>Đơn Giá</th>
                                <th>Khyến Mãi</th>
                                <th>Tổng Cộng</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td class="an">{{ $order->id }}</td>
                                    <td class="an">{{ $order->categories->name }}</td>
                                    <td class="an">{{ $order->products->name }}</td>
                                    <td class="an"><img src="{{ Storage::url($order->products->image) }}"
                                                        style="width:120px;height:120px;overflow:hidden">
                                    </td>
                                    <td class="an">{{ $order->quantity }}</td>
                                    <td class="an">{{ number_format($order->price,'0',',','.') }}đ</td>
                                    <td class="an">{{ $order->Promotion_rate == null ? 0 : $order->Promotion_rate }}%</td>
                                    <?php $subtotal = $order->quantity * $order->price?>
                                    <?php $total = $subtotal - ($subtotal*($order->Promotion_rate)/100)?>
                                    <td class="an">{{number_format($total,'0',',','.')}} VND</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
@endpush
