@extends('admin.templates.create')

    @section('title')
        文章分類（新增）
    @stop

    @section('title')
        文章分類（新增）
    @stop

    @section('content')

    {!! Form::open(array('url' => 'admin/category', 'id' => 'category_form')) !!}

    <div class="form-group">
        <label for="name">名稱:</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
        <label for="name_en">英文名稱:</label>
        <input type="text" name="name_en" class="form-control" id="name_en">
    </div>

    @include('admin.partials.footer_elements')

    {!! Form::close() !!}


    <script>
        $('#category_form').validate({
            rules:{
                name:"required"
            }
        })

    </script>

    @stop
