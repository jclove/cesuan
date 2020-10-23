@extends('web.layout.body')

@section('title', '支付确定')

@section('css')
<style>
    body {
        background: white;
    }
</style>
@endsection

@section('body')
<div class="payReturn">
    <p>您是否已经完成支付，请确定</p>
    <a href="{{route('web.product.show')}}">
        <div class="is_pay">
            <img src="/images/measure/paySuccess.png"/>
            <p class="text-center">已经支付</p>
        </div>
    </a>
    <a href="{{ route('web.product.showPay') }}">
        <div class="is_pay">
            <img src="/images/measure/resetPay.png"/>
            <p class="text-center">支付遇到问题，重新支付</p>
        </div>
    </a>
</div>
@endsection
