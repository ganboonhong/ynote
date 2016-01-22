<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    {{--jQuery tooltip--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    {!! HTML::script('js/_general_js.js') !!}
    {!! HTML::script('js/jquery_validation/jquery.validate.js')!!}
    {{--{!! HTML::script('js/jquery_validation/localization/messages_zh_TW.js')!!}--}}
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {{--{!! HTML::script('js/nicEditor/nicEdit.js') !!}--}}

    <style>
        body{
            background-color: #f1f1f1;
        }

        /*author_side_bar-start*/
        .author{
            background-color: #ebe8e1;
            height: 100vh;
            position: fixed;
            width: 20%;
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
            color: #8f8671;
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
        /*author_side_bar-end*/

        /*media query should be located AFTER regular CSS*/
        @media screen and (max-width: 768px) and (min-width: 0px) {
            .navbar{
                position: absolute;
            }
            .author{
                position: relative ;
                width: 100% ;
            }
        }
    </style>

</head>
<body>

{{--@include('frontend.navbar.navbar')--}}

<div class="">

    {{--Author_side_bar-start--}}
    <div class="col-md-3 col-sm-2 col-xs-12 author">
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
    {{--Author_side_bar-end--}}

    @yield('content')
</div>

</body>
</html>

<script>
    $(function(){
        focus_on_first_input();

        $( document ).tooltip();
    })
</script>
