@extends('admin.templates.create')

@section('title_header')
    新增使用者
@stop

@section('title')
    新增使用者
@stop

@section('content')

    {!! Form::open(array('url' => 'admin/user', 'id' => 'user_form')) !!}

        <div class="form-group">
            <label for="name">名稱</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>

        <div class="form-group">
            <label for="name">E-mail:</label>
            <input type="text" name="email" class="form-control" id="email">
        </div>

        <div class="form-group">
            <label for="password">密碼:</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>

        <div class="form-group">
            <label for="password">確認密碼:</label>
            <input type="password" name="password_2" class="form-control" id="password_2">
        </div>

        <div class="form-group">
            <label for="password">權限:</label>
            <select class="form-control" name="level">
                @foreach( $privileges as $privilege )
                    <option value="{{$privilege->level}}">
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
        })

    </script>

@stop


