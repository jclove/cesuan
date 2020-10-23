@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">资源列表</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>产品名称</th>
                <th>是否支付</th>
                <th>平台</th>
                <th>关键词</th>
                <th>IP地址</th>
                <th>省份</th>
                <th>城市</th>
                <th>创建时间</th>
            </tr>
            @if($list)
                @foreach($list as $key => $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->produt->name ?? '' }}/td>
                    <td>{{ $item->order->pay_status ?? '' }}</td>
                    <td>{{ $item->platform }}</td>
                    <td>{{ $item->keyword }}</td>
                    <td>{{ $item->ip }}</td>
                    <td>{{ $item->region }}</td>
                    <td>{{ $item->city }}</td>
                </tr>
                @endforeach
            @endif
        </table>
        <div class="box-footer pull-right">
            {!! $list->links() !!}
        </div>
    </div>
@endsection