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

        <button type="submit" class="btn btn-primary form-control" style="margin: 10px 0px 20px 0px">Create</button>
    {!! Form::close() !!}

    <script src="/js/jquery_validation/jquery.validate.js"></script>
    <script>
        $(document).ready(function(){
             $("#jquery_image_upload").hide();
        })

        $('#category_form').validate({
            rules:{
                name:"required"
            }
        })
    </script>

    @stop
