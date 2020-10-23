@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">新增产品分类</h3>
    </div>
    <div class="box-body">
        <form method="post" class="form-horizontal" action="{{ route('product-class.store') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">分类名称</label>
                <div class="col-sm-5">
                    <input type="text" name="name" class="form-control" placeholder="分类名称">
                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary"> 确定提交 </button>
                    <a href="{{ route('product-class.index') }}"><button type="button" class="btn btn-success"> 返 回 </button></a>
                </div>
            </div>

        </form>
    </div>
@endsection