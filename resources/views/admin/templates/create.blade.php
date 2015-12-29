<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {!! HTML::style('css/all.css') !!}
    {!! HTML::style('css/fr_custom.css') !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    {{--jQuery tooltip--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    {!! HTML::script('js/_general_js.js') !!}
    {!! HTML::script('js/jquery_validation/jquery.validate.js')!!}
    {!! HTML::script('js/jquery_validation/localization/messages_zh_TW.js')!!}
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {{--{!! HTML::script('js/nicEditor/nicEdit.js') !!}--}}


</head>
<body>

@include('admin.navbar.navbar')

<div class="container">
    <h2>@yield('title')</h2>
    <hr/>

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
