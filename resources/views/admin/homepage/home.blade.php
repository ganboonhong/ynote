<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <style>
        *, *:before, *:after {box-sizing:  border-box !important;}


        .row {
            -moz-column-width: 18em;
            -webkit-column-width: 18em;
            -moz-column-gap: 1em;
            -webkit-column-gap: 1em;

        }

        .menu-category {
            display: inline-block;
            margin:  0.25rem;
            padding:  1rem;
            width:  100%;
        }

        body{
            background-color: lightyellow;
        }

    </style>

</head>
<body>




<div class="container">
    <h1>Masonry CSS with Bootstrap</h1>

    <div class="menu row">


        @foreach( $functions as $function )
        <div class="menu-category list-group ">

                <div class="menu-category-name list-group-item active">{{$function->name}}</div><a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
                <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
                <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
                <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
                <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
                <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
                <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
        </div>
        @endforeach

        <div class="menu-category list-group">
            <div class="menu-category-name list-group-item active">Category</div><a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
            <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
            <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
            <a href="#" class="menu-item list-group-item">Lorem ipsum.<span class="badge">€ 0.00</span></a>
        </div>


    </div>
</div>




</body>
</html>
