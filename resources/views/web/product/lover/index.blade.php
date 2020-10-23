@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
<style>
    .luckYear-comment ul li span {
        color: #FF5B7F;
    }
</style>
@endsection

@section('body')
    <img src="/images/lover/top1.png?imageslim" onclick="return false;"/>
    <div class="main lover">
        <img src="/images/lover/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/lover/top4.png?imageslim" onclick="return false;"/>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <img id="storeOrder" class="marginT20" style="cursor: pointer;" src="/images/lover/top5.png?imageslim">
        <div class="number text-center marginT20" style="color: #333333">已有&nbsp;<span style="color:#FB6E8B;">2219626</span>&nbsp;人算算另一半</div>
        <img class="marginT20" src="/images/lover/top6.png?imageslim" onclick="return false;">
        <img class="marginT20" src="/images/lover/top7.png?imageslim" onclick="return false;">
        <img class="" src="/images/lover/top8.png?imageslim"onclick="return false;">
        <img class="marginT20" src="/images/lover/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">2219626</span> 位用户，<span class="color2">99%</span>以上用户测了都觉着准！</p>
            <p class="px">
                <span>评分：9.48</span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon2.png" onclick="return false;"></span>
            </p>
            <p class="yx">
                <span>印象：</span>
                <span class="area bg_color1">找到爱情</span>
                <span class="area bg_color2">测算很灵</span>
                <span class="area bg_color3">很有参考</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">Error:</span>
                    加油！现在好好努力，稳定自己的生活，好迎接将来的爱人，我相信你一定会出现的！我会做好准备，等待你的出现！
                </li>
                <li>
                    <span class="color3">释怀☌ Believe:</span>
                    很有帮助，我会好好珍惜此生的缘分的～
                </li>
                <li>
                    <span class="color3">摆布☌Manipula:</span>
                    看完我才明白，我的预感也是这样，希望幸福一生。
                </li>
                <li>
                    <span class="color3">Lost、失落美:</span>
                    如愿找到另一半，特意来感谢，祝愿你们
                </li>
                <li>
                    <span class="color3">释怀☌ Believe:</span>
                    谢谢指点迷津，让我重拾信心。希望一切美好的愿望都能实现。
                </li>
                <li>
                    <span class="color3">呆呆的小吃货:</span>
                    谢谢指点迷津，让我重拾信心。希望一切美好的愿望都能实现。
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