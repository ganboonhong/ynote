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
            width: 100%;
            height: 50px;
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
        <select id="article-category-selector">
            <option selected value="{{url('article')}}">所有</option>
            @foreach($categories as $category)
                <option value="{{route('item_list_with_category', ['id'=> $category->category_id])}}"
                    @if(isset($selected_category))
                        @if($selected_category->category_id == $category->category_id)
                            selected
                        @endif
                    @endif
                        >{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="list-item-container">
        @foreach($articles as $article)
            <div class="col-md-3 col-sm-4 col-xs-12 item">
                <a href="{{route('article_detail',['id' => $article->article_id])}}">
                    {{--<img src="../uploads/{{$article->list_pic}}" class="list-pics" />--}}
                    <img src="{{json_decode($article->cloudinary_api_response)->url}}" class="list-pics" />
                </a>
                <a href="{{route('article_detail',['id' => $article->article_id])}}">
                    <p class="title">{{$article->title}}</p>
                </a>
            </div>
        @endforeach
    </div>


    <script>
        $(function(){
            $('#article-category-selector').change(function(){
                window.open($(this).val(), '_self');
            })
        })
    </script>
@stop