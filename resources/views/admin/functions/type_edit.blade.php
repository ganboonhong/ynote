@extends('admin.templates.create')

    @section('title')
        編輯功能分類
    @stop

    @section('title')
        編輯功能分類
    @stop

    @section('content')

        {!! Form::open(array('route' => array('function_type_update', $function_type->admin_function_type_id))) !!}
        <div class="form-group">
            <label for="name">名稱:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$function_type->name}}">
            <input type="hidden" name="id" value="{{$function_type->admin_function_type_id}}"/>
        </div>

        <button type="submit" class="btn btn-primary form-control" style="margin-top: 10px">修改</button>
        {!! Form::close() !!}

    @stop