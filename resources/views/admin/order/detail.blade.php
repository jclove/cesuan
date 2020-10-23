@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">订单详情</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>订单号</th>
                <td>{{ $info->out_trade_no }}</td>
            </tr>
            <tr>
                <th>支付订单号</th>
                <td>{{ $info->transaction_id }}</td>
            </tr>
            <tr>
                <th>产品名称</th>
                <td>{{ $product_info->name }}</td>
            </tr>
            <tr>
                <th>原价</th>
                <td>{{ $info->price }}</td>
            </tr>
            <tr>
                <th>支付金额</th>
                <td>{{ $info->total_fee }}</td>
            </tr>
            <tr>
                <th>支付用户</th>
                <td>{{ $info->pay_user }}</td>
            </tr>
            <tr>
                <th>支付状态</th>
                <td>
                    @if($info->pay_status == 'yes')
                        <span class="label label-success">已支付</span>
                    @else
                        <span class="label label-danger">未支付</span>
                    @endif
                </td>
            </tr>
            <tr>
                <th>支付时间</th>
                <td>{{ $info->pay_status == 'yes' ? date('Y-m-d H:i:s', strtotime($info->pay_time)) : '' }}</td>
            </tr>
            <tr>
                <th>支付类型</th>
                <td>{{ $pay_type[$info->pay_type] }}</td>
            </tr>
            <tr>
                <th>订单类型</th>
                <td>{{ $info->type }}</td>
            </tr>
            <tr>
                <th>下单时间</th>
                <td>{{ $info->created_at }}</td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <a href="{{ route('admin.order.index') }}"><button type="button" class="btn btn-success"> 返 回 </button></a>
                </td>
            </tr>
        </table>
    </div>
@endsection