@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">用户列表</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>头像</td>
                <td>昵称</td>
                <td>性别</td>
                <td>省份</td>
                <td>城市</td>
                <td>操作</td>
            </tr>
            @if($list)
                @foreach($list as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ $item->headimgurl }}" height="30" alt="" style="border-radius: 50%;"></td>
                        <td>{{ $item->nickname }}</td>
                        <td>
                            @if($item->sex == '1')
                                男
                            @elseif($item->sex == '2')
                                女
                            @else
                                未知
                            @endif
                        </td>
                        <td>{{ $item->province }}</td>
                        <td>{{ $item->city }}</td>
                        <td>
                            <a href="{{ route('admin.order.index', ['wechat_user_id' => $item->id]) }}">他的订单</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="box-footer pull-right">
            {!! $list->links() !!}
        </div>
    </div>
@endsection