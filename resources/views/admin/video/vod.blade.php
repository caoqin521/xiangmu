@extends('layout.admins')

@section('title',$title)

@section('content')
<link href="/admins/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <link href="/admins/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/admins/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>视频管理列表页</h2>
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
                        
                        <div class="header">
                            <h2>
                                视频列表
                            </h2>
                            <div class="dataTables_info" id="DataTables_Table_1_info">
                            </div>
                        </div>
                        <div class="body table-responsive">
                        <form action="/admin/videoss/sousuo" method="post">
                            {{csrf_field()}}
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control date" placeholder="视频名称" name="vod_name">
                                    </div>
                                    <span class="input-group-addon">
                                        <button class="btn bg-light-blue waves-effect" style="box-shadow: none">
                                            <i class="material-icons">search</i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>                            
                        <table class="table table-hover table-bordered table-striped  js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="basic_checkbox_1"/>
                                            <label for="basic_checkbox_1"></label>
                                        </th>
                                        <th>
                                            <div class="btn-group" style="z-index:0;box-shadow: none;">
                                                <button type="text" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true">类型<span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach($rs as $k =>$vs)
                                                    <li><a href="/admin/videoss/fenlei/{{$vs->type_id}}" value="{{$vs->type_id}}" style="list-style: none"><h4>{{$vs->type_name}}</h4></a></li>
                                                    @foreach($rss as $ks => $vss)
                                                    @if($vss->type_pid==$vs->type_id)
                                                    <li><a href="/admin/videoss/fenlei/{{$vss->type_id}}" value="{{$vss->type_id}}">{{$vss->type_name}}</a></li>
                                                    @endif
                                                    @endforeach
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </th>
                                        <th>视频名称</th>
                                        <th>国家</th>
                                        <th>状态</th>
                                        <th>演员</th>
                                        <th>导演</th>
                                        <th>语言</th>
                                        <th>剧集</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($res as $k => $v)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="{{$v->vod_id}}"  />
                                            <label for="{{$v->vod_id}}"></label>
                                        </td>
                                        <th scope="row">{{$v->type_name}}</th>
                                        <th scope="row">{{$v->vod_name}}</th>
                                        <!-- <td><img src="{{$v->vod_pic}}" width="100px" height="100px" alt=""></td> -->
                                        <td>{{$v->vod_class}}</td>
                                        <td>    
                                            @if($v->vod_status==1)
                                             <a href="javascript:void(0)" class='btn bg-green waves-effect waves-light waves-cyan btn-circle' value="{{$v->vod_id}}">开启</a>
                                            @else
                                             <a href="javascript:void(0)" class='btn bg-grey waves-effect waves-light waves-cyan btn-circle' value="{{$v->vod_id}}">关闭</a>
                                            @endif
                                        </td>
                                        <td>{{$v->vod_actor}}</td>
                                        <td>{{$v->vod_director}}</td>
                                        <td>{{$v->vod_lang}}</td>
                                        <td>{{$v->vod_serial}}</td>
                                        <td style="width:150px">
                                            <form action="/admin/video/{{$v->vod_id}}" method='post' style='display:inline'>
                                                {{csrf_field()}}
                                                {{method_field("DELETE")}}
                                                <button class='btn btn-danger' style="box-shadow: none">删除</button>
                                                
                                            </form>
                                            <a href="/admin/video/{{$v->vod_id}}/edit" class='btn btn-warning' style="box-shadow: none">编辑</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                                    {{$res->appends($request->all())->links()}}
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
    <script src="/admins/plugins/multi-select/js/jquery.multi-select.js"></script>

@stop
@section('js')
<script>
    // alert($);
    $('.waves-cyan').click(function(){
        var val = [];
        val[0] = $(this).text();
        val[1] = $(this).attr('value');
        var but = this;
        $.get('/admin/video/switch',{val},function(data){
            console.log(data[0]);
            // if(data[0]==1){
                
            //     $('.bg-grey').hide();
            //     $('.bg-green'). show();
            // } else {
            //     $('.bg-green').hide();
            //     $('.bg-grey').show()
            // }
        })
    })
    $('.btn-group ul a').click(function(){
        var vals = $(this).attr('value');
        var ht = $(this).text();
        console.log(ht)
        // $.get('/admin/videoss/fenlei',false,{vals},function(data){
        //     console.log(data.res.data);
        // //     for (var i = 0; i < data.res.data.length; i++) {
                

        // //     }
        // })
    })
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>

@stop