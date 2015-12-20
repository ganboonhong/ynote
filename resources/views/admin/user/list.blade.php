@extends('admin.templates.list')

@section('header_title')
    使用者名單
@stop

@section('title')
    使用者名單
    <a href="{{route('user_create')}}" class="btn btn-success btn-sm list_delete_btn" title="新增使用者">
        <span class="glyphicon glyphicon-leaf"></span>
    </a>

@stop

@section('items')

    {!! Form::open(array('action' => ('UserController@deleteMultipleItems'))) !!}
    @foreach( $users as $key => $user )

        @if($key == 0)
            <span>
                <label>
                    <input type="checkbox" value="" class="big-checkbox" id="first_checkbox">
                </label>
            </span>
            <a class="list-group-item item_row active">使用者名單</a>
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

        <a href="{{route('user_destroy', ['id' => $user->user_id])}}" class="btn btn-danger btn-sm list_delete_btn">
            <span class="glyphicon glyphicon-remove"></span>
        </a>
        <br />
        {{--<a href="#" class="list-group-item active">Second item</a>--}}
    @endforeach
    {!! Form::close() !!}

@stop






