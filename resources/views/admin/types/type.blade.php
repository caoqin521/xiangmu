@extends('layout.admins')


@section('title',$title)

@section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>分类管理</h2>
                    {{--此处为主体内容--}}
                   <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-1 col-xs-12">
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
                                    WITH MATERIAL DESIGN COLORS
                                    <small>You can use material design colors which examples are <code>.bg-pink</code></small>
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
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
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" id="md_checkbox_3" class="chk-col-red"/>
                                                <label for="md_checkbox_3">全选\全不选</label>
                                            </th>
                                            <th>ID</th>
                                            <th>类型名称</th>
                                            <th>别名</th>
                                            <th>排序</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($res as $k => $v)
                                        <tr 
                                            @if($k%5==0) class="bg-brown" 
                                            @elseif($k%5==1) class="bg-cyan" 
                                            @elseif($k%5==2) class="bg-teal"
                                            @elseif($k%5==3) class="bg-blue-grey"
                                            @else class="bg-light-green"
                                            @endif
                                            >
                                            <th>
                                                <input type="checkbox" id="{{$v->type_id}}" class="chk-col-white" />
                                                <label for="{{$v->type_id}}"></label>
                                            </th>
                                            <td class="">
                                                {{$v->type_id}}
                                            </td>
                                            <td class="uname">
                                                {{$v->type_name}}
                                            </td>
                                            <td class=" ">
                                                {{$v->type_en}}
                                            </td>
                                            <td class=" ">
                                                {{$v->type_sort}}
                                            </td>
                                           
                                            <td class=" ">
                                                <a href="/admin/type/{{$v->type_id}}/edit" class='btn btn-info'>修改</a>

                                                <form action="/admin/type/{{$v->type_id}}" method='post' style='display:inline'>
                                                    {{csrf_field()}}
                                                    {{method_field("DELETE")}}
                                                    <button class='btn btn-danger'>删除</button>

                                                </form>
                                                @if(substr_count($v->type_path,',')==1)
                                                <a href="/admin/type/{{$v->type_id}}/edit" class='btn btn-warning'>添加</a>
                                                @endif
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


                {{--主体内容结束--}}
            </div>
        </div>
    </section>
@stop
@section('js')
<script>
    // alert($);
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>
@stop