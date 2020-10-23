@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
<style>
    .luckYear{
        background: #f1e8e1;
    }
    .result_list h3{
        color: #C4916A;
    }
    .result_list .listMain ul{
        width: 5.5rem;
        left: 0.9rem;
        top: 0.5rem;
    }
    .result_list .listMain ul li span{
        background: #C4916A;
    }
</style>
@endsection

@section('body')
    <img src="/images/opportunity/showPayTop1.png?imageslim" onclick="return false;"/>
    <div class="showPayMain luckYear">
        <div class="info">
            <div class="fl bir_img">
                <img src="/images/purple/showPayTop2.png?imageslim" onclick="return false;">
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
                    已有<span class="color_lover">233450</span>人进行了测算，<span class="color_lover">96%</span>的用户认为分析准确，帮他们解决心中疑惑，指明人生前程!
                </p>
                <img class="line" src="/images/luckYear/showPayTop4.png?imageslim"
                     onclick="return false;">
                <div class="priceArea">
                    <span class="price">原价：{{$order_info['price']}}元 </span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="total_fee">限时优惠：<span class="color_lover" style="color: #f27979;">{{ $order_info['total_fee'] }}元</span></span>
                </div>
                <div class="pay">
                    @if($is_weixin == 'yes')
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

        <img class="marginT30" src="/images/purple/showPayTop3.png?imageslim"
             onclick="return false;">


        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你未来一年的内在转变
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;未来一年是指今年生日到明年生日这段时间？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你自身会发生怎样的转变，惊喜还是危机？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你未来一年的新机遇和新危机
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;这一年会碰到哪些机遇，如何占得先机？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何走出困惑、化解危机？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你未来一年的生活变化
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;这一年哪些事情让你大费周章、心力憔悴？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的生活会有怎样变化？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你未来一年的心态与思绪
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的心态会经历怎样起伏变化？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你该如何调整思考与努力方向？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你未来一年的精神与物质
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的理想是什么，又有哪些物质需求?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;带给你的影响是什么?</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你未来一年的为人处事
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的人际相处如何?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你需要注意什么?</li>
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