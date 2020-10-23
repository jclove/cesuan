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
            background: #f6c02a;
        }
    </style>
@endsection

@section('body')
    <img src="/images/startup/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/startup/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/startup/top6.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即鉴定老板运</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>550353</span>&nbsp;人分析是否有老板命</div>

        <img class="marginT20" src="/images/startup/top3.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/startup/top4.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/startup/top5.png?imageslim" onclick="return false;"/>

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
                <span class="area bg_color1">了解自我</span>
                <span class="area bg_color2">分析到位</span>
                <span class="area bg_color3">值得思考</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">婉茹1124:</span>
                    想创业，一直犹豫不决，现在终于知道答案了
                </li>
                <li>
                    <span class="color3">梨先生:</span>
                    很准，我要按照我的命格来决定我的前程，谢谢建议。
                </li>
                <li>
                    <span class="color3">伊曼郡主:</span>
                    分析很全面，把我骨子里的东西都讲出来了，专业测算就是牛！
                </li>
                <li>
                    <span class="color3">yanbabe8:</span>
                    分析有道理，值得思考
                </li>
                <li>
                    <span class="color3">微笑没掩饰:</span>
                    说的很详细，我会记住提醒的。
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