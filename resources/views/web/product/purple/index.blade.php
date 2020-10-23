@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .luckYear{
            background: #FFFCF0;
        }
        .form{
            background: white;
            border: 1px solid #E7CDA6;
        }
        .form li .input, .form li .select{
            background: white;
        }

        .luckYear-comment ul li span{
            color: #D9972E;
        }
        .number{
            color: #333333;
        }
        .number span{
            color: rgb(248,167,140);
        }

        .submit{
            color: white;
            background: #D3A058;
        }
        .luckYear-area{
            background: #E6D6C3;
        }
    </style>
@endsection

@section('body')
    <img src="/images/purple/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/purple/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/purple/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即解开你的一生命运</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>2728921</span>&nbsp;人分析一生命运详解</div>

        <img class="marginT20" src="/images/purple/top4.png?imageslim" onclick="return false;"/>
        <img class="marginT20" src="/images/purple/top5.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/purple/top7.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/purple/top6.png?imageslim" onclick="return false;"/>

        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">550353</span> 位用户，<span class="color2">98%</span>以上用户测了都觉着准！</p>
            <p class="px">
                <span>评分：9.98</span>
                <span><img src="/images/luckYear/icon1.png" alt="" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" alt="" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" alt="" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" alt="" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon2.png" alt="" onclick="return false;"></span>
            </p>
            <p class="yx">
                <span>印象：</span>
                <span class="area bg_color1">分析全面</span>
                <span class="area bg_color2">命运解读</span>
                <span class="area bg_color3">豁然开朗</span>
            </p>
        </div>
        <img class="marginT40" src="/images/purple/top8.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">小小:</span>
                    内容非常多，分析透彻，看完之后对命运，对性格有了更深的认识，非常感谢这次测算！                </li>
                <li>
                    <span class="color3">happyse:</span>
                    这是综合分析一个人一生的命盘，看完还是很震撼的！之前不是很理解为什么要算这些，现在终于明白，这是大自然规律，每个人出生也一样，受时间支配，然后形成的性格和运势的变化
                </li>
                <li>
                    <span class="color3">开阔:</span>
                    确实不错，分析的客观很有道理，这不是迷信，是真的会帮助一个人全面了解自我，了解命运的走向，所有的一切其实都是因此而来，推荐大家算算，真的好                </li>
                <li>
                    <span class="color3">汉考克:</span>
                    太详尽了真是物超所值呢！谢谢
                </li>
                <li>
                    <span class="color3">爬坡吖:</span>
                    对我来说是个警讯，我已经开始满足于现状的感觉了，是该好好提醒自己有些事还是不能够懒啊
                </li>
                <li>
                    <span class="color3">kka:</span>
                    得到了指点。更加明确了现在的首要任务
                </li>
                <li>
                    <span class="color3">熊猫佳子:</span>
                    我是怀着一颗虔诚的心去占卜，在迷茫中寄予一份渴望在虔诚的期待和祈祷。
                </li>
                <li>
                    <span class="color3">伊伊拉:</span>
                    真的太不可思议了！只不过是第一次接触，就能凭生辰八字，把我剖析的彻彻底底，不止比与我相处十年的先生还要了解我，甚至比我自己更了解自己。这份感动难以言喻，这也许就是命运的奇妙吧！
                </li>
            </ul>
            <div class="tips hide"></div>
            <div class="luopan_bg_color"></div>
            <div id="luopan_box" style="display: none">
                <img src="/images/luckYear/luopan.png?imageslim" alt="" class="img-1" onclick="return false;"/>
                <img src="/images/luckYear/zhizheng.png?imageslim" alt="" class="img-2" onclick="return false;"/>
            </div>
        </div>
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
@endsection


@section('js')
    <script>
        $(function () {
            new lCalendar().init('#birthday');
            // 产品评论
            var $this = $(".luckYear-comment");
            var scrollTimer;
            $this.hover(function () {
                clearInterval(scrollTimer);
            }, function () {
                scrollTimer = setInterval(function () {
                    scrollNews($this);
                }, 3000);
            }).trigger("mouseleave");
        })
    </script>
@endsection