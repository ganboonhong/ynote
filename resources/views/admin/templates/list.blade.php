<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('header_title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    {!! HTML::style('css/all.css') !!}
    {!! HTML::style('css/fr_custom.css') !!}

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    {!!  HTML::script('js/jquery.confirm.min.js')  !!}
    {!!  HTML::script('js/jquery.tshift.min.js')  !!}
    {!!  HTML::script('js/_general_js.js')  !!}

</head>
<body>

@include('admin.navbar.navbar')

<div class="container" id="checkboxes">

    <h2>
        @yield('title')
    </h2>

    <hr/>

    <div class="list-group">
        @yield('items')
    </div>

</div>

</body>
</html>

<script>
    $(function() {

        $(document).tooltip();

        $('#checkboxes').tshift();

        get_checkboxes_checked();

        $('.big-checkbox').change(function(){
            var checked_exist = false;
            $('.big-checkbox').each(function(){
                if($(this).prop('checked')) checked_exist = true;
            });

            if(checked_exist){
                $('#delete_all_btn').show();
            }else{
                $('#delete_all_btn').hide();
            }
        })

    });

    function get_checkboxes_checked(){
        $('#first_checkbox').change(function(){
            if(this.checked) {
                $('#checkboxes').find('input[type=checkbox]').prop('checked', true);
            }else{
                $('#checkboxes').find('input[type=checkbox]').prop('checked', false);
            }
        });
    }

</script>
