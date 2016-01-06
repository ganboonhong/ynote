@extends('frontend.templates.general')

@section('head')
    <style>
        .list-item-container{
            margin-top: 50px;
        }
        .item{
            margin-bottom: 30px;
        }
        .title{
            margin-top: 10px;
        }
        .list-pics{
            height: 150px;
        }
        .article-category{
            margin-top: 100px;
        }
        @media screen and (max-width: 768px) and (min-width: 0px){
            .list-item-container{
                margin-top: 100px;
            }
            .item img{
                height: 250px;
            }
            .article-category{
                margin-top: 150px;
            }
        }
    </style>
@stop

@section('content')

    <div class="article-category">
        類別:
        @if(isset($category))
            {{$category->name}}
        @else
            {{'所有'}}
        @endif
    </div>

    <div class="list-item-container">
        @foreach($articles as $article)
            <div class="col-md-3 col-sm-4 col-xs-12 item">
                <a href="{{route('article_detail',['id' => $article->article_id])}}">
                    <img src="../uploads/{{$article->list_pic}}" class="list-pics" />
                </a>
                <p class="title">{{$article->title}}</p>
            </div>
        @endforeach
    </div>

@stop