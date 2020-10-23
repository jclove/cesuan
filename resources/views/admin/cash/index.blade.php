@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">提现记录</h3>
    </div>
    <div class="box-header with-border" style="background: #ecf0f5">
        <div class="row">

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">总提现记录数</p>
                    <p style="font-size: 30px;">{{ $total }}</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">今日提现金额</p>
                    <p style="font-size: 30px;">{{ $day_total_sum }}</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">提现总金额</p>
                    <p style="font-size: 30px;">{{ $total_sum }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>UID</th>
                <th>用户头像</th>
                <th>用户昵称</th>
                <th>提现金额</th>
                <th>提现状态</th>
                <th>提现时间</th>
                <th>提现单号</th>
            </tr>
            @if($list)
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->wechatUser->id }}</td>
                        <td>
                            <img src="{{ $item->wechatUser->headimgurl }}" width="30" style="border-radius: 50%">
                        </td>
                        <td>{{ $item->wechatUser->nickname }}</td>
                        <td>{{ $item->total_fee }}</td>
                        <td>
                            @if($item->pay_status == 'yes')
                                <span class="label label-success">成功</span>
                            @else
                                <span class="label label-danger">失败</span>
                            @endif
                        <td>{{ !empty($item->pay_time) ? date('Y-m-d H:i:s', strtotime($item->pay_time)) : '' }}</td>
                        <td>{{ $item->transaction_id }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="box-footer pull-right">
            {!! $list->appends($condition)->links() !!}
        </div>
    </div>
@endsection