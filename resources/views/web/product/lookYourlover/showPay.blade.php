@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
<style>
    .luckYear{
        background: #f1e8e1;
    }
    .showPayMain .info .user-info .color_fate{
        color: #fc8f8f;
    }
    .result_list h3{
        color: #fc8f8f;
    }
    .result_list .listMain ul{
        width: 5.5rem;
        left: 0.9rem;
        top: 0.5rem;
    }
</style>
@endsection

@section('body')
    <img src="/images/lookYourlover/showPayTop1.png?imageslim" onclick="return false;"/>
    <div class="showPayTop1 luckYear">
        <img src="/images/lover/showPayTop2.png?imageslim" onclick="return false;"/>
    </div>
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
                    已有<span class="color_lover">270122</span>人进行了测算，<span class="color_lover">99%</span>的用户认为测算结果对恋爱和婚姻生活产生了重要帮助！
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

        <img class="marginT30" src="/images/lover/showPayTop3.png?imageslim"
             onclick="return false;">


        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">全面透析TA，在你面前无法隐藏
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA的情感喜好是什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;多角度剖析TA的内心世界，让你了如指掌？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">TA的感情世界
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA如何对待感情？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA处理感情的方式是什么？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">TA的弱点和禁区
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的恋人在感情上的弱点？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA不可触犯的感情禁区是什么？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">是否适合相伴一生
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA对感情是否始终如一？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;TA是否能与你携手到老？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">给你的贴心建议
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;在恋爱中，都有哪些需要注意？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何与恋人幸福相处？</li>
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