@extends('frontend.templates.general')

@section('head')
    <style>
        .list-item-container{
            margin-top: 50px;
        }
        .item{
            margin-bottom: 30px;
            overflow: hidden;
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
            margin-top: 10px;
        }
        @media screen and (max-width: 768px) and (min-width: 0px){
            .list-item-container{
                margin-top: 100px;
            }
            .item img{
                height: 250px;
            }
            .article-category{
                margin-top: 30px;
            }
        }
        .author{
            background-color: #ebe8e1;
            height: 100vh;
        }
        #profile-pic{
            width: 100px;
            border-radius: 50%;
            position: absolute;
            margin: auto;
            top: -500px;
            left: 0;
            right: 0;
            bottom: 0;
        }
        #author-description{
            position: absolute;
            margin: auto;
            top: -280px;
            left: 0;
            right: 0;
            bottom: 0;
            text-align: center;
            padding: 10px 10px 0px 10px;
            height: 10%;
        }
        .category-wrapper{
            position: absolute;
            margin: auto;
            top: -170px;
            left: 0;
            right: 0;
            bottom: 0;
            text-align: center;
            padding: 10px 10px 10px 10px;
            height: 10%;
        }
        .category{
             position: relative;
             left: 0;
             right: 0;
             bottom: 0;
             text-align: center;
             padding: 10px 10px 10px 10px;
             height: 8%;
             width: 78%;
             background: #e1d8c1;
             list-style: none;
             margin: 10px 0 10px 0;
             display: inline-block;
             color: #000000;
         }
        .category:hover{
            background: #bcb39d;
        }
        .selected-category{
            background: #bcb39d;
        }
        .category-name-selected{
            color: white;
            font-weight: bold;
        }
    </style>
@stop

@section('content')


        <div class="col-md-3 col-sm-4 col-xs-12 author">
            <div>
                @if($user->cloudinary_api_response != "")
                    <img src="{{json_decode($user->cloudinary_api_response)->url}}" id="profile-pic">
                @endif
            </div>
            <p id="author-description">
              {{$user->description}}
            </p>

            <div class="category-wrapper">
                <ul style="padding-left: 0;">
                    <a href="{{Illuminate\Support\Facades\Config::get('app.domain').'/'.$user->user_id.'/article'}}">
                        <li class="category
                        @if(!isset($selected_category))
                            {{'selected-category'}}
                        @endif
                        ">
                            <span class="@if(!isset($selected_category)){{'category-name-selected'}}@endif">All</span></li>
                    </a>
                    @foreach($categories as $category)
                        <a href="{{Illuminate\Support\Facades\Config::get('app.domain').'/'.$user->user_id.'/article-category/'.$category->category_id}}">
                            <li class="category
                                @if(isset($selected_category))
                                    @if($selected_category->category_id == $category->category_id)
                                    {{'selected-category'}}
                                    @endif
                                @endif">
                                <span class="
                                @if(isset($selected_category))
                                    @if($selected_category->category_id == $category->category_id)
                                        {{'category-name-selected'}}
                                    @endif
                                @endif">
                                    {{$category->name}}
                                </span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>

        </div>

        <div class="col-md-9 col-sm-8 col-xs-12">
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
        </div>



    <script>
        $(function(){
            $('#article-category-selector').change(function(){
                window.open($(this).val(), '_self');
            })
        })
    </script>
@stop