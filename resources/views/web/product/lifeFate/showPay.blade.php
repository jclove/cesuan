@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
<style>
    .luckYear{
        background: #b42222;
    }
    .showPayMain .info .user-info .color_fate{
        color: #fc8f8f;
    }
    .result_list .listMain ul{
        width: 5rem;
        left: 0.9rem;
        top: 0.5rem;
    }
</style>
@endsection

@section('body')
    <img src="/images/lifeFate/showPayTop1.png?imageslim" onclick="return false;"/>
    <div class="showPayTop1 luckYear">
        <img src="/images/lifeFate/showPayTop2.png?imageslim" onclick="return false;"/>
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
                    已有<span class="color_lover">406387</span>人进行了测算，<span class="color_lover">99%</span>的用户认为测算结果对恋爱和婚姻生活产生了重要帮助！
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

        <img class="marginT30" src="/images/luckYear/showPayTop5.png?imageslim"
             onclick="return false;">


        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">命中注定的结婚缘
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的命中婚缘如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;桃花是否旺盛？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;婚姻路上都会出现哪些波折？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">预知近期的结婚运
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;未来几年内，你的婚运走势如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;近期有没有结婚的可能？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何把握婚缘对象？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你的感情世界，为何错失结婚时机
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;情感路上，为什么一再错失机遇？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;为什么你们的恋情，没能走到一起？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;迈向婚姻殿堂，还需要哪些造化？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你何时会结婚
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;何时可以遇到你的真爱？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的结婚年龄是多少？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">与你携手一生的那个人
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;那个人的相貌特征是什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;对方有着怎样的脾气和个性？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">如何遇到结婚对象
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你们相遇的地点最有可能是哪？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何制造缘分，提升成功概率？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>


        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">适合你的爱情经营秘诀
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何经营恋情，才能幸福长久？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你都需要做哪些改变？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">给你的幸福建议
            </h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何让你催旺桃花、魅力大增？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;大师良言，助你收获幸福爱情？</li>
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