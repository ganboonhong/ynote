@extends('admin.templates.create')

    @section('title')
        System Functions
    @stop

    @section('title')
        System Functions
    @stop

    @section('content')

    {!! Form::open(array('url' => 'admin/function_type')) !!}
    <div class="form-group">
        <label for="name">Function Type Name:</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>

    <button type="submit" class="btn btn-primary form-control">Create</button>
    {!! Form::close() !!}

    @stop
