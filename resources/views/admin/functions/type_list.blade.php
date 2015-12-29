@extends('admin.templates.list')

    @section('header_title')
        系統功能分類
    @stop

    @section('title')
        系統功能分類
        <a href="{{route('function_type_create')}}" class="btn btn-success btn-sm list_delete_btn">
            <span class="glyphicon glyphicon-leaf" title="新增"></span>
        </a>
    @stop

    @section('items')

        {!! Form::open(array('action' => ('AdminFunctionTypeController@deleteMultipleItems'))) !!}

            @foreach( $function_types as $key => $function_type )

                @if($key == 0)
                    <span>
                        <label>
                            <input type="checkbox" value="" class="big-checkbox" id="first_checkbox">
                        </label>
                    </span>

                    <a class="list-group-item item_row active">系統功能分類</a>
                        <button class="btn btn-danger btn-sm list_delete_btn" id="delete_all_btn" style="display: none">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    <br />
                @endif

                <span>
                    <label>
                        <input name="checkboxes[]" type="checkbox" value="{{$function_type->admin_function_type_id}}" class="big-checkbox">
                    </label>
                </span>

                <a href="{{route('function_type_edit', ['id' => $function_type->admin_function_type_id])}}"
                   class="list-group-item item_row">
                    {{$function_type->name}}
                </a>
                <a href="{{route('function_type_destroy', ['id' => $function_type->admin_function_type_id])}}"
                   class="btn btn-danger btn-sm list_delete_btn">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
                <br />
            {{--<a href="#" class="list-group-item active">Second item</a>--}}
            @endforeach

        {!! Form::close() !!}

    @stop