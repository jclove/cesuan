@extends('web.layout.body')

@section('title')
    我要赚钱
@endsection

@section('css')
    <style>
        body{
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="showPoster">
        <img id="posterCreate" src="{{ route('web.user.posterCreate') }}" alt="">
        <p style="margin-top: 0.24rem;">长按发送好友或保存图片转发朋友圈</p>
        <div class="bottom">我要推广</div>
    </div>

    <div class="zwfy-report-cartoonBox">
        <div class="zwfy-report-cartoonBox-filter"></div>
        <img src="http://quce.cdn.woquhudong.cn/Constell/xzys/img/hand1.png" alt="" class="zwfy-report-cartoon zwfy-report-cartoon-active">
        <img src="http://quce.cdn.woquhudong.cn/Constell/xzys/img/hand2.png" alt="" class="zwfy-report-cartoon">
        <img src="http://quce.cdn.woquhudong.cn/Constell/xzys/img/hand3.png" alt="" class="zwfy-report-cartoon">
        <p>长按图片<br>即可保存到相册</p>
    </div>
@endsection
@section('js')
    <script>
      posterCreate.onload =function() {
        playCartoonHand();
      };
      $(function () {
        $('.bottom').click(function () {
          playCartoonHand();
        });
      });

      var cartoonFlag = 0;
      var isHandCartoonPlay = false;
      var playCartoonHandTimer1;
      var playCartoonHandTimer2;
      function playCartoonHand() {
        if (isHandCartoonPlay) {
          return false;
        }
        isHandCartoonPlay = true;
        var oCartoonPages = document.getElementsByClassName('zwfy-report-cartoon');
        var box = document.getElementsByClassName('zwfy-report-cartoonBox')[0];
        box.style.display = 'block';
        playCartoonHandTimer1 = setInterval(function () {
          for (var i = 0; i < oCartoonPages.length; i++) {
            oCartoonPages[i].setAttribute("class", "zwfy-report-cartoon");
          }
          oCartoonPages[cartoonFlag].setAttribute("class", "zwfy-report-cartoon zwfy-report-cartoon-active");
          cartoonFlag++;
          if (cartoonFlag === 3) {
            cartoonFlag = 0;
          }
        }, 200);
        playCartoonHandTimer2 = setTimeout(function () {
          clearInterval(playCartoonHandTimer1);
          playCartoonHandTimer = null;
          stopPlayHandCartoon();
          isHandCartoonPlay = false;
        }, 3000)
      }

      function stopPlayHandCartoon() {
        isHandCartoonPlay = false;
        clearInterval(playCartoonHandTimer1);
        playCartoonHandTimer1 = null;
        clearTimeout(playCartoonHandTimer2);
        playCartoonHandTimer2 = null;
        var box = document.getElementsByClassName('zwfy-report-cartoonBox')[0];
        box.style.display = 'none';
      }
    </script>
@endsection

