@extends('admin.templates.list')

    @section('header_title')
        Articles
    @stop

    @section('title')
        Articles
        <a href="{{route('article_create')}}" class="btn btn-success btn-sm list_delete_btn">
            <span class="glyphicon glyphicon-leaf" title="Create"></span>
        </a>
    @stop

    @section('items')

        {!! Form::open(array('action' => ('ArticleController@deleteMultipleItems'), 'id' => 'list_form')) !!}
        @foreach( $articles as $key => $article )

            @if($key == 0)
                <span>
                    <label>
                        <input type="checkbox" value="" class="big-checkbox" id="first_checkbox">
                    </label>
                </span>
                <a class="list-group-item item_row active">Articles</a>
                    <button class="btn btn-danger btn-sm list_delete_btn" id="delete_all_btn" style="display: none">
                        <span class="glyphicon glyphicon-trash"></span>
                    </button>
                <br />
            @endif

            <span>
                <label>
                    <input name="checkboxes[]" type="checkbox" value="{{$article->article_id}}" class="big-checkbox">
                </label>
            </span>

            <a href="{{route('article_edit', ['id' => $article->article_id])}}" class="list-group-item item_row">
                {{$article->title}}
            </a>
            <a data-href="{{route('article_destroy', ['id' => $article->article_id])}}" class="btn btn-danger btn-sm list_delete_btn" title="Delete">
                <span class="glyphicon glyphicon-remove"></span>
            </a>
            <a href="{{route('blog_show', [$user->user_id.'/'.$article->article_id.'/1'])}}"
               class="btn btn-success btn-sm preview-btn"
               title="Preview"
               target="_blank"
                    >
                <span class="glyphicon glyphicon-eye-open"></span>
            </a>
            <br />
            {{--<a href="#" class="list-group-item active">Second item</a>--}}
        @endforeach
        {!! Form::close() !!}

    @stop






