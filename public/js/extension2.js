$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var is_submit = false;

function showLoading() {
    $('#luopan_box').fadeToggle(500);
    $('#luopan_box').show();
    $('.luopan_bg_color').show();
    $('body').addClass('body');
    return true;
}

function hideLoading() {
    $('#luopan_box').hide();
    $('.luopan_bg_color').hide();
    $('body').removeClass('body');
    return true;
}

function scrollNews(obj) {
    var $self = obj.find("ul");
    var lineHeight = $self.find("li:first").height();
    $self.animate({
        "marginTop": -lineHeight + -10 + "px"
    }, 2700, function () {
        $self.css({
            marginTop: 0
        }).find("li:first").appendTo($self);
    })
}

$('.mask').click(function () {
    $('.mask').hide();
    $('.payButAlert').hide();
    $('body').removeClass('body');
    return true;
});

$('#storeOtherOrder').click(function () {
  var username = $('#username').val();
  var birthday = $('#b_input').val();

  var other_username = $('#other_username').val();
  var other_birthday = $('#other_input').val();
  if (username === '' || !/^[\u4E00-\u9FA5]/.test(username)) {
    weui.alert('请输入您的名字(必须是中文)');
  } else if (birthday === '') {
    weui.alert('请选择出生日期');
  } else if (other_username === '' || !/^[\u4E00-\u9FA5]/.test(other_username)) {
    weui.alert('请输入对方名字(必须是中文)');
  }else if (other_birthday === '') {
    weui.alert('请选择对方出生日期');
  } else{
    showLoading();
    var sendData = $("form").serialize();
    if (is_submit === true) {
      is_submit = false;
      return false;
    }
    is_submit = true;
    $.ajax({
      type: "POST",
      url: storeOrderUrl,
      async: true,
      data: sendData,
      success: function (data) {
        is_submit = false;
        hideLoading();
        if (data.error_code === 0) {
          window.location.href = lumpUrl;
        }
      },
      error: function () {
        is_submit = false;
        hideLoading();
        weui.alert('网络出错了');
      }
    });
  }

});

$('#storeOrder').click(function () {
  var username = $('#username').val();
  var birthday = $('#b_input').val();
  if (username === '' || !/^[\u4E00-\u9FA5]/.test(username)) {
    weui.alert('请输入名字(必须是中文)');
  } else if (birthday === '') {
    weui.alert('请选择出生日期');
  } else {
    showLoading();
    var sendData = $("form").serialize();
    if (is_submit === true) {
      is_submit = false;
      return false;
    }
    is_submit = true;
    $.ajax({
      type: "POST",
      url: storeOrderUrl,
      async: true,
      data: sendData,
      success: function (data) {
        is_submit = false;
        hideLoading();
        if (data.error_code === 0) {
          window.location.href = lumpUrl;
        }
      },
      error: function () {
        is_submit = false;
        hideLoading();
        weui.alert('网络出错了');
      }
    });
  }
});

$('.payBut').click(function () {
  if (wechatPayInfo !== ''){
    // 调用支付
    wechatPay(wechatPayInfo, '支付成功', showUrl);
    return false;
  }
  $('.mask').show();
  $('#payMainShow').html($('#showPayMain').html());
  $('.payButAlert').show();
  $('body').addClass('body');
  return true;
});

function wechatPay(jsApiParameters, title, url) {
  if (typeof WeixinJSBridge === "undefined") {
    if (document.addEventListener) {
      document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    } else if (document.attachEvent) {
      document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
      document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
  } else {
    onBridgeReady(jsApiParameters, title, url);
  }
}

function onBridgeReady(jsApiParameters, title, url) {
  jsApiParameters = JSON.parse(jsApiParameters);
  WeixinJSBridge.invoke(
    'getBrandWCPayRequest', jsApiParameters,
    function (res) {
      if (res.err_msg === "get_brand_wcpay_request:ok") {
        weui.alert(title, function () {
          window.location.href = url;
          return false;
        });
      }
    }
  );
}