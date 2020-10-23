@extends('web.layout.body')

@section('title', '个人中心')

@section('css')
    <link rel="stylesheet" href="https://zunyue.cdn.bcebos.com/game/css/font/iconfont.css?v=3">
    <script src="https://zunyue.cdn.bcebos.com/game/css/font/iconfont.js?v=3"></script>
    <style>
        body{
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="userMain" style="background: #F1453D;">
        @if(session('wechatUser.headimgurl'))
            <img class="headimgurl" src="{{ session('wechatUser.headimgurl') }}" alt="">
        @endif
        <div style="height: 1.36rem;"></div>
        <div class="userInfo">
            <div class="nickname text-align-center">{{ session('wechatUser.nickname') }}</div>
            <div class="uid text-align-center">UID：{{ session('wechatUser.id') }}</div>
            <div class="line">
                <span class="left"></span>
                <i></i>
                <span class="right"></span>
            </div>
            <div class="display-flex flex-wrap-nowrap">
                <a href="{{ route('web.user.my') }}" class="flex-item">
                    <span class="weight">{{ $total }}</span>
                    <span>我的测算</span>
                </a>
                @if(!empty($system_config['base']['fenxiao']) && $system_config['base']['fenxiao'] == 'yes')
                    <div class="flex-item">
                        <span class="weight">{{ $user_info->total_commission }}</span>
                        <span>累计佣金</span>
                    </div>
                    <a href="{{ route('web.user.cash') }}" class="flex-item">
                        <span class="weight">{{ $user_info->commission }}</span>
                        <span>可提现佣金</span>
                    </a>
                @endif
            </div>
        </div>
        @if(!empty($system_config['base']['fenxiao']) && $system_config['base']['fenxiao'] == 'yes')
            <div class="list display-flex flex-wrap-wrap bjwhite">
                <a href="{{ route('web.user.agent') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-ic_shiziduiwufenxitu"></use>
                    </svg>
                    <span>我的下级</span>
                </a>
                <a href="{{ route('web.user.ranking') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-paiming"></use>
                    </svg>
                    <span>排行榜</span>
                </a>
                <a href="{{ route('web.user.poster') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-erweima"></use>
                    </svg>
                    <span>我要赚钱</span>
                </a>
                <a href="{{ route('web.user.commissionLog') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-zhuanyongjin"></use>
                    </svg>
                    <span>佣金记录</span>
                </a>
                <a href="{{ route('web.user.cashLog') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-tixian"></use>
                    </svg>
                    <span>提现记录</span>
                </a>
                <a href="{{ route('web.user.wechat') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-weixin"></use>
                    </svg>
                    <span>关注公众号</span>
                </a>
                <a href="{{ route('web.user.kefu') }}" class="flex-item">
                    <svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-kefu"></use>
                    </svg>
                    <span>联系客服</span>
                </a>
            </div>
        @endif
    </div>
@endsection

