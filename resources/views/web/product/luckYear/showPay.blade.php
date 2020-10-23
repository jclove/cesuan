@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .result_list h3{
            color: #e56353;
        }
    </style>
@endsection

@section('body')
    <img src="/images/luckYear/2019/top1.png?imageslim" onclick="return false;"/>
    <div class="showPayMain luckYear" style="background: #F0C59A;">
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
                    已有<span class="color_lover">406387</span>人进行了测算，<span class="color_lover">99%</span>的用户认为分析准确，帮他们解决心中疑惑，指明人生前程！
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
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年主要运程详解
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年的整体状况如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;会迎来哪些机遇和挑战？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的人生会有怎样变动？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年外部机遇与转变
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年外界环境对你生活有何影响？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你该如何面对各种起伏变化？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年你特别注意的地方是？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年事业机遇与转变
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年工作职场上会迎来哪些变动？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;事业会出现什么关键机遇？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何才能抓住机遇，迎来收获？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png" onclick="return false;">2020年财富机遇与转变
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年你的财富状况如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;能否出现好的转运发财机会？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何避免破财，帮你牢牢锁住财富？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年爱情机遇与转变
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你今年的爱情运势是否顺利？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何催旺桃花运，避开烂桃花？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;面对今年的爱情状况，你需如何面对？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>


        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年的人际关系
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年整体的人际关系，是好是坏？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何处理和家人、朋友、同事的关系？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;人际关系对你的个人发展有何影响？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年的健康状况
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;今年身体健康状况如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;有哪些不适？需要注意什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何养好身体，健康快乐？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/luckYear/showPayTop6.png?imageslim" onclick="return false;">2020年给你的开运叮嘱
            </h3>
            <div class="listMain">
                <img src="/images/luckYear/showPayTop7.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何扭转不利因素，开拓光明前程？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何在多边的局势中，迎来幸福生活？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;大师良言，助你开年行大运？</li>
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