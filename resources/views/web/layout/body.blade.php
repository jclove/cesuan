<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="renderer" content="webkit">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="full-screen" content="yes">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" href="{{ asset('css/web/main.css')}}?v=19">
    <link rel="stylesheet" href="{{ asset('css/web/calendar2.css')}}">
    <link rel="stylesheet" href="{{ asset('css/web/fonts/iconfont.css')}}?v=2">
    <link rel="stylesheet" href="https://res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css">
    @yield('css')
    <title>@yield('title')</title>
</head>
<body>
@yield('header')
@yield('body')
@yield('footer')
@if($is_weixin == 'yes')
    <div style="height: 1.12rem;"></div>
    <footer>
        <a href="{{ route('web.index') }}" class="{{ !isset($active) || $active == 'index'  ? 'active' : '' }}">
            <span class="icon">
                <i class="iconfont icon-home"></i>
            </span>
            <span>测算专区</span>
        </a>
        <a href="{{ route('web.user') }}" class="{{ isset($active) && $active == 'user' ? 'active' : '' }}">
            <span class="icon">
                <i class="iconfont icon-yonghu1"></i>
            </span>
            <span>个人中心</span>
        </a>
    </footer>
@endif
<script type="text/javascript" src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/calendar2.min.js')}}"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.4.0.js"></script>
<script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.3/weui.min.js"></script>
@if($is_weixin == 'yes')
    <script type="text/javascript" charset="utf-8">
      var shareData = {
        title: '{{ isset($system_config['share']['title']) ? str_replace('#name#',session('wechatUser.nickname'),$system_config['share']['title']) : '' }}',
        desc: '{{ $system_config['share']['desc'] ?? '' }}',
        link: '{!! $share_url !!}',
        imgUrl: '{{ $http_host }}{{ $system_config['share']['image'] ?? '' }}',
      };
      wx.config(<?php echo app('wechat.official_account')->jssdk->buildConfig(array('onMenuShareTimeline', 'onMenuShareAppMessage', 'openAddress', 'editAddress'), false) ?>);
      wx.ready(function () {
        wx.onMenuShareAppMessage(shareData);
        wx.onMenuShareTimeline(shareData);
      });
    </script>
@endif
<script>
  var storeOrderUrl = "{{ route('web.order.store') }}";
  var lumpUrl = "{{ route('web.product.showPay') }}";
  var showUrl = "{{ route('web.product.show') }}";
  var wechatPayInfo = '{!! $wechatPayInfo ?? "" !!}';
</script>
<script type="text/javascript" src="{{ asset('js/extension2.js') }}?v=4"></script>
@yield('js')
</body>
</html>