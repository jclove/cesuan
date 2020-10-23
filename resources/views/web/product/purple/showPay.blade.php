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
    <img src="/images/purple/showPayTop1.png?imageslim" onclick="return false;"/>
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
                    已有<span class="color_lover">327120</span>人进行了测算，<span class="color_lover">96%</span>的用户认为分析准确，帮他们解决心中疑惑，指明人生前程!
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
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">关于紫微八字命盘
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;命盘主星有14 颗，对人一生影响极为关键，还有18颗辅星，则起到次要影响。
                        这32颗星影响了你90%以上的命运转折。</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你属于哪种人格类型
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的人格类型是什么，都有哪些特征？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;剖析你的人格属性，对一生有何影响？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">你一生的行为与命运
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的先天命运是什么？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的行为如何影响命运？</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">给你的人生谏言
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;你的人生格局有多大？</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;如何把握命运，顺势而为？</li>
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
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">夫妻宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;夫妻宫代表你对感情和婚姻的观念，以及另一半的期望</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读夫妻宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">子女宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;子女宫代表你对子女和晚辈的沟通方式和行为特征</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读子女宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">财帛宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;财帛宫代表你对钱财的处理态度，以及赚钱和理财能力</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读财帛宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">疾厄宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.pngimageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;疾厄宫代表你的先天身体体质和健康状况</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读疾厄宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">迁移宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;迁移宫代表你与对外相处上所表露的性格、能力和态度，在外地的顺逆吉凶</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读迁移宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">部属宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;部属宫代表你与部属之间的关系，人际关系好坏，平辈间关系得力与否</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读部属宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">事业宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;事业宫代表你一生中的事业和职业状况，发展方向，创业能力和社会地位等</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读事业宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">田宅宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;田宅宫代表你的不动产状况，居住好坏，有无变动，全家是否安宁是否富裕</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读田宅宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">福德宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;福德宫代表你的品性、德性、修养、风度，对物质享受和精神享受的能力</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读福德宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">父母宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;父母宫代表你的家庭社会地位，你与父母及长辈的缘分和态度</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读父母宫主星带给你的影响</li>
                </ul>
                <div class="payBut"></div>
            </div>
        </div>

        <div class="result_list">
            <h3><img src="/images/purple/showPayTop5.png?imageslim" style="width: 0.7rem;vertical-align:top;" onclick="return false;">兄弟宫主星对你的命运影响
            </h3>
            <div class="listMain">
                <img src="/images/purple/showPayTop6.png?imageslim" onclick="return false;">
                <ul>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;兄弟宫代表你与家中兄弟姊妹的相处态度，关系是否和睦以及未来成就发展</li>
                    <li><span></span>&nbsp;&nbsp;&nbsp;&nbsp;本节详细解读兄弟宫主星带给你的影响</li>
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