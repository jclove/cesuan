@extends('admin.layout.body')

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">修改产品</h3>
    </div>
    <div class="box-body">
        <form method="post" class="form-horizontal" action="{{ route('product.update', ['id' => $info->id]) }}">
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}

            <div class="form-group">
                <label class="col-sm-2 control-label">所属分类</label>
                <div class="col-sm-5">
                    <select class="form-control" name="pid">
                        @foreach($product_class_list as $key => $item)
                            <option value="{{ $item->id }}" {{ $info->pid == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">产品名称</label>
                <div class="col-sm-5">
                    <input type="text" name="name" class="form-control" placeholder="产品名称" value="{{ $info->name }}">
                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('alias') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">简称</label>
                <div class="col-sm-5">
                    <input type="text" name="alias" class="form-control" placeholder="产品简称" value="{{ $info->alias }}">
                    @if ($errors->has('alias'))
                        <span class="help-block">
                        <strong>{{ $errors->first('alias') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('price') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">原价</label>
                <div class="col-sm-5">
                    <input type="text" name="price" class="form-control" placeholder="产品原价" value="{{ $info->price }}">
                    @if ($errors->has('price'))
                        <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('total_fee') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">推广价格</label>
                <div class="col-sm-5">
                    <input type="text" name="total_fee" class="form-control" placeholder="推广价格" value="{{ $info->total_fee }}">
                    @if ($errors->has('total_fee'))
                        <span class="help-block">
                        <strong>{{ $errors->first('total_fee') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('wechat_total_fee') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">公众号价格</label>
                <div class="col-sm-5">
                    <input type="text" name="wechat_total_fee" class="form-control" placeholder="公众号价格" value="{{ $info->wechat_total_fee }}">
                    @if ($errors->has('wechat_total_fee'))
                        <span class="help-block">
                        <strong>{{ $errors->first('wechat_total_fee') }}</strong>
                    </span>
                    @endif
                </div>
            </div>


            <div class="form-group has-feedback {{ $errors->has('desc') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">分享描述</label>
                <div class="col-sm-5">
                    <input type="text" name="desc" class="form-control" placeholder="分享描述" value="{{ $info->desc }}">
                    @if ($errors->has('desc'))
                        <span class="help-block">
                        <strong>{{ $errors->first('desc') }}</strong>
                    </span>
                    @endif
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
                    <a href="{{ route('product.index') }}"><button type="button" class="btn btn-success"> 返 回 </button></a>
                </div>
            </div>

        </form>
    </div>
@endsection