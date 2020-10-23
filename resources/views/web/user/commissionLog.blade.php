@extends('web.layout.body')

@section('title')
    佣金记录
@endsection

@section('css')
    <style>
        body {
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="commissionLog agentMain budgetMain rankingMain">
        <div class="top">
            <div class="title text-align-center">推广总佣金(元)</div>
            <div class="balance text-align-center">{{ $user_info->total_commission }}</div>
            <a href="{{ route('web.user.poster') }}">
                <div class="buy">我的推广</div>
            </a>
        </div>
        <div class="list">
            <div class="title">
                <p class="left">佣金明细</p>
            </div>
            @foreach($list as $index => $item)
                <div class="orderlist">
                    <div style="display: flex;flex: 1;">
                        <img class="headimgurl" src="{{$item->wechatUser->headimgurl}}" alt="">
                        <div class="info">
                            <h5 class="nickname">{{ $item->wechatUser->nickname }}</h5>
                            <p class="date">{{ $item->created_at }}</p>
                        </div>
                    </div>
                    <div class="right">+{{ $item->finally }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
