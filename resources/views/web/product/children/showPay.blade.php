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
    <img src="/images/children/showPayTop1.png?imageslim" onclick="return false;"/>
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
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">全面详批孩子的命格
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;宝宝先天是否有好命，有何影响？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;有哪些潜质可着重培养？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何教育孩子？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">孩子命格中的潜力
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子各项能力如何？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何发挥长处？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;父母应如何引导？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">孩子对父母的期望
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何正确解读孩子的内心世界？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子肢体语言对父母有哪些暗示？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何增进亲子关系？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">孩子成长中容易出现的问题
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;成长中易出现的问题，心理思想有何波动？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何辅导孩子的学习？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;父母应采取的互动方式？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">孩子未来的命运解析
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子未来适合的行业?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子如何看待婚姻大事?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子的事业财富命运?</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">如何让孩子成就一番事业
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何顺着天赋做事?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;孩子成就一番事业的关键?</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;培养过程中，给父母的建议?</li>
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