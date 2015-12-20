@extends('admin.templates.list')

    @section('header_title')
        文章分類
    @stop

    @section('title')
        文章分類
        <a href="{{route('category_create')}}" class="btn btn-success btn-sm list_delete_btn">
            <span class="glyphicon glyphicon-leaf" title="新增"></span>
        </a>
    @stop

    @section('items')

        {!! Form::open(array('action' => ('CategoryController@deleteMultipleItems'))) !!}

            @foreach( $categories as $key => $category )

                @if($key == 0)
                    <span>
                        <label>
                            <input type="checkbox" value="" class="big-checkbox" id="first_checkbox">
                        </label>
                    </span>

                    <a class="list-group-item item_row active">文章分類</a>
                        <button class="btn btn-danger btn-sm list_delete_btn" id="delete_all_btn" style="display: none">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    <br />
                @endif

                <span>
                    <label>
                        <input name="checkboxes[]" type="checkbox" value="{{$category->category_id}}" class="big-checkbox">
                    </label>
                </span>

                <a href="{{route('category_edit', ['id' => $category->category_id])}}"
                   class="list-group-item item_row">
                    {{$category->name}}
                </a>
                <a href="{{route('category_destroy', ['id' => $category->category_id])}}"
                   class="btn btn-danger btn-sm list_delete_btn">
                    <span class="glyphicon glyphicon-remove"></span>
                </a>
                <br />
            {{--<a href="#" class="list-group-item active">Second item</a>--}}
            @endforeach

        {!! Form::close() !!}

    @stop