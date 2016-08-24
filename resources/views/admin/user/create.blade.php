@extends('admin.templates.create')

@section('title_header')
    Creating a new user
@stop

@section('title')
    Creating a new user
@stop

@section('content')
    

    {!! Form::open(array('url' => 'admin/user', 'id' => 'user_form', 'files' => true)) !!}

        <input type="hidden" name="list_pic" id="list_pic" value="">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>

        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" name="description" class="form-control" id="description">
        </div>

        <!-- <div class="form-group">
            <label for="image">Image:</label>
            {!! Form::file('pic') !!}
        </div> -->

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div class="form-group">
            <label for="password">Password (Confirm):</label>
            <input type="password" name="password_2" class="form-control" id="password_2">
        </div>

        <div class="form-group">
            <label for="privilege">Privilege:</label>
            <select class="form-control" name="level">
                @foreach( $privileges as $privilege )
                    <option value="{{$privilege->level}}">
                        {{$privilege->name}}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="side_panel_background">Sidebar Background:</label>
            <input type='text' id="side_panel_background" name="side_panel_background" value="#ebe8e1" class="side_panel_class" />
        </div>

        <div class="form-group">
            <label for="nav_item_background">Navigation Category Background:</label>
            <input type='text' id="nav_item_background" name="nav_item_background" value="#bdad88"  class="side_panel_class" />
        </div>

        <input type="hidden" name="side_panel_style" id="side_panel_style" 
        value='{"side_panel_background":"#ebe8e1","nav_item_background":"#bdad88"}'>







        <button type="submit" class="btn btn-primary form-control">Create</button>
    {!! Form::close() !!}



    <script>

        $(function(){

            $('#user_form').validate({
                rules:{
                    name: "required",
                    email:{
                        required: true,
                        email   : true
                    },
                    password:{
                        required    : true,
                        minlength   : 5
                    },
                    password_2:{
                        required    : true,
                        minlength   : 5,
                        equalTo     : "#password"
                    }
                }
            });

            $('#user_form').submit(function(){
                if($('[name="list_pic"]').val() == ""){
                    alert('Please upload an image');
                    return false;
                }
            })

            function spectrumChangeHandler(){
                var side_panel_style = {};

                $("#side_panel_background, #nav_item_background").serializeArray().map(
                    function(x){side_panel_style[x.name] = x.value;}
                ); 

                $("#side_panel_style").val(JSON.stringify(side_panel_style));
            }

            var palette = [
                            ["rgb(0, 0, 0)", "rgb(67, 67, 67)", "rgb(102, 102, 102)",
                            "rgb(204, 204, 204)", "rgb(217, 217, 217)","rgb(255, 255, 255)"],
                            ["rgb(152, 0, 0)", "rgb(255, 0, 0)", "rgb(255, 153, 0)", "rgb(255, 255, 0)", "rgb(0, 255, 0)",
                            "rgb(0, 255, 255)", "rgb(74, 134, 232)", "rgb(0, 0, 255)", "rgb(153, 0, 255)", "rgb(255, 0, 255)"], 
                            ["rgb(230, 184, 175)", "rgb(244, 204, 204)", "rgb(252, 229, 205)", "rgb(255, 242, 204)", "rgb(217, 234, 211)", 
                            "rgb(208, 224, 227)", "rgb(201, 218, 248)", "rgb(207, 226, 243)", "rgb(217, 210, 233)", "rgb(234, 209, 220)", 
                            "rgb(221, 126, 107)", "rgb(234, 153, 153)", "rgb(249, 203, 156)", "rgb(255, 229, 153)", "rgb(182, 215, 168)", 
                            "rgb(162, 196, 201)", "rgb(164, 194, 244)", "rgb(159, 197, 232)", "rgb(180, 167, 214)", "rgb(213, 166, 189)", 
                            "rgb(204, 65, 37)", "rgb(224, 102, 102)", "rgb(246, 178, 107)", "rgb(255, 217, 102)", "rgb(147, 196, 125)", 
                            "rgb(118, 165, 175)", "rgb(109, 158, 235)", "rgb(111, 168, 220)", "rgb(142, 124, 195)", "rgb(194, 123, 160)",
                            "rgb(166, 28, 0)", "rgb(204, 0, 0)", "rgb(230, 145, 56)", "rgb(241, 194, 50)", "rgb(106, 168, 79)",
                            "rgb(69, 129, 142)", "rgb(60, 120, 216)", "rgb(61, 133, 198)", "rgb(103, 78, 167)", "rgb(166, 77, 121)",
                            "rgb(91, 15, 0)", "rgb(102, 0, 0)", "rgb(120, 63, 4)", "rgb(127, 96, 0)", "rgb(39, 78, 19)", 
                            "rgb(12, 52, 61)", "rgb(28, 69, 135)", "rgb(7, 55, 99)", "rgb(32, 18, 77)", "rgb(76, 17, 48)"]
                        ]

            $("#side_panel_background").spectrum({
                color: "#ebe8e1",
                showInput: true,
                className: "full-spectrum",
                showInitial: true,
                showPalette: true,
                showSelectionPalette: true,
                maxSelectionSize: 10,
                preferredFormat: "hex",
                localStorageKey: "spectrum.demo",
                move: function (color) {
                    
                },
                show: function () {
                
                },
                beforeShow: function () {
                
                },
                hide: function () {
                
                },
                change: function() {

                    spectrumChangeHandler();
                },
                palette: palette
            });

            $("#nav_item_background").spectrum({
                color: "#bdad88",
                showInput: true,
                className: "full-spectrum",
                showInitial: true,
                showPalette: true,
                showSelectionPalette: true,
                maxSelectionSize: 10,
                preferredFormat: "hex",
                localStorageKey: "spectrum.demo",
                move: function (color) {
                    
                },
                show: function () {
                
                },
                beforeShow: function () {
                
                },
                hide: function () {
                
                },
                change: function() {

                    spectrumChangeHandler();
                },
                palette: palette
            });

        })

    </script>

@stop



@section('individual_js')
    <link rel="stylesheet" href="/css/spectrum-colorpicker/spectrum.css">
    <script src="/js/spectrum-colorpicker/spectrum.js"></script>
@endsection


