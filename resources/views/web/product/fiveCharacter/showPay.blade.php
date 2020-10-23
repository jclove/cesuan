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
    <img src="/images/fiveCharacter/showPayTop1.png?imageslim" onclick="return false;"/>
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
                        <a href="{{ route('web.pay.alipay') }}" {{ $is_mobile == false ? 'target="_blank"' : ''}}>
                            <img class="" src="/images/luckYear/alipay.png" alt="">
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <img class="marginT30" src="/images/purple/showPayTop3.png?imageslim"
             onclick="return false;">


        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你的五行性格分析
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的五行是什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;五行命盘对你的性格影响？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">五行对你的外貌与体质影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;五行对你的外貌影响？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的五行体质分析？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;需要格外注意的身体部位是哪里？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">五行对你的饮食健康影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何透过五行调养身体？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;健康饮食妙方有哪些？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你一生的命运瞭望
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;哪方面会成就你的人生辉煌？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的人生低谷出现在哪？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你的五行手相分析
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的五行手相特征如何?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;手相如何影响你的性格?</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">五行对你的生活影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;五行对你生活的影响?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;给你带来的忧愁和喜悦是什么?</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">五行对你的恋情影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;五行影响如何你的姻缘和爱情运?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的恋情模式属于哪一类?</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">五行对你的工作影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;通过五行看职业，哪些行业更适合你?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;择业过程有哪些注意的地方?</li>
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