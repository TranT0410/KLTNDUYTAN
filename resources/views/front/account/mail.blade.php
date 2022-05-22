Xin chào bạn,Đây là mã email xác nhận tài khoản của hệ thống
</p>
<?php $dataEmail = session('email'); ?>
<p>
    MÃ XÁC NHẬN LÀ:
</p>
<ul>
    <li><strong>{{ $dataEmail['code'] }}</strong></li>
</ul>
<hr>
<p>
    Xin cảm ơn
</p>