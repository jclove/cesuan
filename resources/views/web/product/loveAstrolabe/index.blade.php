@extends('web.layout.body')

@section('title', $product_info->name)

@section('body')
    <img src="/images/loveAstrolabe/top1.png?imageslim" onclick="return false;" />
    <div class="main loveAstrolabe">
        <img src="/images/loveAstrolabe/top2.png?imageslim" onclick="return false;" />
        <div class="words">
            <img src="/images/loveAstrolabe/top3.png?imageslim" onclick="return false;" />
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <img id="storeOrder" class="marginT20" style="cursor: pointer;" src="/images/loveAstrolabe/top4.png?imageslim">
        <div class="number text-center marginT20">已有&nbsp;<span>10748415</span>&nbsp;人分析八字姻缘详批</div>
        <img class="marginT20" src="/images/loveAstrolabe/top5.png?imageslim" onclick="return false;">
        <img class="" src="/images/loveAstrolabe/top6.png?imageslim" onclick="return false;">
        <img class="" src="/images/loveAstrolabe/top7.png?imageslim" onclick="return false;">
        <img class="" src="/images/loveAstrolabe/top8.png?imageslim" onclick="return false;">
        <img class="marginT40" src="/images/loveAstrolabe/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">10748415</span> 位用户，<span class="color2">99%</span>以上用户测了都觉着准！</p>
            <p class="px">
                <span>评分：9.98</span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;" alt=""></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;" alt=""></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;" alt=""></span>
                <span><img src="/images/luckYear/icon1.png" onclick="return false;" alt=""></span>
                <span><img src="/images/luckYear/icon2.png" onclick="return false;" alt=""></span>
            </p>
            <p class="yx">
                <span>印象：</span>
                <span class="area bg_color1">强大</span>
                <span class="area bg_color2">获得桃花</span>
                <span class="area bg_color3">有感觉</span>
            </p>
        </div>
        <img class="marginT40" src="/images/loveAstrolabe/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3" style="color:#F9525B;">仙衣小宝:</span>
                    每年算一次，我收获都挺大的！
                </li>
                <li>
                    <span class="color3" style="color:#F9525B;">兔子右:</span>
                    内容很详细，整年运势，还有爱情，事业，健康，财富，人际都有说，不错哦。
                </li>
                <li>
                    <span class="color3" style="color:#F9525B;">小羊薇薇:</span>
                    看完我才明白，很多东西原来都是冥冥之中啊
                </li>
                <li>
                    <span class="color3" style="color:#F9525B;">花想容1981:</span>
                    好像有点像目前的状况，我会按照嘱咐小心行事的
                </li>
                <li>
                    <span class="color3" style="color:#F9525B;">释怀☌ Believe:</span>
                    谢谢指点迷津，让我重拾信心。希望一切美好的愿望都能实现。
                </li>
                <li>
                    <span class="color3" style="color:#F9525B;">Lost、失落美:</span>
                    加油！现在好好努力，稳定自己的生活，好迎接将来的爱人，我相信你一定会出现的！我会做好准备，等待你的出现！
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