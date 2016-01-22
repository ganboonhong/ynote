<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {!! HTML::style('css/frontend/general.css') !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {{--jQuery tooltip--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    {!! HTML::script('js/_general_js.js') !!}
    {!! HTML::script('js/jquery_validation/jquery.validate.js')!!}
    {{--{!! HTML::script('js/jquery_validation/localization/messages_zh_TW.js')!!}--}}
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {{--{!! HTML::script('js/nicEditor/nicEdit.js') !!}--}}

    {{--sharer plugin--}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/sharer/cool-share/plugin.css" media="all" rel="stylesheet" />
    <script src="/sharer/cool-share/plugin.js"></script>

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
                        <span class="@if(!isset($selected_category)){{'category-name-selected'}}@endif">
                            All (<span>{{$article_amount['total']}}</span>)
                        </span>
                    </li>
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
                                    {{$category->name}} (<span>{{$article_amount[$category->category_id]}}</span>)
                                </span>
                        </li>
                    </a>
                @endforeach
            </ul>
            <span class="socialShare"></span>
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


    var url = window.location.href;

    var options = {

        twitter: {
            text: 'Check out this awesome jQuery Social Buttons Plugin! ',
            via: 'Tutorialzine'
        },

        facebook : true,
        googlePlus : true
    };

    $('.socialShare').shareButtons(url, options);
</script>
