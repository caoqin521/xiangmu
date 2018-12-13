@extends('layout.admins')

@section('title',$title)

@section('content')
<link href="/admins/plugins/multi-select/css/multi-select.css" rel="stylesheet">
    <link href="/admins/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/admins/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>留言管理列表页</h2>
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
                                留言列表
                            </h2>

                        </div>
                        <div class="body table-responsive">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#home_animation_2" data-toggle="tab">用户留言列表</a></li>
                                        <li role="presentation"><a href="#profile_animation_2" data-toggle="tab">回留言列表</a></li>
                                        <li role="presentation"><a href="#messages_animation_2" data-toggle="tab">回复留言</a></li>
                                        <li role="presentation"><a href="#settings_animation_2" data-toggle="tab">更多</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane animated fadeInRight active" id="home_animation_2">
                                            <table class="table table-hover table-bordered table-striped  js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>
                                                          留言ID 
                                                        </th>
                                                        <th>留言人ID</th>
                                                        <th>留言人</th>
                                                        <th>留言内容</th>
                                                        <th>留言时间</th>
                                                        <th>留言IP</th>
                                                        <th>操作</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($rs as $k => $v)
                                                    <tr>
                                                        <td>{{$v->gbook_id}}</td>
                                                        <td>{{$v->gbook_user_id}}</td>
                                                        <td>{{$v->user_name}}</td>
                                                        <td>{{$v->gbook_content}}</td>
                                                        <td>{{$v->gbook_time}}</td>
                                                        <td>{{$v->gbook_user_ip}}</td>
                                                        <td style="width:200px">
                                                            <form action="/admin/gbook/{{$v->gbook_id}}" method='post' style='display:inline'>
                                                                {{csrf_field()}}
                                                                {{method_field("DELETE")}}
                                                                <button class='btn btn-danger' style="box-shadow: none">删除</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                                                    {{$rs->appends($request->all())->links()}}
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated fadeInRight" id="profile_animation_2">
                                            <table class="table table-hover table-bordered table-striped  js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>用户</th>
                                                        <th>管理员</th>
                                                        <th>管理员ID</th>
                                                        <th>回复留言ID</th>
                                                        <th>要回复留言ID</th>
                                                        <th>管理员回复内容</th>
                                                        <th>操作</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($res as $ks => $vs)
                                                    <tr>
                                                        <td>{{$vs->user_name}}</td>
                                                        <td>{{$vs->mname}}</td>
                                                        <td>{{$vs->id}}</td>
                                                        <td>{{$vs->replay_id}}</td>
                                                        <td>{{$vs->gbook_replay_id}}</td>
                                                        <td>{{$vs->admin_replay}}</td>
                                                        <td style="width:150px">
                                                            <form action="/admin/agreplay/{{$vs->replay_id}}" method='post' style='display:inline'>
                                                                {{csrf_field()}}
                                                                {{method_field("DELETE")}}
                                                                <button class='btn btn-danger' style="box-shadow: none">删除</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                                                    {{$res->appends($request->all())->links()}}
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated fadeInRight" id="messages_animation_2">
                                       <form action="/admin/agreplay" method="post">
                                           
                                            <div class="col-md-3">
                                             
                                                    <b>给谁回复：</b>
                                               
                                                <select class="form-control show-tick" multiple data-selected-text-format="count" name="user_id[]" >
                                                    @foreach($rss as $ks => $vss)
                                                    <option value="{{$vss->user_id}}">{{$vss->user_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3"></div>
                                            <!-- <div col-md-12></div> -->
                                            <div class="col-md-12">
                                               
                                                    
                                                <p>
                                                    <b>回复内容</b>
                                                </p>
                                                <div class="body">
                                                
                                                <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <textarea rows="4" class="form-control no-resize" placeholder="在此写入您要回复用户的内容。。。" name="admin_replay"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                                     {{csrf_field()}}
                                            {{method_field("post")}}

                                            <button class='btn btn-danger'>修改</button>
                                            </div>

                                        </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated fadeInRight" id="settings_animation_2">
                                            <b>Settings Content</b>
                                            <table class="table table-hover table-bordered table-striped  js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>
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
                                                       
                                                        <th scope="row"></th>
                                                        <th scope="row"></th>
                                                        
                                                        <td></td>
                                                        
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
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>

@stop