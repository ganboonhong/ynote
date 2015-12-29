@extends('admin.templates.create')

@section('title')
    修改使用者資訊
@stop

@section('title')
    新增修改使用者資訊使用者
@stop

@section('content')

    {!! Form::open(array('route' => array('user_update', $user->user_id), 'id' => 'user_form')) !!}

    <div class="form-group">
        <label for="name">名稱</label>
        <input type="text" name="name" class="form-control" id="name"
               value="{{$user->name}}">
    </div>

    <div class="form-group">
        <label for="name">E-mail:</label>
        <input type="text" name="email" class="form-control" id="email"
               value="{{$user->email}}">
    </div>

    <div class="form-group">
        <label for="password">密碼:</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="無須修改請勿填寫">
    </div>

    <div class="form-group">
        <label for="password">確認密碼:</label>
        <input type="password" name="password_2" class="form-control" id="password_2" placeholder="無須修改請勿填寫">
    </div>

    <div class="form-group">
        <label for="password">權限:</label>
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

    <button type="submit" class="btn btn-primary form-control">新增</button>
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
