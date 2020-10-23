@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">佣金记录</h3>
    </div>
    <div class="box-header with-border" style="background: #ecf0f5">
        <div class="row">

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">总记录数</p>
                    <p style="font-size: 30px;">{{ $total }}</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">总佣金</p>
                    <p style="font-size: 30px;">{{ $total_tee }}</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">今日记录数</p>
                    <p style="font-size: 30px;">{{ $day_total }}</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box" style="text-align: center;padding: 12px 0 0 0">
                    <p style="font-size: 16px">今日佣金</p>
                    <p style="font-size: 30px;">{{ $day_total_tee }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>#</th>
                <th>返佣用户</th>
                <th>支付用户</th>
                <th>支付金额</th>
                <th>返佣比例</th>
                <th>系统结算</th>
                <th>时间</th>
            </tr>
            @if($list)
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>
                            <img src="{{ $item->myWechatUser->headimgurl }}" width="30" style="border-radius: 50%">
                            {{ $item->myWechatUser->nickname }}
                        </td>
                        <td>
                            <img src="{{ $item->wechatUser->headimgurl }}" width="30" style="border-radius: 50%">
                            {{ $item->wechatUser->nickname }}
                        </td>
                        <td>{{ $item->buy_total_fee }}</td>
                        <td>{{ $item->proportion * 100 }}%</td>
                        <td>{{ $item->finally }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="box-footer pull-right">
            {!! $list->appends($condition)->links() !!}
        </div>
    </div>
@endsection