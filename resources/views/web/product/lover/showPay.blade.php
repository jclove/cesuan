@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .showPayMain .info .user-info .color_fate,.showPayMain .info .bir_img p,.result_list h3{
            color: rgb(239,72,100);
        }
        .result_list .listMain ul{
            left: 0.9rem;
            width: 5.3rem;
        }
    </style>
@endsection

@section('body')
    <img src="/images/lover/showPayTop1.png?imageslim" onclick="return false;"/>
    <div class="showPayTop1 lover">
        <img src="/images/lover/showPayTop2.png?imageslim" onclick="return false;"/>
    </div>
    <div class="showPayMain lover">
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
                    已有<span class="color_lover">221969</span>人进行了测算，<span class="color_lover">99%</span>的用户认为测算结果对恋爱和婚姻生活产生了重要帮助！
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

        <img class="marginT30" src="/images/lover/showPayTop3.png?imageslim" onclick="return false;">


        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" onclick="return false;">在爱情中，你的优势与弱点</h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;恋爱中你会出现哪些突发状况？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;当感情遭遇危机，你该如何面对？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的弱点是什么，如何在恋爱中扬长避短？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" onclick="return false;">谁将对你一见钟情</h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;对你一见钟情的人是谁？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你们将在哪里相遇？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;对方长相如何，年龄几许？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>


        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" onclick="return false;">谁会陪你走进婚姻殿</h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;最终谁会与你携手到老，恩爱一生？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;这个人长什么样子？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;对方的年龄多少，以及身在何处？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/lover/showPayTop4.png?imageslim" onclick="return false;">如何开运，找到另一半</h3>
            <div class="listMain">
                <img src="/images/lover/showPayTop5.png?imageslim" onclick="return false;">
                <ul style="left: 0.9rem;width: 5.2rem;">
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;为你量身定做开运方法？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;助你尽快找到幸福，获得好姻缘！？</li>
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