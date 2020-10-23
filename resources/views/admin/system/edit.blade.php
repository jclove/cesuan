@extends('admin.layout.body')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin/layui.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/jquery.Jcrop.min.css') }}">
@endsection

@section('body')
    <div class="box-header with-border">
        <h3 class="box-title">系统配置</h3>
    </div>
    <div class="box-body">
        <form action="{{ route('admin.system.update') }}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#base" data-toggle="tab">基本设置</a></li>
                    <li><a href="#template" data-toggle="tab">模版消息</a></li>
                    <li><a href="#distribution" data-toggle="tab">分销设置</a></li>
                    <li><a href="#share" data-toggle="tab">分享配置</a></li>
                    <li><a href="#wechat" data-toggle="tab">公众号配置</a></li>
                    <li><a href="#kefu" data-toggle="tab">客服配置</a></li>
                    <li><a href="#haibao" data-toggle="tab">推广海报</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="base">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">站点标题</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[base][title]" class="form-control" placeholder="站点标题" value="{{ $info && !empty($info->config['base']['title']) ? $info->config['base']['title'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">全局分销</label>
                            <div class="col-sm-8">
                                <label class="radio-inline">
                                    <input type="radio" name="config[base][fenxiao]"  value="yes" {{ empty($info->config['base']['fenxiao']) || $info->config['base']['fenxiao'] == 'yes' ? 'checked' : '' }}> 开启
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="config[base][fenxiao]"  value="no" {{ !empty($info->config['base']['fenxiao']) && $info->config['base']['fenxiao'] == 'no' ? 'checked' : '' }}> 关闭
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="template">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">模版消息ID</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[base][template]" class="form-control" placeholder="模版消息ID" value="{{ $info && !empty($info->config['base']['template']) ? $info->config['base']['template'] : '' }}">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">模版消息备注</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[base][template_remark]" class="form-control" placeholder="模版消息ID" value="{{ $info && !empty($info->config['base']['template_remark']) ? $info->config['base']['template_remark'] : '' }}">
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="distribution">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">一级分销比例</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[distribution][first]" class="form-control" placeholder="一级分销比例" value="{{ $info && !empty($info->config['distribution']['first']) ? $info->config['distribution']['first'] : '0' }}">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">二级分销比例</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[distribution][second]" class="form-control" placeholder="二级分销比例" value="{{ $info && !empty($info->config['distribution']['second']) ? $info->config['distribution']['second'] : '0' }}">
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">三级分销比例</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[distribution][third]" class="form-control" placeholder="三级分销比例" value="{{ $info && !empty($info->config['distribution']['third']) ? $info->config['distribution']['third'] : '0' }}">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="share">
                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">分享标题</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[share][title]" class="form-control" placeholder="分享标题" value="{{ $info && !empty($info->config['share']['title']) ? $info->config['share']['title'] : '' }}">
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">分享描述</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[share][desc]" class="form-control" placeholder="分享描述" value="{{ $info && !empty($info->config['share']['desc']) ? $info->config['share']['desc'] : '' }}">
                            </div>
                        </div>

                        <div class="form-group has-feedback">
                            <label class="col-sm-2 control-label">分享图片</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="config[share][image]" placeholder="分享图片" value="{{ $info && !empty($info->config['share']['image']) ? $info->config['share']['image'] : '' }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="layui-btn upload_image">上传图片</button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="wechat">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">公众号二维码</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[wechat][qrcode]" class="form-control" placeholder="二维码" value="{{ $info && !empty($info->config['wechat']['qrcode']) ? $info->config['wechat']['qrcode'] : '' }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="layui-btn upload_image">上传图片</button>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="kefu">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">客服二维码</label>
                            <div class="col-sm-8">
                                <input type="text" name="config[kefu][qrcode]" class="form-control" placeholder="二维码" value="{{ $info && !empty($info->config['kefu']['qrcode']) ? $info->config['kefu']['qrcode'] : '' }}">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="layui-btn upload_image">上传图片</button>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane" id="haibao">
                        <div class="col-md-6" id="poster_image">
                            <img id="images" src="{{ $info && !empty($info->config['haibao']['image']) ? $info->config['haibao']['image'] : '' }}">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('poster_image') ? ' has-error' : '' }}">
                                <div class="col-sm-12">
                                    <button type="button" class="layui-btn" id="upload_image">上传图片</button>
                                    <input id="image_value" type="hidden" name="config[haibao][image]" value="{{ $info && !empty($info->config['haibao']['image']) ? $info->config['haibao']['image'] : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="coordinate" class="form-control" type="text" name="config[haibao][size]" value="{{ $info && !empty($info->config['haibao']['size']) ? $info->config['haibao']['size'] : '0|0|0|0' }}">
                                    <div class="help-block">X轴|Y轴|宽|高 比如:200|300|500|500</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary btn-flat">确定添加</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin/layui.js') }}"></script>
    <script src="{{ asset('js/admin/jquery.Jcrop.min.js') }}"></script>
    <script>
      function showCoords(c) {
        var coordinate = Math.round(c.x) + "|" + Math.round(c.y) + "|" + Math.round(c.w) + "|" + Math.round(c.h);
        $("#coordinate").val(coordinate);
      };

      layui.use('upload', function(){
        let upload = layui.upload;
        upload.render({
          elem: '.upload_image',
          field: 'upload_img',
          acceptMime: 'image/*',
          accept:'images',
          url: "{{ route('admin.upload.image') }}",
          done:function(res){
            if (res.error_code === 0){
              var item = this.item;
              item.parents('.form-group').find('input').attr('value', res.body_data);
              item.parents('.form-group').find('img').attr('src', res.body_data);
            }else {
              layer.msg(res.msg, {icon: 5,time: 2000});
            }
          }
        });
      });
      layui.use('upload', function(){
        let upload = layui.upload;
        upload.render({
          elem: '#upload_image',
          field: 'upload_img',
          acceptMime: 'image/*',
          accept:'images',
          url: "{{ route('admin.upload.image') }}",
          done:function(res){
            if (res.error_code === 0){
              $('#image_value').attr('value', res.body_data);
              $('#poster_image').html('<img id="images" src="'+res.body_data+'" alt="" width="80%">');
            }else {
              layer.msg(res.msg, {icon: 5,time: 2000});
            }
          }
        });
      });
    </script>
    <script>
      var jcrop_api;
      $('#images').Jcrop({
        aspectRatio:1/1,
        boxWidth:300,
        onChange: showCoords,
        onSelect: showCoords,
      }, function () {
        jcrop_api = this;
      });
    </script>
@endsection