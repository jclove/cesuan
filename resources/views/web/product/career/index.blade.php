@extends('web.layout.body')

@section('title', $product_info->name)

@section('css')
    <style>
        .luckYear{
            background: #cdddee;
        }
        .luckYear-comment ul li span{
            color: #88B2C5;
        }
        .number{
            color: #333333;
        }
        .number span{
            color: rgb(248,167,140);
        }

        .luckYear-area{
            border-color: #74d0ff;
        }
        .submit{
            color: white;
            background: #1880b4;
        }
    </style>
@endsection

@section('body')
    <img src="/images/career/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/career/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/career/top3.png?imageslim" onclick="return false;"/>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>550353</span>&nbsp;人分析是否有老板命</div>

        <img class="marginT20" src="/images/career/top4.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/career/top5.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/career/top6.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/career/top7.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/career/top8.png?imageslim" onclick="return false;">
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
                <span class="area bg_color1">了解自我</span>
                <span class="area bg_color2">分析到位</span>
                <span class="area bg_color3">值得思考</span>
            </p>
        </div>
        <img class="marginT40" src="/images/career/top9.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">我想你了小傻狗:</span>
                    感谢给我的事业发展提醒
                </li>
                <li>
                    <span class="color3">爱良栾:</span>
                    去年遇到很多事业上的挫折和烦恼，看完释然很多，感谢指点迷津，相信我会有更好的发展。
                </li>
                <li>
                    <span class="color3">Bestyhappy:</span>
                    事业分析的很全面，真不是外面那些娱乐测算能比
                </li>
                <li>
                    <span class="color3">小西小西:</span>
                    说法上虽然有些偏差，但大方向很正确，符合我自己的判断结果。                </li>
                <li>
                    <span class="color3">我的青春高八度:</span>
                    不错```真的给了很重要的方向```原注定有些东西是注定的。
                </li>
                <li>
                    <span class="color3">zq2501314:</span>
                    很准很准对我的帮助很大
                </li>
                <li>
                    <span class="color3">褐紫幽兰:</span>
                    正在左右为难之际，看到建议，觉得很是中肯。应当自省而攻克困难。
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