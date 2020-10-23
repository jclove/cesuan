@extends('web.layout.body')

@section('title')
    排行榜
@endsection

@section('body')
    <div class="rankingMain">
        <div class="topList" style="background: url('https://zunyue.cdn.bcebos.com/game/image/bg_person.png') no-repeat;">
            <ul class="tab display-flex flex-wrap-nowrap">
                @foreach(['总排名', '一级盟友', '二级盟友', '三级盟友'] as $index => $value)
                    <li class="flex-item {{ $index == $level ? 'active' : '' }}">
                        <a href="{{ route('web.user.ranking', ['level' => $index]) }}">{{ $value }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="top">
                <li>
                    @if(isset($top_list[1]))
                        <img class="topImg" src="https://zunyue.cdn.bcebos.com/game/image/level_2.png" alt="">
                        <img class="headimgurl level2" src="{{ $top_list[1]['wechatUser']['headimgurl'] }}" alt="">
                        <h4 class="nickname">{{ $top_list[1]['wechatUser']['nickname'] }}</h4>
                        <p class="gold">{{ $top_list[1]['total_commission'] }}</p>
                    @endif
                </li>
                <li>
                    @if(isset($top_list[0]))
                        <img class="topImg" src="https://zunyue.cdn.bcebos.com/game/image/level_1.png" alt="">
                        <img class="headimgurl level1" src="{{ $top_list[0]['wechatUser']['headimgurl'] }}" alt="">
                        <h4 class="nickname">{{ $top_list[0]['wechatUser']['nickname'] }}</h4>
                        <p class="gold">{{ $top_list[0]['total_commission'] }}</p>
                    @endif
                </li>
                <li>
                    @if(isset($top_list[2]))
                    <img class="topImg" src="https://zunyue.cdn.bcebos.com/game/image/level_3.png" alt="">
                    <img class="headimgurl level3" src="{{ $top_list[2]['wechatUser']['headimgurl'] }}" alt="">
                    <h4 class="nickname">{{ $top_list[2]['wechatUser']['nickname'] }}</h4>
                    <p class="gold">{{ $top_list[2]['total_commission'] }}</p>
                    @endif
                </li>
            </ul>
        </div>
        <div class="list">
            @foreach($list as $index => $item)
                <div class="orderlist">
                    <div style="display: flex;flex: 1;">
                        <div class="number">{{ $index+4 }}</div>
                        <img class="headimgurl" src="{{$item->wechatUser->headimgurl}}" alt="">
                        <div class="info">
                            <h5 class="nickname">{{ $item->wechatUser->nickname }}</h5>
                        </div>
                    </div>
                    <div class="right">{{ $item->total_commission }}</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
