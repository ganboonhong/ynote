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
            margin: 70px 50px 50px 10px ;
        }
        .category-ul{
            list-style-type: none;
        }
        .category-ul a{
            text-decoration: none;
        }
        .reference{
            margin-top: 30px;
        }
        @media screen and (max-width: 768px) and (min-width: 0px) {
            .content{
                margin: 200px 50px 50px 10px ;
            }
            .navbar{
                position: absolute;
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
                資料來源：
                @if($article->reference != "")
                    <a>{{$article->reference}}</a>
                @else
                    本人自行撰寫
                @endif
            </p>
        </div>

        <div class="col-md-2  col-sm-2  col-xs-12 category-container">
            <ul class="category-ul">
                @foreach($categories as $category)
                    <a href="" class="category-link" {{--style="text-decoration: none"--}}>
                        <li>{{$category->name}}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    </div>
@stop