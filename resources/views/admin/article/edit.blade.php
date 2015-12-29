@extends('admin.templates.create')

    @section('title')
        編輯功能
    @stop

    @section('title')
        編輯功能
    @stop

    @section('content')

        {!! Form::open(array('route' => array('function_update', $function->admin_function_id))) !!}
        <div class="form-group">
            <label for="name">名稱:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$function->name}}">
            <input type="hidden" name="id" value="{{$function->admin_function_id}}"/>
        </div>

        <label for="sel1">Select list (select one):</label>

        <select name="admin_function_type_id" class="form-control" id="sel1">
            @foreach( $function_types as $function_type )
                <option value="{{$function_type->admin_function_type_id}}" name="admin_function_type_id"
                        @if( $function_type->admin_function_type_id == $function->admin_function_type_id )
                            selected
                        @endif
                        >
                    {{$function_type->name}}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary form-control" style="margin-top: 10px">修改</button>
        {!! Form::close() !!}

    @stop