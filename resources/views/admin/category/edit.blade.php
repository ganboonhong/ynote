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

    <div style="margin-bottom: 20px;">
        Visible
        <span style="margin-left:10px ;margin-right:10px ; ">
            <label for="visible_Y">Yes</label>
            <input name="visible" id="visible_Y" type="radio" value="Y"
            @if($category->visible == 'Y') {{'checked'}} @endif>
        </span>

        <label for="visible_N">No</label>
        <input name="visible" id="visible_N" type="radio" value="N"
            @if($category->visible == 'N') {{'checked'}} @endif>
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
