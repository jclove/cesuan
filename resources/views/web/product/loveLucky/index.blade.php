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
    <img src="/images/loveLucky/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/loveLucky/top2.png?v=1?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/luckYear/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">立即诊断你们的恋情</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id, 'is' => 'other'])
        </div>
        <div id="storeOtherOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>550353</span>&nbsp;人分析TA是否真爱你</div>

        <img class="marginT20" src="/images/loveLucky/top3.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/loveLucky/top4.png?imageslim" onclick="return false;"/>

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
                <span class="area bg_color1">带来幸福</span>
                <span class="area bg_color2">感谢指引</span>
                <span class="area bg_color3">指点迷津</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">来不及拥抱就被推开:</span>
                    很准的样子，赞一个！
                </li>
                <li>
                    <span class="color3">剩几个夜晚:</span>
                    如果准确我会开心死的!
                </li>
                <li>
                    <span class="color3">半杯茶半杯湖底沙つ:</span>
                    对测得结果很满意,非常好
                </li>
                <li>
                    <span class="color3">想你太浓:</span>
                    给了我很大的信心，相信自己，一定行！谢谢！
                </li>
                <li>
                    <span class="color3">Spine:</span>
                    终于追到对方，这攻略杠杠滴~ 。
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