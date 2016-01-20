@extends('admin.templates.create')

@section('title')
    Editing category
@stop

@section('title')
    Editing category
@stop

@section('content')

    {!! Form::open(array('route' => array('category_update', $category->category_id))) !!}
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
    </div>

    <div class="form-group">
        <label for="name_en">Name (Eng):</label>
        <input type="text" name="name_en" class="form-control" id="name_en" value="{{$category->name_en}}">
    </div>

    <button type="submit" class="btn btn-primary form-control">Save</button>
    {!! Form::close() !!}


    <script>
        $('#category_form').validate({
            rules:{
                name:"required"
            }
        })
    </script>

@stop
