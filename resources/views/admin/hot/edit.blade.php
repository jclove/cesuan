@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">编辑热门</h3>
    </div>
    <div class="box-body">
        <form method="post" class="form-horizontal" action="{{ route('admin.hot.update', ['id' => $info->id]) }}">
            <input type="hidden" name="_method" value="PUT" />
            <input type="hidden" name="product_id" value="{{ $info->product_id }}" />
            {{ csrf_field() }}

            <div class="form-group has-feedback">
                <label class="col-sm-2 control-label">产品名称</label>
                <div class="col-sm-5">
                    <input type="text" disabled class="form-control" placeholder="产品名称" value="{{ $info->product->name }}">
                </div>
            </div>

            <div class="form-group has-feedback">
                <label class="col-sm-2 control-label">排序</label>
                <div class="col-sm-5">
                    <input type="number" name="sort" class="form-control" placeholder="排序" value="{{ $info->sort }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">状态</label>
                <div class="col-sm-5">
                    <select class="form-control" name="status">
                        <option value="yes" {{ $info->status == 'yes' ? 'selected' : '' }}>开启</option>
                        <option value="no" {{ $info->status == 'no' ? 'selected' : '' }}>关闭</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary"> 确定提交 </button>
                    <a href="{{ route('admin.hot.index') }}"><button type="button" class="btn btn-success"> 返 回 </button></a>
                </div>
            </div>

        </form>
    </div>
@endsection