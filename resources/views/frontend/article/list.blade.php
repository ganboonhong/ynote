@extends('frontend.templates.general')

@section('head')
    <style>
        .list-item-container{
            margin-top: 5%;
        }
        .item{
            margin-bottom: 5%;
            overflow: hidden;
        }
        .title{
            margin-top: 3%;
            width: 100%;
            height: 50px;
        }
        .list-pics{
            height: 207px;
            max-width: 345px;
            overflow: hidden;
        }
        .article-category{
            margin-top: 10px;
        }
        .list-wrapper{
            margin-left: 20%;
        }
        @media screen and (max-width: 768px) and (min-width: 0px){
            .list-item-container{
                margin-top: 10%;
            }
            .item img{
                height: 250px;
            }
            .list-wrapper{
                margin-left: 0px;
            }
        }
        @media screen and (max-width: 992px) and (min-width: 768px){

        }
    </style>
@stop

@section('content')

        <div class="col-md-10 col-sm-12 col-xs-12 list-wrapper">
            <div class="article-category" style="display: none">
                Categories:
                <select id="article-category-selector">
                    <option selected value="{{url('article')}}">All</option>
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
            $('#article-category-selector').change(function(){
                window.open($(this).val(), '_self');
            })
        })
    </script>
@stop