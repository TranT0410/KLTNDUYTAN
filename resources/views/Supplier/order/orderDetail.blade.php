@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Order Detail</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Quanlity</th>
                                <th>Price</th>
                                <th>Promotion</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($order as $row)
                                <tr>
                                    <td class="an">{{ $row->id }}</td>
                                    <td class="an">{{ $row->categories->name }}</td>
                                    <td class="an">{{ $row->products->name }}</td>
                                    <td class="an"><img src="{{ Storage::url($row->products->image) }}"
                                                        style="width:120px;height:120px;overflow:hidden">
                                    </td>
                                    <td class="an">{{ $row->quantity }}</td>
                                    <td class="an">{{ number_format($row->price,'0',',','.') }}đ</td>
                                    <td class="an">{{ $row->Promotion_rate == null ? 0 : $row->Promotion_rate }}%</td>
                                    <?php $subtotal = $row->quantity * $row->price?>
                                    <?php $total = $subtotal - ($subtotal*($row->Promotion_rate)/100)?>
                                    <td class="an">{{number_format($total,'0',',','.')}}đ</td>
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
