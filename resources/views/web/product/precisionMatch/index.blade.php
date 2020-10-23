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
    <img src="/images/precisionMatch/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/precisionMatch/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/luckYear/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即为你献上锦囊妙计</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id, 'is' => 'other'])
        </div>
        <div id="storeOtherOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>273411</span>&nbsp;人分析如何追到TA</div>

        <img class="marginT20" src="/images/precisionMatch/top3.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/precisionMatch/top4.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/lover/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">273411</span> 位用户，<span class="color2">98%</span>以上用户测了都觉着准！</p>
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
                <span class="area bg_color1">测算很灵</span>
                <span class="area bg_color2">感谢指引</span>
                <span class="area bg_color3">喜欢</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">曾相识:</span>
                    确实挺准的，分析的栩栩如生啊！
                </li>
                <li>
                    <span class="color3">Archer:</span>
                    这次测算印证了我对他的判断，坚决分手。
                </li>
                <li>
                    <span class="color3">Yoke:</span>
                    我俩还挺配的，希望我们幸福哦
                </li>
                <li>
                    <span class="color3">领悟:</span>
                    如果真的是这样就好，但愿如此
                </li>
                <li>
                    <span class="color3">浪漫☆樱花:</span>
                    测了两个人的感情，我知道会很不容易，很困难，但是我相信他 我相信我们，谢谢这次的正能量！ 心诚则灵！请保佑我！
                </li>
            </ul>
            <div class="tips hide"></div>
            <div class="luopan_bg_color"></div>
            <div id="luopan_box" style="display: none">
                <img src="/images/luckYear/luopan.png" alt="" class="img-1" onclick="return false;"/>
                <img src="/images/luckYear/zhizheng.png" alt="" class="img-2" onclick="return false;"/>
            </div>
        </div>
        @include('web.layout.hot', ['hot_list' => $hot_list])
    </div>
@endsection


@section('js')
    <script>
        $(function () {
            var birthday = new lCalendar().init('#birthday');
            var other_birthday = new lCalendar().init('#other_birthday');
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