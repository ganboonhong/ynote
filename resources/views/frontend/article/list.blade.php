@extends('frontend.templates.general')

@section('head')
    {!! HTML::style('css/frontend/article/list.css') !!}
@stop

@section('content')

        <div class="col-md-10 col-sm-12 col-xs-12 list-wrapper">
            <div class="list-item-container">
                @foreach($articles as $article)
                    <div class="col-md-4 col-sm-5 col-xs-6 item">
                        <a href="{{route('article_detail',[$article->article_id, $article->category_id, $user->user_id])}}">
                            {{--<img src="../uploads/{{$article->list_pic}}" class="list-pics" />--}}
                            <img src="{{json_decode($article->cloudinary_api_response)->url}}" class="list-pics" />
                        </a>
                        <a href="{{route('article_detail',[$article->article_id, $article->category_id, $user->user_id])}}">
                            <p class="title">{{$article->title}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    <script>
        $(function(){
            
        })
    </script>
@stop