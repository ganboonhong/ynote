@extends('admin.templates.create')

@section('title')
    Editing User Information
@stop

@section('title')
    Editing User Information
@stop

@section('content')

        <div class="form-group existing_pic">
            <div>
                @if($user->list_pic != "")
                    <img src='/server/php/files/thumbnail/{{$user->list_pic}}' style="width: 100px;">
                @endif
            </div>
        </div>


    {!! Form::open(array('route' => array('user_update', $user->user_id), 'id' => 'user_form', 'files' => true)) !!}
    <input type="hidden" name="list_pic" id="list_pic" value="{{$user->list_pic}}">

    <div class="form-group">
        <label for="name">User Name</label>
        <input type="text" name="name" class="form-control" id="name"
               value="{{$user->name}}">
    </div>

    <div class="form-group">
        <label for="name">E-mail:</label>
        <input type="text" name="email" class="form-control" id="email"
               value="{{$user->email}}">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" name="description" class="form-control" id="description"
               value="{{$user->description}}">
    </div>

    <!-- <div class="form-group">
        <label for="image">Image:</label>
        @if($user->pic != "")
            <div>
                <img src="{{json_decode($user->cloudinary_api_response)->url}}" style="width: 100px;">
            </div>
        @endif
        {!! Form::file('pic') !!}
    </div> -->

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Leave it empty to use the same password">
    </div>

    <div class="form-group">
        <label for="password">Password (Required):</label>
        <input type="password" name="password_2" class="form-control" id="password_2" placeholder="Leave it empty to use the same password">
    </div>

    <div class="form-group">
        <label for="privilege">Privilege:</label>
        <select class="form-control" name="level">
            @foreach( $privileges as $privilege )
                <option value="{{$privilege->level}}"
                        @if( $user->level == $privilege->level )
                            selected
                        @endif >
                    {{$privilege->name}}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary form-control">Save</button>
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
                        minlength   : 5
                    },
                    password_2:{
                        minlength   : 5,
                        equalTo     : "#password"
                    }
                }
            });
        })

    </script>

@stop
