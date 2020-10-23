@extends('web.layout.body')

@section('title')
    {{ $type == 'wechat' ? '关注公众号' : '联系客服' }}
@endsection

@section('css')
    <style>
        html{
            width:100%;
            height:100%;
        }
        body{
            width:100%;
            height:100%;
            position:absolute;
            background: url("https://zunyue.cdn.bcebos.com/game/image/beijign.png") no-repeat;
            background-size:100% 100%;
        }
    </style>
@endsection

@section('body')
    <div class="userQrcodeMain">
        <div class="qrcode">
            <img src="{{ $type == 'wechat' ? $system_config['wechat']['qrcode'] :  $system_config['kefu']['qrcode']}}" alt="">
            <p style="margin-top: 0.24rem;">长按识别二维码</p>
            @if($type == 'wechat')
                <p>关注公众号</p>
            @else
                <p>添加客服微信</p>
            @endif
        </div>
    </div>
@endsection
