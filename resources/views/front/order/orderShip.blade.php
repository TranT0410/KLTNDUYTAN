@extends('front.layout.master')
<link rel="stylesheet" href="{{asset('css/history3.css')}}">
@section('content')
<div class="container _1QwuCJ">
    <div class="_36cLcR">
        <div class="_1_68zU">
            <a class="_2BuJEf" href="">
                <i class="fa fa-user-circle"></i>
            </a>
            <div class="_2uLDqN">
                <div class="_2lG70n">{{auth()->user()->name}}</div>
                <div>
                    <a class="_27BCO5" href="./account.html">

                        <i class="fa fa-pencil"></i>
                        Sửa hồ sơ
                    </a>
                </div>
            </div>
        </div>
        <div class="_1ZnP-m">
            <div class="stardust-dropdown ">
                <div class="stardust-dropdown__item-header">
                    <a class="_3aAm2h" href="./account.html">
                        <div class="_21F-bS">
                            <i class="fa fa-user" style="color: #888 ;"></i>
                        </div>
                        <div>
                            <span class="_3CHLlN">Tài khoản của tôi</span>
                        </div>
                    </a>
                </div>
                <div class="stardust-dropdown__item-body">
                    <div class="_3aiYwk">
                        <a class="_3SsG4j " href="./account.html">
                            <span class="_2PrdXX">Hồ sơ</span>
                        </a>
                        <a class="_3SsG4j" href="">
                            <span class="_2PrdXX">Ngân hàng</span>
                        </a>
                        <a class="_3SsG4j" href="./diachi.html">
                            <span class="_2PrdXX">Địa chỉ</span>
                        </a>
                        <a class="_3SsG4j _3SzYTH" href="./doimatkhau.html">
                            <span class="_2PrdXX">Đổi mật khẩu</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="stardust-dropdown">
                <div class="stardust-dropdown__item-header">
                    <a class="_3aAm2h _3RsaDw" href="./history.html">
                        <div class="_21F-bS">
                            <i class="fa fa-list-alt" style="color:#888 ;"></i>
                        </div>
                        <div>
                            <span class="_3CHLlN">Đơn mua</span>
                        </div>
                    </a>
                </div>
                <div class="stardust-dropdown__item-body">
                    <div class="_3aiYwk">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="_3D9BVC">
        <div class="_2mSi0S">
            <div class="ZS1kj6">
                <a class="_2sowby" href="{{route('home.orders_all')}}">
                    <span class="_2pSH8O">Tất cả</span>
                </a>
                <a class="_2sowby " href="{{route('home.orders_confirm')}}">
                    <span class="_2pSH8O">Chờ xác nhận</span>
                </a>
                <a class="_2sowby _23VQQX" href="{{route('home.orders_ship')}}">
                    <span class="_2pSH8O">Đang giao</span>
                </a>
                <a class="_2sowby" href="{{route('home.orders_finish')}}">
                    <span class="_2pSH8O">Đã giao</span>
                </a>
                <a class="_2sowby" href="{{route('home.orders_block')}}">
                    <span class="_2pSH8O">Đã hủy</span>
                </a>
            </div>
        @foreach($user_orders as $row)
            <div>
                <div class="_2n4gHk">
                    <div>
                        <div class="GuWdvd">
                            <div class="WqnWb-">
                                <div class="_1DPpu5">
                                        @foreach($products as $product)
                                            @if($product->id === $row->product_id)
                                            <div class="_1CIbL0">{{$product->suppliers->name}}</div>
                                            @endif
                                        @endforeach  
                                    
                                    <div class="_1q53YG">
                                        <button class="stardust-button stardust-button--primary">
                                            <i class="fa fa-comments-o"></i>
                                            <span>chat</span>
                                        </button>
                                    </div>
                                    <a href="" class="_2L5VLu">
                                        <button class="stardust-button">
                                            <i style="color: #adb5bd;" class="fas fa-store"></i>
                                            <span>xem shop</span>
                                        </button>
                                    </a>
                                </div>
                                <div class="_1lE6Rh">
                                    <div class="clakWe">Chờ xác nhận</div>
                                </div>
                            </div>
                            <div class="_39XDzv"></div>
                            <a href="">
                                <div class="_2lVoQ1">
                                    <div class="_1limL3">
                                        <div>
                                            <span class="_1BJEKe">
                                                <div></div>
                                                <div class="_3huAcN">
                                                    <div class="_3btL3m">
                                                        <div class="lahera-image__wrapper">
                                                            <div class="lahera-image__place-holder">
                                                                <i class="fal fa-images"></i>

                                                            </div>
                                                            <div class="lahera-image__content"
                                                                style="background-image: url(https://cf.shopee.vn/file/ea4e475a16ce190b5b86c3b25250a9a1);">
                                                                <div class="lahera-image__content--blur"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="_1cxKtp">
                                                        <div>
                                                            <div class="_1xHDVY">
                                                                @foreach($products as $product)
                                                                @if($product->id === $row->product_id)
                                                                <span class="_30COVM">{{$product->name}}</span>
                                                                @endif
                                                                @endforeach    
                                            
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="y8ewrc"></div>
                                                            <div class="_2H6lAy">x {{$row->quantity}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $subtotal = $row->quantity * $row->price?>
                                                <div class="_1kvNGb">
                                                    <div>
                                                        <div class="mBERmM">{{number_format($subtotal,'0',',','.')}}đ</div>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="_1J7vLy">
                        <div class="DI-rNr tyOBoQ"></div>
                        <div class="DI-rNr _25igL4"></div>
                    </div>
                    <div class="_37UAJO">
                        <div class="_1CH8fe">
                            <span class="zO5iWv">
                                <div class="_-8oSuS">
                                    <i class="fa fa-shield"></i>
                                </div>
                            </span>
                            <div class="_1mmoh8">Tổng số tiền:
                            </div>
                            <div class="_1MS3t2">{{number_format($subtotal,'0',',','.')}}đ</div>
                        </div>
                    </div>
                    <div class="_1Qn42s">
                        <div class="_1lM63-">
                            <span class="_2xFj47">
                                <div class="lahera-drawer">
                                </div>
                            </span>
                        </div>
                        <div class="_23TzMz">
                            <div class="_2BTXui">
                                <button class="stardust-button stardust-button--primary _2x5SvJ">Liên hệ Người
                                    bán</button>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
          