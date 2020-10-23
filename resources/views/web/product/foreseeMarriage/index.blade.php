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
    <img src="/images/foreseeMarriage/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/foreseeMarriage/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/luckYear/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">马上详批婚后感情</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id, 'is' => 'other'])
        </div>
        <div id="storeOtherOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>138121</span>&nbsp;人分析婚后感情详批</div>

        <img class="marginT20" src="/images/foreseeMarriage/top3.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/foreseeMarriage/top4.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/lover/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">138121</span> 位用户，<span class="color2">98%</span>以上用户测了都觉着准！</p>
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
                <span class="area bg_color1">解决疑惑</span>
                <span class="area bg_color2">感谢指引</span>
                <span class="area bg_color3">很有帮助</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">伤心童话:</span>
                    这东西说的还真准，让我看到了他婚后的模样，有帮助！
                </li>
                <li>
                    <span class="color3">我只喜欢★简单爱:</span>
                    我对爱情很认真，要不要结婚一定要谨慎，算了这个解决了我很多疑惑，非常感谢。
                </li>
                <li>
                    <span class="color3">仲夏之夜:</span>
                    其实，某种程度上我知道会是这种结果，但是，真的很难自己走出来，明明知道可能性几乎为零，却还是想要去试一下。虽然身后有那么多的追随者，但是我心有所属，不论他会不会选择我，我都要试试。不管怎么样，尽心尽力就不会给自己留下任何遗憾！
                </li>
                <li>
                    <span class="color3">Romantic:</span>
                    谢谢，帮助要是早些有这个帮助就好了，10年恋情现以结束了恋爱关系，最终能修成爱情的正果，解开这段情缘。
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