@extends('admin.templates.create')

    @section('title')
        Creating a new category for article
    @stop

    @section('title')
        Creating a new category for article
    @stop

    @section('content')

    {!! Form::open(array('url' => 'admin/category', 'id' => 'category_form')) !!}

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>

    <div class="form-group">
        <label for="name_en">Name (Eng):</label>
        <input type="text" name="name_en" class="form-control" id="name_en">
    </div>

    <button type="submit" class="btn btn-primary form-control" style="margin: 10px 0px 20px 0px">Create</button>
    {!! Form::close() !!}


    <script>
        $('#category_form').validate({
            rules:{
                name:"required"
            }
        })

    </script>

    @stop
