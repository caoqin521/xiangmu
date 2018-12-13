@extends('layout.admins')

@section('title',$title)

@section('content')
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>添加分类</h2>
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
                        <form action="/admin/type" method="post">
                        <div class="body">
                           <h2 class="card-inside-title">选择所属系统分类</h2>
                           @foreach($res as $k => $v)
                           <input name="type_pid" value="{{$v->type_id}}" type="radio" id="{{$v->type_id}}" class="radio-col-red"/>
                            <label for="{{$v->type_id}}">{{$v->type_name}}</label>
                            @endforeach
                            <input name="type_pid" value="0" type="radio" id="ding_111" class="radio-col-red"/>
                            <label for="ding_111">若自定义顶级分类请选择</label>
                            <div class="ziding_ding" id="ziding_ding">
                            <h2 class="card-inside-title">自定义顶级分类</h2>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="" name="type_name_d" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h2 class="card-inside-title">自定义顶级分类拼音名字</h2>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="" name="type_en_d" value=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ziding_fen" id="ziding_fen">
                            <h2 class="card-inside-title">添加分类名称</h2>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="" name="type_name" value=""/>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <h2 class="card-inside-title">确定新分类拼音名字</h2>

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="" name="type_en" value=""/>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            </div>
                            <div class="mws-button-row">
                                {{csrf_field()}}

                                {{method_field('POST')}}

                                <input type="submit" class="btn btn-primary" value="确定">
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
    <style>
        .ziding_ding{display:none;}
    </style>
@stop
@section('js')
<script>
    // alert($);
    $('.mws-form-message').delay(2000).fadeOut(2000);
    $('#ding_111').click(function(){
        $('#ziding_ding').removeAttr('class');
        $('#ziding_fen').attr('class','ziding_ding');
    })
    $(':radio').not('#ding_111').click(function(){
        $('#ziding_ding').attr('class','ziding_ding');
        $('#ziding_fen').removeAttr('class');
    })

</script>
@stop