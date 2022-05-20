@extends('front.layout.master')
<link rel="stylesheet" href="{{asset('css/history3.css')}}">
@section('content')
<?php
function numInWords($num)
{
    $nwords = array(
        0                   => 'không',
        1                   => 'một',
        2                   => 'hai',
        3                   => 'ba',
        4                   => 'bốn',
        5                   => 'năm',
        6                   => 'sáu',
        7                   => 'bảy',
        8                   => 'tám',
        9                   => 'chín',
        10                  => 'mười',
        11                  => 'mười một',
        12                  => 'mười hai',
        13                  => 'mười ba',
        14                  => 'mười bốn',
        15                  => 'mười lăm',
        16                  => 'mười sáu',
        17                  => 'mười bảy',
        18                  => 'mười tám',
        19                  => 'mười chín',
        20                  => 'hai mươi',
        30                  => 'ba mươi',
        40                  => 'bốn mươi',
        50                  => 'năm mươi',
        60                  => 'sáu mươi',
        70                  => 'bảy mươi',
        80                  => 'tám mươi',
        90                  => 'chín mươi',
        100                 => 'trăm',
        1000                => 'nghìn',
        1000000             => 'triệu',
        1000000000          => 'tỷ',
        1000000000000       => 'nghìn tỷ',
        1000000000000000    => 'ngàn triệu triệu',
        1000000000000000000 => 'tỷ tỷ',
    );
    $separate = ' ';
    $negative = ' âm ';
    $rltTen   = ' linh ';
    $decimal  = ' phẩy ';
    if (!is_numeric($num)) {
        $w = '#';
    } else if ($num < 0) {
        $w = $negative . numInWords(abs($num));
    } else {
        if (fmod($num, 1) != 0) {
            $numInstr    = strval($num);
            $numInstrArr = explode(".", $numInstr);
            $w           = numInWords(intval($numInstrArr[0])) . $decimal . numInWords(intval($numInstrArr[1]));
        } else {
            $w = '';
            if ($num < 21) // 0 to 20
            {
                $w .= $nwords[$num];
            } else if ($num < 100) {
                // 21 to 99
                $w .= $nwords[10 * floor($num / 10)];
                $r = fmod($num, 10);
                if ($r > 0) {
                    $w .= $separate . $nwords[$r];
                }

            } else if ($num < 1000) {
                // 100 to 999
                $w .= $nwords[floor($num / 100)] . $separate . $nwords[100];
                $r = fmod($num, 100);
                if ($r > 0) {
                    if ($r < 10) {
                        $w .= $rltTen . $separate . numInWords($r);
                    } else {
                        $w .= $separate . numInWords($r);
                    }
                }
            } else {
                $baseUnit     = pow(1000, floor(log($num, 1000)));
                $numBaseUnits = (int) ($num / $baseUnit);
                $r            = fmod($num, $baseUnit);
                if ($r == 0) {
                    $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit];
                } else {
                    if ($r < 100) {
                        if ($r >= 10) {
                            $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm ' . numInWords($r);
                        }
                        else{
                        	$w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm linh ' . numInWords($r);
                        }
                    } else {
                        $baseUnitInstr      = strval($baseUnit);
                        $rInstr             = strval($r);
                        $lenOfBaseUnitInstr = strlen($baseUnitInstr);
                        $lenOfRInstr        = strlen($rInstr);
                        if (($lenOfBaseUnitInstr - 1) != $lenOfRInstr) {
                            $numberOfZero = $lenOfBaseUnitInstr - $lenOfRInstr - 1;
                            if ($numberOfZero == 2) {
                                $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm linh ' . numInWords($r);
                            } else if ($numberOfZero == 1) {
                                $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . ' không trăm ' . numInWords($r);
                            } else {
                                $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . $separate . numInWords($r);
                            }
                        } else {
                            $w = numInWords($numBaseUnits) . $separate . $nwords[$baseUnit] . $separate . numInWords($r);
                        }
                    }
                }
            }
        }
    }
    return $w;
}

function numberInVietnameseWords($num)
{
    return str_replace("mươi năm", "mươi lăm", str_replace("mươi một", "mươi mốt", numInWords($num)));
}

function numberInVietnameseCurrency($num)
{
    $rs    = numberInVietnameseWords($num);
    $rs[0] = strtoupper($rs[0]);
    return $rs . ' đồng y';
}
?>
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
            @foreach($orders as $key => $row)
            <div>
                @php
                $total = 0;
                @endphp
                
                <div class="_2n4gHk">
                    @foreach($user_orders as $k =>$order)
                    @if($row->id === $order['order_id'])
                    <div>
                        <div class="GuWdvd">
                            <div class="WqnWb-">
                                <div class="_1DPpu5">
                                    {{-- @foreach($suppliers as $supplier)
                                    @if($supplier->id === $row['supplier_id'])
                                    <div class="_1CIbL0">{{$supplier->name}}</div>
                                    @endif
                                    @endforeach --}}
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
                                                                style="background-image: url({{Storage::url($order['image'])}});">
                                                                <div class="lahera-image__content--blur"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="_1cxKtp">
                                                        <div>
                                                            <div class="_1xHDVY">
                                                                <span class="_30COVM">{{$order['name']}}</span>
                                            
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="y8ewrc"></div>
                                                            <div class="_2H6lAy">x {{$order['quantity']}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $subtotal = $order['quantity'] * $order['price'];
                                                    $total = $total + $subtotal;
                                                ?>
                                                <div class="_1kvNGb">
                                                    <div>
                                                        <div class="mBERmM">{{number_format($subtotal,'0',',','.')}}VND</div>
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
                    @endif
                    @endforeach
                    @if($total > 0)
                    <div class="_37UAJO">
                        <div class="_1CH8fe">
                            <span class="zO5iWv">
                                <div class="_-8oSuS">
                                    <i class="fa fa-shield"></i>
                                </div>
                            </span>
                            <div class="_1mmoh8">Tổng số tiền:
                            </div>
                            <div class="_1MS3t2">{{number_format($total,'0',',','.')}} VND</div>
                        </div>
                        <div class="_1mmoh88">({{numberInVietnameseCurrency($total)}})</div>
                    </div>
                    <div class="_1Qn42s">
                        <div class="_1lM63-">
                            <span class="_2xFj47">
                                <div class="lahera-drawer">
                                </div>
                            </span>
                        </div>
                        <div class="_23TzMz">
                            @if($row['status'] !=null )
                            <div class="_2BTXui">
                                <button class="stardust-button stardust-button--primary _2x5SvJ">Đã Thanh Toán</button>
                            </div>
                            @else
                            <div class="_2BTXui">
                                <button class="stardust-button stardust-button--primary _2x5SvJ">Chưa Thanh Toán</button>
                            </div>
                            @endif
                        </div>
                    </div>
                @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
@endsection