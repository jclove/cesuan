@extends('web.layout.body')

@section('title', '扫码支付')

@section('css')
    <style>
        body {
            background: #efefef;
        }
    </style>
@endsection

@section('body')
    <div class="qrCodePay">
        <p><span>商品名称：</span>{{$order_info['body']}}</p>
        <p><span>商品订单：</span>{{$order_info['out_trade_no']}}</p>
        <p><span>应付金额：</span><span class="price">￥{{$order_info['total_fee']}}</span></p>
        <p><span>购买时间：</span>{{date('Y年m月d日', strtotime($order_info['created_at']))}}</p>
        <div class="qrcode">
            {!! \SimpleSoftwareIO\QrCode\Facades\QrCode::size(200)->margin(0)->generate($pay_info['code_url']); !!}
            <div class="pay-tips">请打开手机微信，扫一扫完成支付</div>
        </div>
    </div>
@endsection


@section('js')
    <script>
      var t = setInterval(function () {
        $.post('{{ route('web.pay.checkPay')}}', {
          '_token': '{{csrf_token()}}'
        },function (result) {
          if (result.body_data === 'yes') {
            clearInterval(t);
            window.location.href = '{{ route('web.product.show' )}}';
            return false;
          }
        });
      }, 1000);
    </script>
@endsection