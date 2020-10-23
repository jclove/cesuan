@extends('web.layout.body')

@section('title', $product_info->name)

@section('body')
    <img src="/images/loveAstrolabe/showPayTop1.png?imageslim" onclick="return false;"/>
    <div class="showPayTop1 loveAstrolabe">
        <img src="/images/loveAstrolabe/showPayTop2.png?imageslim" onclick="return false;"/>
    </div>
    <div class="showPayMain loveAstrolabe">
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
                    已有<span class="color_lover" style="color: #f27979;">107485</span>人进行了测算，<span class="color_lover" style="color: #f27979;">99%</span>的用户认为测算结果对恋爱和婚姻生活产生了重要帮助！
                </p>
                <img class="line" src="/images/luckYear/showPayTop4.png?imageslim" onclick="return false;">
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

        <img class="marginT30" src="/images/loveAstrolabe/showPayTop3.png?imageslim" onclick="return false;">

        <div class="result_list">
            <h3><img src="/images/loveAstrolabe/showPayTop4.png?imageslim" onclick="return false;">你的爱情命格详解</h3>
            <div class="listMain">
                <img src="/images/loveAstrolabe/showPayTop5.png?imageslim" onclick="return false;">
                <ul style="left: 0.9rem;width: 5.2rem;">
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你一生的爱情运势如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何与异性相处，你的爱情观是怎样的？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;揭秘你的各项爱情指数，是否爱情高手？</li>
                </ul>
                <div class="payBut" style="top: 2.9rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/loveAstrolabe/showPayTop4.png?imageslim" onclick="return false;">你的爱情世界与转折</h3>
            <div class="listMain">
                <img src="/images/loveAstrolabe/showPayTop5.png?imageslim" onclick="return false;">
                <ul style="left: 0.9rem;width: 5.2rem;">
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你在恋爱中的优势是什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;交往中需要注意些什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你身上哪些特质最吸引异性？</li>
                </ul>
                <div class="payBut" style="top: 2.9rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/loveAstrolabe/showPayTop4.png?imageslim" onclick="return false;">你的命中爱人</h3>
            <div class="listMain">
                <img src="/images/loveAstrolabe/showPayTop5.png?imageslim" onclick="return false;">
                <ul style="left: 0.9rem;width: 5.2rem;">
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的真爱相貌如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA的性格是什么样的？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA对爱情有何期待？</li>
                </ul>
                <div class="payBut" style="top: 2.9rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/loveAstrolabe/showPayTop4.png?imageslim" onclick="return false;">你的婚姻状况</h3>
            <div class="listMain">
                <img src="/images/loveAstrolabe/showPayTop5.png?imageslim" onclick="return false;">
                <ul style="left: 0.9rem;width: 5.2rem;">
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;结婚后，你的婚姻会出现哪些情形？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你对婚姻的态度有哪些变化？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你与另一半的相处状况又会如何？</li>
                </ul>
                <div class="payBut" style="top: 2.9rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/loveAstrolabe/showPayTop4.png?imageslim" onclick="return false;">爱情幸福建议</h3>
            <div class="listMain">
                <img src="/images/loveAstrolabe/showPayTop5.png?imageslim" onclick="return false;">
                <ul style="left: 0.9rem;width: 5.2rem;">
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;大师根据你的情感特质，给出详细建议!</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;让你幸福满满，收获甜蜜爱情</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;面对今年的爱情状况，你需如何面对？</li>
                </ul>
                <div class="payBut" style="top: 2.9rem;"></div>
            </div>
        </div>
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
    <div class="payButAlert hide">
        <div class="payMain" id="payMainShow"></div>
    </div>
    <div class="mask hide"></div>
@endsection