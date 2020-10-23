@extends('web.layout.body')

@section('title')
    佣金提现记录
@endsection

@section('css')
    <style>
        body {
            background: #ebebeb;
        }
    </style>
@endsection

@section('body')
    <div class="cashMain budgetMain rankingMain">
        <div class="top">
            <div class="title text-align-center">可提现金额(元)</div>
            <div class="balance text-align-center">{{ $user_info->commission }}</div>
            <a href="{{ route('web.user.cashLog') }}">
                <div class="buy">提现记录</div>
            </a>
        </div>
        <div class="cash">
            <div class="li">
                <h4>到账方式：微信零钱到账</h4>
            </div>
            <div class="li">
                <div class="title">已提现总金额：</div>
                <p style="color: #fe5200;font-weight: 700;">{{ $total }}元</p>
            </div>
            <div class="li">
                <div class="title">申请提现金额：</div>
                <input type="number" step="0.01" {{ $user_info->commission == 0 ? 'disabled' : '' }} id="total_fee" placeholder="可提现{{ $user_info->commission }}元">
            </div>
        </div>
        <div class="cash" style="margin: 0;padding: 0 0.24rem; padding-bottom: 0.24rem;">
            <h4 class="zhuyi">注意事项：</h4>
            <p>1、提现金额大于0.3元起</p>
            <p>2、到账方式：微信零钱自动入账</p>
            <p>3、每人每天只可提现一次</p>
        </div>
        <div class="goCash">提交</div>
    </div>
@endsection

@section('js')
    <script>
      $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
      var game_commission = '{{ $user_info->commission }}';
      $(function () {
        $('.goCash').click(function () {
          var total_fee = parseFloat($('#total_fee').val());
          if (!total_fee || total_fee === 0 || total_fee === ''){
            weui.alert('提现金额0.3元起');
            return false;
          }
          if (total_fee < 0.3){
            weui.alert('提现金额0.3元起');
            return false;
          }
          if (game_commission < total_fee) {
            weui.alert('提现金额不足');
            return false;
          }
          var loading = weui.loading('提现中...');
          $.post('{{ route('web.user.userCash') }}', {
            total_fee: total_fee
          }, function (res) {
            loading.hide(function () {
              if (res.error_code === 0) {
                weui.alert('提现成功', function () {
                  window.location.href = '{{ route('web.user') }}'
                });
              }else if (res.error_code === 10000){
                weui.alert('提现失败，请联系客服');
              } else {
                weui.alert(res.error_msg);
              }
            });
          });
        });
      });
    </script>
@endsection
