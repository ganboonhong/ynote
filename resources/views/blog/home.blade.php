<!DOCTYPE html>
<html>
  <head>
    @yield('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- FB sharer -->
    <meta property="og:image" content="/server/php/files/light-bulb.png"/>
    <meta property="og:description" content="This blog records all the interesting things in the life of a passionnate programmer.">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    {!! HTML::style('css/frontend/general.css') !!}
    {!! HTML::style('css/frontend/article/list.css') !!}

    





    {{--jQuery tooltip--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    {!! HTML::script('js/jquery.confirm.min.js') !!}
    {!! HTML::script('js/_general_js.js') !!}
    {!! HTML::script('js/jquery_validation/jquery.validate.js')!!}
    {{--{!! HTML::script('js/jquery_validation/localization/messages_zh_TW.js')!!}--}}
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {{--{!! HTML::script('js/nicEditor/nicEdit.js') !!}--}}

    {{--sharer plugin--}}
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" />
    <!-- <link rel="icon" href="/server/php/files/light-bulb.png"> -->
    <link href="/sharer/cool-share/plugin.css" media="all" rel="stylesheet" />
    <script src="/sharer/cool-share/plugin.js"></script>
    <meta name="google-site-verification" content="uOBGAl-u4gUNzKReYprdob-YEMffbmPR5a7O8Nqyzzc" />
    <title>Articles</title>

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

        <div id="container"></div>
        <div class="loading"></div>

    <script src="../../../../js/bundle.js"></script>
  </body>
</html>

<script>
    $(function(){
        focus_on_first_input();

        $( document ).tooltip();
    })


    var url = window.location.href;

    var options = {
        twitter: true,
        facebook : true,
        googlePlus : true
    };

    $('.socialShare').shareButtons(url, options);
</script>