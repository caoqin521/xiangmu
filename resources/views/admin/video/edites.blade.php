@extends('layout.admins')

@section('title',$title)

@section('content')
    <link href="/admins/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="/admins/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <link href="/admins/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>留言管理列表页</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <form action="/admin/video/{{$res[0]->vod_id}}" method='post' style='display:inline'>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        @if (count($errors) > 0)
                        <div class="mws-form-message error">
                            显示错误信息
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li style='font-size:14px'>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                修改详情
                                <small>谨慎修改！！！！！！！！！！！！！！！！！</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#home" data-toggle="tab">修改视频详情</a></li>
                                <li role="presentation"><a href="#profile" data-toggle="tab">更换视频封面</a></li>
                                <li role="presentation"><a href="#分类" data-toggle="tab">更换分类</a></li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                    <b>视频详情</b>
                                    <div class="body">
                            <div class="demo-masked-input">
                                <div class="row clearfix">

                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="">视频名称</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" name="vod_name" value="{{$res[0]->vod_name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="">国家</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" name="vod_class" value="{{$res[0]->vod_class}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="">演员</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" name="vod_actor" value="{{$res[0]->vod_actor}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="">导演</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" name="vod_director" value="{{$res[0]->vod_director}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="">语言</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" name="vod_lang" value="{{$res[0]->vod_lang}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="">剧集</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" placeholder="" name="vod_serial" value="{{$res[0]->vod_serial}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{csrf_field()}}
                            {{method_field("PUT")}}
                            <button class='btn btn-danger'>修改</button>

                        </form>
                        <a href="/admin/type" class='btn btn-warning'>取消</a>
                        </div>
                        

                                </div>
                            
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <b>更换封面</b>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">点击上传图片,成功后图片显示</div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    图片上传！！可查看！！
                                                    <small>Taken from <a href="http://www.yuemu.com/" target="_blank">www.yuemu.com</a></small>
                                                </h2>
                                               
                                            </div>
                                            <div class="body">
                                                <form action="/admin/videos/{{$res[0]->vod_id}}" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    
                                                    <div class="dz-message">
                                                        <div class="drag-icon-cph">
                                                            
                                                        </div>
                                                        <h3>点此上传</h3>
                                                        
                                                    </div>
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="分类">
                                    
                                    <form action="/admin/video/{{$res[0]->vod_id}}" method="post">
                                    <p>
                                        <b>从下列选择要更换至某分类</b>
                                    </p>
                                    
                                    <select class="form-control show-tick" name="type_id">
                                        @foreach($rs as $k => $vs)
                                        <optgroup label="{{$vs->type_name}}">
                                            @foreach($rss as $ks => $vss)
                                            @if($vss->type_pid==$vs->type_id)
                                            <option  value="{{$vss->type_id}}" @if($vss->type_id==$res[0]->type_id)
                                                selected
                                                @endif
                                                >{{$vss->type_name}}</option>
                                            @endif
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                    
                                   
                                <br>
                                <br>
                                <br>
                               {{csrf_field()}}
                            {{method_field("PUT")}}
                            <button class='btn btn-danger'>修改</button>
                               <a href="/admin/type" class='btn btn-warning'>取消</a>
                                 </form>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!--#END# Switch Button -->
        </div>
    </section>
   

    <!-- Dropzone Plugin Js -->
    <script src="/admins/plugins/dropzone/dropzone.js"></script>
    <script src="/admins/plugins/multi-select/js/jquery.multi-select.js"></script>

   
@stop
@section('js')
<script>
    // myDropzone.on("maxfilesexceeded", function(file) { this.removeFile(file); });
    // alert($);
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>

@stop

