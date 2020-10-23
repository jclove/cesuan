@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .luckYear{
            background: #f6c02a;
        }
        .luckYear-comment ul li span{
            color: #D9972E;
        }
        .number{
            color: #333333;
        }
        .number span{
            color: #d82618
        }

        .submit{
            color: white;
            background: #d82618;
        }
    </style>
@endsection

@section('body')
    <img src="/images/wealthCode/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/wealthCode/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/wealthCode/top3.png?imageslim" onclick="return false;"/>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT3">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>550353</span>&nbsp;人分析详批一生财富</div>

        <img class="marginT20" src="/images/wealthCode/top4.png?imageslim" onclick="return false;"/>
        <img class="" src="/images/wealthCode/top5.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/wealthCode/top6.png?imageslim" onclick="return false;"/>
        <img class="" src="/images/wealthCode/top7.png?imageslim" onclick="return false;"/>
        <img class="" src="/images/wealthCode/top8.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/wealthCode/top9.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/wealthCode/top10.png?imageslim" onclick="return false;">
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
                <span class="area bg_color1">说的在理</span>
                <span class="area bg_color2">还不错</span>
                <span class="area bg_color3">挖掘潜力</span>
            </p>
        </div>
        <img class="marginT40" src="/images/wealthCode/top11.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">狮子座的包子:</span>
                    对我的分析挺准，我会加油
                </li>
                <li>
                    <span class="color3">海与天之色:</span>
                    算了很多财富的算命，这个是最准的，非常好
                </li>
                <li>
                    <span class="color3">xietaipeng:</span>
                    必须点赞，挺有感触的，我不善理财，很有指导意义。
                </li>
                <li>
                    <span class="color3">1299393534:</span>
                    先易而后难，我会注意消息谨慎，万事谨慎，徐徐图之
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