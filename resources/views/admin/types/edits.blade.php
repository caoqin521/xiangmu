@extends('layout.admins')

@section('title',$title)

@section('content')
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
                       <form action="/admin/type/{{$res->type_id}}" method="post">
                        <div class="body">
                           <h2 class="card-inside-title">所属分类</h2>
                           <div class="demo-checkbox">
                               @foreach($rs as $k => $v)
                              
                                @if($v->type_id == $res -> type_pid )
                                    <input type="checkbox" id="{{$v->type_id}}" name="type_name"  value="{{$v->type_id}}" class="filled-in chk-col-red"  checked/>
                                    <label for="{{$v->type_id}}">{{$v->type_name}}</label>
                                @endif
                                @endforeach
                            </div>
                            <h2 class="card-inside-title">分类名称</h2>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="{{$res->type_name}}" name="type_name" value="{{$res->type_name}}"/>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="mws-button-row">
                                {{csrf_field()}}

                                {{method_field('PUT')}}

                                <input type="submit" class="btn btn-primary" value="修改">
                                <a href="/admin/type" class='btn btn-warning'>取消</a>
                            </div>
                            
                        </form>
                           
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