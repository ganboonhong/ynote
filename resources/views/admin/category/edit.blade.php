@extends('admin.templates.create')

@section('title')
    文章分類（修改）
@stop

@section('title')
    文章分類（修改）
@stop

@section('content')

    {!! Form::open(array('route' => array('category_update', $category->category_id))) !!}
    <div class="form-group">
        <label for="name">名稱:</label>
        <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
    </div>

    <div class="form-group">
        <label for="name_en">英文名稱:</label>
        <input type="text" name="name_en" class="form-control" id="name_en" value="{{$category->name_en}}">
    </div>


    <div style="margin-bottom: 20px;">
        公開
        <span style="margin-left:10px ;margin-right:10px ; ">
            <label for="visible_Y">是</label>
            <input name="visible" id="visible_Y" type="radio" value="Y"
                   @if($category->visible == 'Y') {{'checked'}} @endif>
        </span>
        <label for="visible_N">否</label>
        <input name="visible" id="visible_N" type="radio" value="N"
                    @if($category->visible == 'N') {{'checked'}} @endif>
    </div>

    <button type="submit" class="btn btn-primary form-control">修改</button>
    {!! Form::close() !!}


    <script>
        $('#category_form').validate({
            rules:{
                name:"required"
            }
        })

    </script>

@stop
