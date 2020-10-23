@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">热门列表</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>产品名称</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            @if($list)
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product->name ?? '' }}</td>
                        <td>{{ $item->sort }}</td>
                        <td>
                            @if($item->status == 'yes')
                                <span class="label label-success">开启</span>
                            @else
                                <span class="label label-danger">关闭</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.hot.edit', ['id' => $item->id]) }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection