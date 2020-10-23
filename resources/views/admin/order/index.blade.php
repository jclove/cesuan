@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">订单列表</h3>
    </div>
    <div class="box-header with-border">
        <form action="">
            <div class="col-xs-5" style="padding-left: 0px">
                <div class="input-group">
                    <span class="input-group-addon bg-light-blue">订单编号</span>
                    <input type="text" name="out_trade_no" value="{{ $_GET['out_trade_no'] ?? '' }}" class="form-control" placeholder="订单编号">
                </div>
            </div>
            <div class="col-xs-3" style="padding-left: 0px">
                <div class="input-group">
                    <span class="input-group-addon bg-light-blue">支付状态</span>
                    <select name="pay_status" class="form-control">
                        <option value=""> 请选择 </option>
                        <option value="yes" {{ isset($_GET['pay_status']) && $_GET['pay_status'] == 'yes' ? 'selected' : '' }}>已支付</option>
                        <option value="no" {{ isset($_GET['pay_status']) && $_GET['pay_status'] == 'no' ? 'selected' : '' }}>未支付</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-1">
                <button type="submit" class="btn btn-primary btn-flat">搜索</button>
            </div>
        </form>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>订单编号</th>
                <th>产品名称</th>
                <th>支付金额</th>
                <th>支付状态</th>
                <th>支付类型</th>
                <th>下单时间</th>
                <th>操作</th>
            </tr>
            @if($list)
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->out_trade_no }}</td>
                        <td>{{ $item->product->name ?? '' }}</td>
                        <td>{{ $item->total_fee }}</td>
                        <td>
                            @if($item->pay_status == 'yes')
                                <span class="label label-success">已支付</span>
                            @else
                                <span class="label label-danger">未支付</span>
                            @endif
                        </td>
                        <td>
                            {{ $pay_type[$item->pay_type] }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <a href="{{ route('admin.order.detail',['order_id' => $item->id]) }}">详情</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="box-footer pull-right">
            {!! $list->appends($condition)->links() !!}
        </div>
    </div>
@endsection