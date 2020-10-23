@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
<style>
    .luckYear{
        background: #f3d889;
    }
    .luckYear-comment ul li span {
        color: #F2B512;
    }
</style>
@endsection

@section('body')
    <img src="/images/rich/2020/top1.png?imageslims" onclick="return false;"/>
    <div class="main luckYear">
        <div class="words">
            <img src="/images/rich/2020/top3.png?imageslim" onclick="return false;"/>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <img id="storeOrder" class="marginT20" style="cursor: pointer;" src="/images/rich/top4.png?imageslim">
        <div class="number text-center marginT20" style="color: #333333">已有&nbsp;<span style="color:#d75d1d;">2219626</span>&nbsp;人测算财富运势</div>
        <img class="marginT20" src="/images/rich/2020/top4.png?imageslim" onclick="return false;">
        <img class="marginT20" src="/images/rich/2020/top5.png?imageslim" onclick="return false;">
        <img class="marginT20" src="/images/rich/2019/top7.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">2219626</span> 位用户，<span class="color2">99%</span>以上用户测了都觉着准！</p>
            <p class="px">
                <span>评分：9.56</span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;"></span>
                <span><img src="/images/luckYear/icon2.png" onclick="return false;"></span>
            </p>
            <p class="yx">
                <span>印象：</span>
                <span class="area bg_color1">确实好</span>
                <span class="area bg_color2">总体不错</span>
                <span class="area bg_color3">受益匪浅</span>
            </p>
        </div>
        <img class="marginT40" src="/images/rich/top11.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">Reve:</span>
                    推荐大家每年算算，还是挺有参考价值的。
                </li>
                <li>
                    <span class="color3">酒醉迷心了:</span>
                    感觉本命年都满倒霉的，看到测算能正确的做出判断，感恩ing
                </li>
                <li>
                    <span class="color3">sankeyumi:</span>
                    希望今年能把握机遇，加油哦!
                </li>
                <li>
                    <span class="color3">pandyfine:</span>
                    今年多亏没买股票，要不然亏大了！看来算命还是要算专业的
                </li>
                <li>
                    <span class="color3">释怀☌ Believe:</span>
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