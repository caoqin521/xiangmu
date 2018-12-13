@extends('layout.admins')

@section('title',$title)

@section('content')
<link href="/admins/plugins/dropzone/dropzone.css" rel="stylesheet">
    <link href="/admins/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <link href="/admins/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>分类修改页面</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
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
                        

                         <div class="body">
                            <h2 class="card-inside-title">填写添加的视频详情</h2>
                            <div class="row clearfix">
                                <form action="/admin/video" method="post">

                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">视频名称</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_name"  value=""  placeholder="videoName">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">播放器类型</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_play_from"  value=""  placeholder="605m3u8">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">播放地址</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_play_url"  value=""  placeholder="HD720P中字$https://www.605ziyuan.com/20180322/wEUbhiKI/index.m3u8">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">国家</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_class"  value=""  placeholder="videoClass">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">演员</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_actor"  value=""  placeholder="videoActor">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">导演</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_director"  value=""  placeholder="videoDirector">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">地区</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_area"  value=""  placeholder="videoArea">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">语言</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_lang"  value=""  placeholder="videoLang">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">简介</i>
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control date"  name="vod_content"  value=""  placeholder="videoContent">
                                        </div>
                                    </div>
                                </div>
                                    
                                    <p>
                                        <b>选择视频分类</b>
                                    </p>
                                    <select class="form-control show-tick" data-show-subtext="true" name="type_id">
                                        
                                        @foreach($rs as $k =>$vs)
                                            @foreach($rss as $ks => $vss)
                                            <!-- @if($vss->type_pid==$vs->type_id) -->
                                            <option data-subtext="{{$vs->type_name}}" value="{{$vss->type_id}}">
                                                {{$vss->type_name}}
                                            </option>
                                            <!-- @endif     -->
                                            @endforeach
                                            
                                        @endforeach
                                    </select>
                                <!-- </div> -->
                                   
                                <br>
                                <br>
                                <br>
                               {{csrf_field()}}
                            {{method_field("post")}}
                            <button class='btn btn-danger'>修改</button>
                               <a href="/admin/video/create" class='btn btn-warning'>取消</a>
                                 </form> 
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

    
    <script src="/admins/js/pages/forms/basic-form-elements.js"></script>
     <script src="/admins/plugins/dropzone/dropzone.js"></script>
    <script src="/admins/plugins/multi-select/js/jquery.multi-select.js"></script>

@stop
@section('js')
<script>
    // alert($);
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>
@stop