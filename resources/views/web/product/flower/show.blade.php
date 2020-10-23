@extends('web.layout.body')

@section('title', $product_info->name)

@section('body')
    <img src="/images/flower/2019/showPayTop1.png?imageslim" onclick="return false;"  />
    <div class="showPayMain" style="background: #f1e8e1;">
        <div class="info">
            <div class="fl bir_img">
                <img src="/images/luckYear/showPayTop3.png?imageslim" onclick="return false;" >
                <p>{{$order_info->sex == 1 ? '男' : '女'}}主<br />资料</p>
            </div>
            <div class="fr user-info">
                <ul>
                    <li>
                        <span class="color_fate">姓名：</span>
                        {{$order_info->realname }}&nbsp;({{$other_user_info['constellation']}}座)
                    </li>
                    <li>
                        <span class="color_fate">公历：</span>
                        {{$other_user_info['gregorian_year'] }}年{{$other_user_info['gregorian_month']}}月{{$other_user_info['gregorian_day']}}日
                        ({{$other_user_info['week_name']}})
                    </li>
                    <li>
                        <span class="color_fate">农历：</span>
                        {{$other_user_info['lunar_year'] }}年{{$other_user_info['lunar_month']}}月{{$other_user_info['lunar_day']}}日
                        ({{$other_user_info['lunar_month_chinese']}}{{$other_user_info['lunar_day_chinese']}})
                    </li>
                    <li>
                        <span class="color_fate">生辰：</span>
                        {{ $bir_time_config[$order_info['birthtime']]}}
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        @if($order_info['content'])
            @foreach($order_info['content'] as $item)
                <div class="result_list">
                    <h3 style="color: #ef77a7;"><img src="/images/flower/2019/showPayTop3.png?imageslim" onclick="return false;" >{{$item['title']}}</h3>
                    <div class="contentMain">
                        {!! preg_replace("/\r\n/","<br />",str_replace('<br>','',$item['content'])) !!}
                    </div>
                </div>
            @endforeach
        @endif
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
@endsection