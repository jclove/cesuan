@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .luckYear{
            background: #b42222;
        }
        .luckYear-comment ul li span{
            color: #f9525b;
        }
    </style>
@endsection

@section('body')
    <img src="/images/lifeFate/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/lifeFate/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/luckYear/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即揭晓何时结婚</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>404511</span>&nbsp;人分析命中结婚运</div>
        <img class="marginT20" src="/images/lifeFate/top3.png?imageslim" style=" width: 50%;" onclick="return false;" />

        <div style="background: white;border-radius: 0.1rem;">
            <img class="marginT20" src="/images/lifeFate/top4.png?imageslim" onclick="return false;"/>
        </div>
        <div style="background: white;border-radius: 0.1rem;">
            <img class="marginT40" src="/images/lifeFate/top5.png?imageslim" onclick="return false;"/>
        </div>
        <div style="background: white;border-radius: 0.1rem;">
            <img class="marginT40" src="/images/lifeFate/top6.png?imageslim" onclick="return false;"/>
        </div>
        <img class="marginT40" src="/images/luckYear/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">404511</span> 位用户，<span class="color2">99%</span>以上用户测了都觉着准！</p>
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
        <img class="marginT40" src="/images/luckYear/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">Farewell:</span>
                    首先很准，家里催了我好几次，但我心中一直坚定一份信念，果然没错，我的缘分还没到！
                </li>
                <li>
                    <span class="color3">Passerby:</span>
                    之前谈了几个都没成功，现在终于明白了。
                </li>
                <li>
                    <span class="color3">萌比时代:</span>
                    很奇妙，算出了我的结婚年龄，而我竟然就是在今年要结婚，怎么会这么准？
                </li>
                <li>
                    <span class="color3">你说出对不起真可笑:</span>
                    好像有点像目前的状况，很符合自己的实际，确实是自己的性格还来阻力，通过大师的测算，让我认清问题的所在，也希望自己学会控制自己的情绪，努力得到良缘
                </li>
                <li>
                    <span class="color3">我的青春高八度:</span>
                    不错```真的给了很重要的方向```原注定有些东西是注定的。
                </li>
                <li>
                    <span class="color3">Lost、失落美:</span>
                    加油！现在好好努力，稳定自己的生活，好迎接将来的爱人，我相信你一定会出现的！我会做好准备，等待你的出现！
                </li>
                <li>
                    <span class="color3">Distan:</span>
                    很感谢！ 迷茫之中相信这个，有些点还是很到位的。
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