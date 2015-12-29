@extends('admin.templates.create')

    @section('title')
        新增分類
    @stop

    @section('title')
        新增分類
    @stop

    @section('content')

    {!! Form::open(array('url' => 'admin/function_type')) !!}
    <div class="form-group">
        <label for="name">名稱:</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>

    <button type="submit" class="btn btn-primary form-control">新增</button>
    {!! Form::close() !!}

    @stop
