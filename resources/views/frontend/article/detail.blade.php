@extends('frontend.templates.general')

@section('head')

    <title>{{$article->title}}</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
        .content{
            background-color: #ffffff;
            margin: 50px;
        }
        .category-container{
            margin: 60px 50px 50px 10px ;
        }
        .category-ul{
            list-style-type: none;
        }
        .reference{
            margin-top: 30px;
        }
        .article-link{

            /* These are technically the same, but use both */
            overflow-wrap: break-word;
            word-wrap: break-word;

            -ms-word-break: break-all;
            /* This is the dangerous one in WebKit, as it breaks things wherever */
            word-break: break-all;
            /* Instead use this non-standard one: */
            word-break: break-word;

            /* Adds a hyphen where the word breaks, if supported (No Blink) */
            -ms-hyphens: auto;
            -moz-hyphens: auto;
            -webkit-hyphens: auto;
            hyphens: auto;

        }
        @media screen and (max-width: 768px) and (min-width: 0px) {
            .content{
                margin: 200px 50px 50px 10px ;
            }
            .category-container{
                margin: 10px 50px 50px 10px ;
            }
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-10 col-xs-12 content">
            <h1>{{$article->title}}</h1>
            {!! $article->content !!}
            <p class="reference">
                @if($article->reference != "")
                    Source：
                    <a class="article-link" href="{{$article->reference}}" target="_blank">{{$article->reference}}</a>
                @endif
            </p>
        </div>

        <div class="col-md-2  col-sm-2  col-xs-12 category-container">
            <ul class="category-ul">
                <li style="font-size: 20px;">Categories</li>
                @foreach($categories as $category)
                    <a href="{{route('item_list_with_category', ['id'=> $category->category_id])}}" class="category-link" style="text-decoration: none">
                        <li>{{$category->name}}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@stop