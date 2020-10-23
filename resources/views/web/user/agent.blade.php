@extends('web.layout.body')

@section('title')
    我的下级
@endsection

@section('css')
    <style>
        body{
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="agentMain budgetMain rankingMain">
        <div class="top">
            <div class="title text-align-center">我的下级总数</div>
            <div class="balance text-align-center">{{ $first_count + $second_count + $third_count }} 人</div>
            <a href="">
                <div class="buy">我的推广</div>
            </a>
        </div>
        <div class="list">
            <div class="display-flex flex-wrap-nowrap">
                <a href="{{ route('web.user.agent', ['level' => 1]) }}" class="flex-item {{ $level == 1 ? 'active' : '' }}">一级盟友({{ $first_count }})</a>
                <a href="{{ route('web.user.agent', ['level' => 2]) }}" class="flex-item  {{ $level == 2 ? 'active' : '' }}">二级盟友({{ $second_count }})</a>
                <a href="{{ route('web.user.agent', ['level' => 3]) }}" class="flex-item  {{ $level == 3 ? 'active' : '' }}">三级盟友({{ $second_count }})</a>
            </div>
            @foreach($list as $index => $item)
                <div class="orderlist">
                    <div class="number">{{ $index+1 }}</div>
                    <img class="headimgurl" src="{{$item->wechatUser->headimgurl}}" alt="">
                    <div class="info">
                        <h5 class="nickname">{{ $item->wechatUser->nickname }}</h5>
                        <p class="date">{{ $item->created_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
