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
            background: #f6c02a;
        }
    </style>
@endsection

@section('body')
    <img src="/images/schoolwork/top1.png?imageslim" onclick="return false;" />
    <div class="main luckYear">
        <img src="/images/schoolwork/top2.png?imageslim" onclick="return false;"/>
        <div class="words">
            <img src="/images/schoolwork/top3.png?imageslim" onclick="return false;"/>
            <div class="words-title text-center">马上申请学业锦囊</div>
        </div>
        <div class="form marginT20">
            @include('web.layout.form', ['product_id' => $product_info->id])
        </div>
        <div id="storeOrder" class="submit text-center marginT30">立即测算</div>
        <div class="number text-center marginT20">已有&nbsp;<span>550353</span>&nbsp;人分析学业前程详批</div>

        <img class="marginT20" src="/images/schoolwork/top4.png?imageslim" onclick="return false;"/>
        <img class="marginT20" src="/images/schoolwork/top5.png?imageslim" onclick="return false;"/>
        <img class="marginT40" src="/images/schoolwork/top6.png?imageslim" onclick="return false;"/>

        <img class="marginT40" src="/images/lover/top9.png?imageslim" onclick="return false;">
        <div class="score marginT20 luckYear-area luckYear-score">
            <p>本测算一共帮助了 <span class="color1">550353</span> 位用户，<span class="color2">98%</span>以上用户测了都觉着准！</p>
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
                <span class="area bg_color1">说的在理</span>
                <span class="area bg_color2">还不错</span>
                <span class="area bg_color3">挖掘潜力</span>
            </p>
        </div>
        <img class="marginT40" src="/images/lover/top10.png?imageslim" onclick="return false;">
        <div class="comment marginT20 luckYear-area luckYear-comment">
            <ul>
                <li>
                    <span class="color3">Honoria:</span>
                    到底是读研还是毕业，苦恼了半天，测算完现在清晰多了！
                </li>
                <li>
                    <span class="color3">含笑半步疯:</span>
                    很准很全面，之前的担心全无，义无反顾的选择自己路
                </li>
                <li>
                    <span class="color3">另狐冲马桶:</span>
                    必须点赞，根据我的性格给我很中肯的分析
                </li>
                <li>
                    <span class="color3">huipyoi:</span>
                    好吧，我知道该怎么做了，准
                </li>
                <li>
                    <span class="color3">~布丁町布丁:</span>
                    希望一切顺利~！
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