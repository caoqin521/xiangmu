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
                                    分类列表
                                </h2>
                                
                            </div>
                            <div class="body table-responsive">
                                <table class="table table-condensed table-hover table-bordered table-striped  js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            
                                            <th>ID</th>
                                            <th>类型名称</th>
                                            <th>别名</th>
                                            <th>排序</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($res as $k => $v)

                                        <tr @if($v->type_pid==0)  
                                            style="font-size:16px;font-weight:bold"
                                            @endif
                                            >
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
    $('.mws-form-message').delay(2000).fadeOut(2000);
</script>
@stop