@extends('admin.templates.create')

    @section('title')
        Editing Function Type
    @stop

    @section('title')
        Editing Function Type
    @stop

    @section('content')

        {!! Form::open(array('route' => array('function_type_update', $function_type->admin_function_type_id))) !!}
        <div class="form-group">
            <label for="name">Function Type Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$function_type->name}}">
            <input type="hidden" name="id" value="{{$function_type->admin_function_type_id}}"/>
        </div>

        <div class="form-group">
            <label for="name_en">Function Type Name(English):</label>
            <input type="text" name="name_en" class="form-control" id="name_en" value="{{$function_type->name_en}}">
        </div>

        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" class="form-control" id="code" value="{{$function_type->code}}">
        </div>

        <button type="submit" class="btn btn-primary form-control" style="margin-top: 10px">Save</button>
        {!! Form::close() !!}

    @stop