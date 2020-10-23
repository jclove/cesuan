@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">产品分类列表</h3>
    </div>
    <div class="box-header with-border">
        <a href="{{ route('product-class.create') }}" class="btn btn-success btn-flat">+ 添加产品分类</a>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>排序</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            @if($list)
                @foreach($list as $key => $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->sort }}</td>
                        <td>
                            @if($item->status == 'yes')
                                <span class="label label-success">正常</span>
                            @else
                                <span class="label label-danger">关闭</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('product-class.edit', ['id' => $item->id]) }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>
@endsection