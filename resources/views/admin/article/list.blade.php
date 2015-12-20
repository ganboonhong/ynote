@extends('admin.templates.list')

    @section('header_title')
        系統功能
    @stop

    @section('title')
        系統功能
        <a href="{{route('function_create')}}" class="btn btn-success btn-sm list_delete_btn">
            <span class="glyphicon glyphicon-leaf"></span>
        </a>
    @stop

    @section('items')

        {!! Form::open(array('action' => ('AdminFunctionController@deleteMultipleItems'))) !!}
        @foreach( $functions as $key => $function )

            @if($key == 0)
                <span>
                <label>
                    <input type="checkbox" value="" class="big-checkbox" id="first_checkbox">
                </label>
            </span>
                <a class="list-group-item item_row active">系統功能</a>
                <button class="btn btn-danger btn-sm list_delete_btn" id="delete_all_btn" style="display: none">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
                <br />
            @endif

            <span>
                <label>
                    <input name="checkboxes[]" type="checkbox" value="{{$function->admin_function_id}}" class="big-checkbox">
                </label>
            </span>

            <a href="{{route('function_edit', ['id' => $function->admin_function_id])}}" class="list-group-item item_row">
                {{$function->name}}
            </a>
            <a href="{{route('function_destroy', ['id' => $function->admin_function_id])}}" class="btn btn-danger btn-sm list_delete_btn">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
            <br />
            {{--<a href="#" class="list-group-item active">Second item</a>--}}
        @endforeach
        {!! Form::close() !!}

    @stop






