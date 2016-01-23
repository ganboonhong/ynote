<!DOCTYPE html>
<html lang="en">

<head>
    @yield('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta charset="utf-8">
    <meta content="text/html" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link href="http://i.cdn.turner.com/cnn/.e/img/3.0/global/misc/apple-touch-icon.png" rel="apple-touch-icon" type="image/png"/>
    <title>CNN - Breaking News, U.S., World, Weather, Entertainment & Video News</title>
    <meta content="intl_homepage" name="section">
    <meta content="2014-02-24T14:45:54Z" property="og:pubdate">
    <meta content="2014-02-24T14:45:54Z" name="pubdate">
    <meta content="2016-01-23T03:37:33Z" name="lastmod">
    <meta content="http://www.cnn.com" property="og:url">
    <meta content="CNN - Breaking News, U.S., World, Weather, Entertainment &amp; Video News" property="og:title">
    <meta content="Find the latest breaking news and information on the top stories, weather, business, entertainment, politics, and more. For in-depth coverage, CNN provides special reports, video, audio, photo galleries, and interactive guides." property="og:description">
    <meta content="Find the latest breaking news and information on the top stories, weather, business, entertainment, politics, and more. For in-depth coverage, CNN provides special reports, video, audio, photo galleries, and interactive guides." name="description">
    <meta content="breaking news, news online, U.S. news, world news, developing story, news video, CNN news, weather, business, money, politics, law, technology, entertainment, education, travel, health, special reports, autos, CNN TV" name="keywords">
    <meta content="CNN" property="og:site_name">
    <meta content="summary_large_image" name="twitter:card">
    <meta content="website" property="og:type">
    <meta property="vr:canonical" content="http://edition.cnn.com">
    <meta content="80401312489" property="fb:app_id">

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
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '994567687256622',
            xfbml      : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

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
