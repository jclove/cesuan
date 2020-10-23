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
    <img src="/images/children/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/children/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/purple/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即解开宝贝一生好命</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>828575</span>&nbsp;人分析生日运势</div>

        <img class="marginT20" src="/images/children/top3.png?imageslim" onclick="return false;"/>
        <img class="marginT20" src="/images/children/top4.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/children/top5.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/purple/top6.png?imageslim" onclick="return false;"/>

        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">233450</span> 位用户，<span class="color2">98%</span>以上用户测了都觉着准！</p>
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
                <span class="area bg_color1">解析到位</span>
                <span class="area bg_color2">符合小孩</span>
                <span class="area bg_color3">父母参考</span>
            </p>
        </div>
        <img class="marginT40" src="/images/purple/top8.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">happyse:</span>
                    我家孩子准备上学了，朋友推荐来算一下，结果还真是准！
                </li>
                <li>
                    <span class="color3">xushuangyi:</span>
                    要顺着小孩的天赋教育，符合他的性格，首先得了解宝宝，可是宝宝还很小，这个分析太全面了！帮了我的忙，有小孩的父母可以算算，非常有参考意义！
                <li>
                    <span class="color3">ose8063:</span>
                    孩子的未来讲了很多，还有父母和小孩的互动，挺不错的，我会认真参考，希望我家宝宝快乐成长！
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