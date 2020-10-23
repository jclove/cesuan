@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">产品列表</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>产品名称</th>
                <th>原价格</th>
                <th>推广价格</th>
                <th>公众号价格</th>
                <th>排序</th>
                <th>状态</th>
                <th>热门</th>
                <th>操作</th>
            </tr>
            @if($list)
                @foreach($list as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->total_fee }}</td>
                        <td>{{ $item->wechat_total_fee }}</td>
                        <td>{{ $item->sort }}</td>
                        <td>
                            @if($item->status == 'yes')
                                <span class="label label-success">正常</span>
                            @else
                                <span class="label label-danger">关闭</span>
                            @endif
                        </td>
                        <td>
                            @if($item->hot && $item->hot->status == 'yes')
                                <span class="label label-success">开启</span>
                            @else
                                <span class="label label-danger">关闭</span>
                            @endif
                        </td>
                        <td>
                            @if($item->hot && $item->hot->status == 'yes')
                                <a href="{{ route('admin.hot.join', ['product_id' => $item->id, 'status' => 'no']) }}">取消热门</a>
                            @else
                                <a href="{{ route('admin.hot.join', ['product_id' => $item->id, 'status' => 'yes']) }}">加入热门</a>
                            @endif
                            <a href="{{ route('product.edit', ['id' => $item->id]) }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection