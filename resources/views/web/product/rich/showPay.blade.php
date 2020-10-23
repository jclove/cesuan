@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .luckYear{
            background: #f3d889;
        }
        .result_list h3{
            color: #d75d1d;
        }
        .result_list .listMain ul{
            left: 0.9rem;
            width: 5.3rem;
        }
    </style>
@endsection

@section('body')
    <img src="/images/rich/2019/showPayTop1.png?imageslim" onclick="return false;"/>
    <div class="showPayMain luckYear">
        <div class="info">
            <div class="fl bir_img">
                <img src="/images/luckYear/showPayTop3.png?imageslim" onclick="return false;">
                <p>{{$order_info['sex'] == 1 ? '男' : '女'}}主<br/>资料</p>
            </div>
            <div class="fr user-info">
                <ul>
                    <li>
                        <span class="color_fate">姓名：</span>
                        {{$order_info['realname'] }}&nbsp;&nbsp;({{$other_user_info['constellation']}}座)
                    </li>
                    <li>
                        <span class="color_fate">公历：</span>
                        {{$other_user_info['gregorian_year'] }}年{{$other_user_info['gregorian_month']}}
                        月{{$other_user_info['gregorian_day']}}日
                        ({{$other_user_info['week_name']}})
                    </li>
                    <li>
                        <span class="color_fate">农历：</span>
                        {{$other_user_info['lunar_year'] }}年{{$other_user_info['lunar_month']}}
                        月{{$other_user_info['lunar_day']}}日
                        ({{$other_user_info['lunar_month_chinese']}}{{$other_user_info['lunar_day_chinese']}})
                    </li>
                    <li>
                        <span class="color_fate">生辰：</span>
                        {{ $bir_time_config[$order_info['birthtime']] }}
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>

        <div id="payMain">
            <div class="payMain marginT20" id="showPayMain">
                <p>
                    已有<span class="color_lover">188940</span>人进行了测算，<span class="color_lover">99%</span>的用户认为分析准确，帮他们解决心中疑惑，指明人生前程！
                </p>
                <div class="priceArea">
                    <span class="price">原价：{{$order_info['price']}}元 </span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="total_fee">限时优惠：<span class="color_lover" style="color: #f27979;">{{ $order_info['total_fee'] }}元</span></span>
                </div>
                <div class="pay">
                    @if($is_weixin == 'yes')s
                        <img class="payBut" src="/images/luckYear/wechatPay.png">
                    @else
                        <p>请选择支付方式</p>
                        <a href="{{ route('web.pay.wechat') }}" {{ $is_mobile == false ? 'target="_blank"' : ''}}>
                            <img class="" src="/images/luckYear/wechatPay.png" alt="">
                        </a>
                        <!--<a href="{{ route('web.pay.alipay') }}" {{ $is_mobile == false ? 'target="_blank"' : ''}}>
                            <img class="" src="/images/luckYear/alipay.png" alt="">
                        </a>-->
                    @endif
                </div>
            </div>
        </div>

        <img class="marginT30" src="/images/rich/2019/showPayTop2.png?imageslim" onclick="return false;">

        <div class="result_list">
            <h3><img src="/images/rich/2019/showPayTop3.png?imageslim" onclick="return false;">2020年财富运程详解</h3>
            <div class="listMain">
                <img src="/images/rich/2019/showPayTop4.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年财运如何，可否迎来大富大贵？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年财富秘诀在哪，如何找到生财管道轻松赚钱？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/rich/2019/showPayTop3.png?imageslim" onclick="return false;">2020年财富发展策略</h3>
            <div class="listMain">
                <img src="/images/rich/2019/showPayTop4.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年有哪些财富机会出现，你该如何把握？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何止损减损，成功避开破财点？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;对财务危机，你应采取哪些措施？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>


        <div class="result_list">
            <h3><img src="/images/rich/2019/showPayTop3.png?imageslim" onclick="return false;">2020年给你的财富建议</h3>
            <div class="listMain">
                <img src="/images/rich/2019/showPayTop4.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;大师独家秘诀，为你改善提升财运!</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;让你把握机遇，财富大增？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
    <div class="payButAlert hide">
        <div class="payMain" id="payMainShow"></div>
    </div>
    <div class="mask hide"></div>
@endsection