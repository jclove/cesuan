@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .luckYear{
            background: #FFFCF0;
        }
        .luckYear-comment ul li span{
            color: #f9525b;
        }
        .number{
            color: #333333;
        }
        .number span{
            color: rgb(248,167,140);
        }
        .form{
            background: white;
            border: 1px solid #E7CDA6;
        }
        .form li .input, .form li .select{
            background: white;
        }
        .luckYear-area{
            border-color: #FDCAC4;
        }
        .submit{
            color: white;
            background: #D3A058;
        }
    </style>
@endsection

@section('body')
    <img src="/images/lookYourlover/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/lookYourlover/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/luckYear/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即透析另一半</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>270122</span>&nbsp;人分析透析你的恋人</div>

        <img class="marginT20" src="/images/lookYourlover/top3.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/lookYourlover/top4.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/lover/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">400353</span> 位用户，<span class="color2">98%</span>以上用户测了都觉着准！</p>
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
                <span class="area bg_color1">准确无误</span>
                <span class="area bg_color2">缘来如此</span>
                <span class="area bg_color3">给力</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">>ams°凉兮:</span>
                    哈哈，果然很准。希望今年可以跟他定下来。
                </li>
                <li>
                    <span class="color3">ce难相爱:</span>
                    帮助很大 尽管花了钱 但是心里想通很多事情。
                </li>
                <li>
                    <span class="color3">暖心向阳i:</span>
                    说得很准,希望他是我的MR RIGHT.
                </li>
                <li>
                    <span class="color3">沧海桑田里╮我找寻你:</span>
                    测算的比较客观和合理，接近真实的情况。
                </li>
                <li>
                    <span class="color3">倾听盛夏的色彩:</span>
                    谢谢本次测算，让我明白为什么云云众生，唯独倾心于他，我会努力珍惜和他的缘分。
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