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
    <img src="/images/foreseeMarriage/showPayTop1.png?imageslim" onclick="return false;"/>
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
        @if($other_other_user_info!== false && !empty($other_other_user_info))
            <div class="info marginT20">
                <div class="fl bir_img">
                    <img src="/images/luckYear/showPayTop3.png?imageslim" onclick="return false;">
                    <p>{{$order_info['other_sex'] == 1 ? '男' : '女'}}主<br/>资料</p>
                </div>
                <div class="fr user-info">
                    <ul>
                        <li>
                            <span class="color_fate">姓名：</span>
                            {{$order_info['other_realname'] }}&nbsp;&nbsp;({{$other_other_user_info['constellation']}}座)
                        </li>
                        <li>
                            <span class="color_fate">公历：</span>
                            {{$other_other_user_info['gregorian_year'] }}年{{$other_other_user_info['gregorian_month']}}
                            月{{$other_other_user_info['gregorian_day']}}日
                            ({{$other_other_user_info['week_name']}})
                        </li>
                        <li>
                            <span class="color_fate">农历：</span>
                            {{$other_other_user_info['lunar_year'] }}年{{$other_other_user_info['lunar_month']}}
                            月{{$other_other_user_info['lunar_day']}}日
                            ({{$other_other_user_info['lunar_month_chinese']}}{{$other_other_user_info['lunar_day_chinese']}})
                        </li>
                        <li>
                            <span class="color_fate">生辰：</span>
                            {{ $bir_time_config[$order_info['other_birthtime']] }}
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        @endif
        <div id="payMain">
            <div class="payMain marginT20" id="showPayMain">
                <p>
                    已有<span class="color_lover">138122</span>人进行了测算，<span class="color_lover">99%</span>的用户认为测算结果对恋爱和婚姻生活产生了重要帮助！
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
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你们能否白头到老
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;通过八字看性格，你们婚姻指数有多高！</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你们的婚姻会怎样，能否牵手一生？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">婚后感情与相处
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年是否能追到TA，婚后对方是否会变心！</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;生活中会发生哪些不愉快？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">婚后危机与走势
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;婚姻生活会遭遇哪些感情危机？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何趋吉避凶、化险为夷！</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">婚后家庭状况
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子的到来能否让感情升温、家庭更加和睦？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;亲子关系如何相处，对家庭有何影响?</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">婚后幸福秘方
            </h3>
            <div class="listMain">
                <img src="/images/loveElegant/showPayTop2.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;婚后依旧能保持甜蜜如初的秘诀是什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;大师为你独家量身定制：幸福婚姻秘方?</li>
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