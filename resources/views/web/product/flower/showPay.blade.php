@extends('web.layout.body')

@section('title', $product_info->name)

@section('body')
    <img src="/images/flower/2019/showPayTop1.png?imageslim" onclick="return false;" />
    <div class="showPayMain" style="background: #ffeff4;">
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
                    已有<span class="color_lover" style="color: #f27979;">228209</span>人进行了测算，<span class="color_lover" style="color: #f27979;">99%</span>的用户认为测算结果对恋爱和婚姻生活产生了重要帮助！
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

        <img class="marginT30" src="/images/flower/2019/showPayTop2.png?imageslim" onclick="return false;">

        <div class="result_list">
            <h3 style="color: #ef77a7;"><img src="/images/flower/2019/showPayTop3.png?imageslim" onclick="return false;" >2020年桃花运详解</h3>
            <div class="listMain">
                <img src="/images/flower/2019/showPayTop4.png?imageslim" onclick="return false;" >
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年你的桃花运如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年你的恋情如何发展？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;会有哪些惊喜和变化？</li>
                </ul>
                <div class="payBut" style="top: 3rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3 style="color: #ef77a7;"><img src="/images/flower/2019/showPayTop3.png?imageslim" onclick="return false;" >2020年恋情机遇</h3>
            <div class="listMain">
                <img src="/images/flower/2019/showPayTop4.png?imageslim" onclick="return false;" >
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年你会遇到什么样的异性？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;这些异性有哪些特征？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年有哪些不错的机遇？</li>
                </ul>
                <div class="payBut" style="top: 3rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3 style="color: #ef77a7;"><img src="/images/flower/2019/showPayTop3.png?imageslim" onclick="return false;" >你命中桃花几何</h3>
            <div class="listMain">
                <img src="/images/flower/2019/showPayTop4.png?imageslim" onclick="return false;" >
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的命里到底有没有好桃花？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;揭秘你的恋爱性格是啥样？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的感情模式是什么？</li>
                </ul>
                <div class="payBut" style="top: 3rem;"></div>
            </div>
        </div>

        <div class="result_list">
            <h3 style="color: #ef77a7;"><img src="/images/flower/2019/showPayTop3.png?imageslim" onclick="return false;" >2020年恋情插曲</h3>
            <div class="listMain">
                <img src="/images/flower/2019/showPayTop4.png?imageslim" onclick="return false;" >
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年你的恋情会遇到哪些突发状况？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你该如何应对？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;给你的具体建议？</li>
                </ul>
                <div class="payBut" style="top: 3rem;"></div>
            </div>
        </div>
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
    <div class="payButAlert hide">
        <div class="payMain" id="payMainShow"></div>
    </div>
    <div class="mask hide"></div>
@endsection