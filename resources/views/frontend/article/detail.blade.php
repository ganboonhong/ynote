@extends('frontend.templates.general')

@section('head')
    <title>{{$article->title}}</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {!! HTML::style('css/frontend/article/detail.css') !!}
@stop

@section('content')
    <div class="row">
        <div class="col-md-7 col-sm-7 col-xs-12 content">
            <h1>{{$article->title}}</h1>
            {!! $article->content !!}
            <p class="reference">
                @if($article->reference != "")
                    Source：
                    <a class="article-link" href="{{$article->reference}}" target="_blank">{{$article->reference}}</a>
                @endif
            </p>
        </div>
    </div>
@stop