@extends('layout.admins')

@section('title',$title)

@section('content')
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

                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="basic_checkbox_1" checked />
                                            <label for="basic_checkbox_1">全选\全不选</label>
                                        </th>
                                        <th>留言ID</th>
                                        <th>留言人ID</th>
                                        <th>留言人</th>
                                        <th>留言内容</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($res as $k => $v)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="{{$v->advert_id}}" checked />
                                            <label for="{{$v->advert_id}}"></label>
                                        </td>

                                        <th scope="row">{{$v->advert_id}}</th>
                                        <th scope="row">{{$v->advert_user_id}}</th>
                                        
                                        <td>{{$v->user_name}}</td>
                                        <td>{{$v->advert_content}}</td>
                                        <td>
                                            <form action="/admin/advert/{{$v->advert_id}}" method='post' style='display:inline'>
                                                {{csrf_field()}}
                                                {{method_field("DELETE")}}
                                                <button class='btn btn-danger'>删除</button>
                                                
                                            </form>
                                            <a href="/admin/advert/{{$v->advert_id}}/edit" class='btn btn-warning'>回复</a>

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

@stop
@section('js')
<script>
    // alert($);
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>

@stop