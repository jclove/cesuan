@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .flower{
            background: #ffeff4;
        }
    </style>
@endsection

@section('body')
    <img src="/images/flower/2020/top1.png?imageslim" onclick="return false;"/>
    <div class="main flower">
        <img src="/images/flower/2020/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/flower/2019/top3.png?imageslim" onclick="return false;" />
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <img id="storeOrder" class="marginT20" style="cursor: pointer;" src="/images/flower/2019/top4.png?imageslim">
        <div class="number text-center marginT20" style="color: #333333;">已有&nbsp;<span style="color: #f76a77;">2281490</span>&nbsp;人分析2019桃花运势</div>
        <img class="marginT20" src="/images/flower/2020/top5.png?imageslim" onclick="return false;">
        <img class="marginT20" src="/images/flower/2020/top6.png?imageslim" onclick="return false;">
        <img class="marginT20" src="/images/flower/2020/top7.png?imageslim" onclick="return false;">
        <img style="width: 40%;" class="marginT20" src="/images/flower/2019/top8.png?imageslim" onclick="return false;">

        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">2281490</span> 位用户，<span class="color2">99%</span>以上用户测了都觉着准！</p>
            <p class="px">
                <span>评分：9.19</span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon2.png" onclick="return false;"></span>
            </p>
            <p class="yx">
                <span>印象：</span>
                <span class="area bg_color1">强大</span>
                <span class="area bg_color2">获得桃花</span>
                <span class="area bg_color3">有感觉</span>
            </p>
        </div>
        <img class="marginT30" src="/images/flower/top12.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3" style="color:#EE7F85">Lost:</span>
                    年初算的，说我今年有桃花运，果不然我现在有女朋友了，祝大家幸福哦！
                </li>
                <li>
                    <span class="color3" style="color:#EE7F85">派大星星的海洋酷：</span>
                    让我找到真爱，感谢指引。
                </li>
                <li>
                    <span class="color3" style="color:#EE7F85">Deephug:</span>
                    自己算了，也帮闺蜜算的，她也说很准。。。
                </li>
                <li>
                    <span class="color3" style="color:#EE7F85">遗忘过去つ珍惜现在:</span>
                    好开心，大吉，正桃花盛开，信息倍增！！！啦啦啦～～～～～
                </li>
                <li>
                    <span class="color3" style="color:#EE7F85">释怀☌ Believe:</span>
                    太准了，和我此时此刻的情况是一样的。
                </li>
                <li>
                    <span class="color3" style="color:#EE7F85">提笔、写柔情:</span>
                    很多东西都说中心里的问题了..谢谢！！
                </li>
            </ul>
            <div class="tips hide"></div>
            <div class="luopan_bg_color"></div>
            <div id="luopan_box" style="display: none">
                <img src="/images/luckYear/luopan.png?imageslim" onclick="return false;" class="img-1" />
                <img src="/images/luckYear/zhizheng.png?imageslim" onclick="return false;" class="img-2">
            </div>
        </div>
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
@endsection

@section('js')
    <script>
        $(function(){
            new lCalendar().init('#birthday');
            // 产品评论
            var $this = $(".luckYear-comment");
            var scrollTimer;
            $this.hover(function() {
                clearInterval(scrollTimer);
            },function(){
                scrollTimer = setInterval(function() {
                    scrollNews($this);
                },3000);
            }).trigger("mouseleave");
        })
    </script>
@endsection