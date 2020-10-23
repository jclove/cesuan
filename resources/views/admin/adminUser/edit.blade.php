@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">修改密码</h3>
    </div>
    <div class="box-header with-border">
        <div class="alert alert-danger" id="from_error_msg" style="display: none;"></div>
    </div>
    <div class="box-body">
        <form method="post" class="form-horizontal" action="{{ route('admin.adminUser.update') }}">
            {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">登录用户名</label>
                <div class="col-sm-5">
                    <input type="text" name="username" class="form-control" placeholder="登录用户名" value="{{ $info->username }}">
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">登录密码</label>
                <div class="col-sm-5">
                    <input type="text" name="password" class="form-control" placeholder="登录密码">
                    @if ($errors->has('password'))
                        <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-5">
                    <button type="submit" class="btn btn-primary"> 确定修改 </button>
                </div>
            </div>
        </form>
    </div>
@endsection