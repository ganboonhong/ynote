@extends('admin.templates.list')

@section('header_title')
    User List
@stop

@section('title')
    User List
    <a href="{{route('user_create')}}" class="btn btn-success btn-sm" title="Create">
        <span class="glyphicon glyphicon-leaf"></span>
    </a>

@stop

@section('items')

    {!! Form::open(array('action' => ('UserController@deleteMultipleItems'), 'id' => 'list_form')) !!}
    @foreach( $users as $key => $user )

        @if($key == 0)
            <span>
                <label>
                    <input type="checkbox" value="" class="big-checkbox" id="first_checkbox">
                </label>
            </span>
            <a class="list-group-item item_row active">User List</a>
            <button class="btn btn-danger btn-sm list_delete_btn" id="delete_all_btn" style="display: none">
                <span class="glyphicon glyphicon-trash"></span>
            </button>
            <br />
        @endif

            <span>
                <label>
                    <input name="checkboxes[]" type="checkbox" value="{{$user->user_id}}" class="big-checkbox">
                </label>
            </span>

        <a href="{{route('user_edit', ['id' => $user->user_id])}}" class="list-group-item item_row">
            {{$user->name}}
        </a>

        <a data-href="{{route('user_destroy', ['id' => $user->user_id])}}" class="btn btn-danger btn-sm list_delete_btn">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
        <br />
        {{--<a href="#" class="list-group-item active">Second item</a>--}}
    @endforeach
    {!! Form::close() !!}

@stop






