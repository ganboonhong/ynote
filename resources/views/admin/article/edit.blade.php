@extends('admin.templates.create')

    @section('title')
        Edit article
    @stop

    @section('title')
        Edit article
    @stop

    @section('content')

            <div class="form-group existing_pic">
                <div>
                    @if($article->list_pic != "")
                        <img src='/server/php/files/thumbnail/{{$article->list_pic}}' style="width: 100px;">
                    @endif
                </div>
            </div>

        {!! Form::open(array('route' => array('article_update', $article->article_id), 'files'=>true)) !!}
            <input type="hidden" name="list_pic" id="list_pic" value="{{$article->list_pic}}">

            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$article->title}}">
            </div>

            {{--<div class="form-group">
                <label for="name">Title (English):</label>
                <input type="text" name="title_en" class="form-control" id="title_en" value="{{$article->title_en}}">
            </div>--}}

            <div class="nice_editor form-group">
                <label for="name">Content:</label>
                <textarea name="content" id="content" style="width:100%">{{$article->content}}</textarea>
            </div>

            {{--<div class="nice_editor form-group">
                <label for="name">Content (Eng)</label>
                <textarea name="content_en" id="content_en" style="width:100%" class="nice_editor">{{$article->content_en}}</textarea>
            </div>--}}

            <div class="form-group">
                <label for="sel1">Category：</label>
                <select name="category_id" class="form-control" id="sel1">
                    @foreach( $categories as $category )
                        <option value="{{$category->category_id}}"
                                @if($category->category_id == $article->category_id) selected @endif
                                >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" style="display:none">
                <label for="sel1">Function Type：</label>
                <select name="admin_function_type_id" class="form-control">
                    @foreach( $function_types as $function_type )
                        <option value="{{$function_type->admin_function_type_id}}"
                                @if($function_type->admin_function_type_id == $article->admin_function_type_id) selected @endif
                                >{{$function_type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reference">Reference:</label>
                <input type="text" name="reference" class="form-control" id="reference"  value="{{$article->reference}}">
            </div>

            <div class="form-group">
                <label for="priority">Priority:</label>
                <input type="text" name="sort" class="form-control" id="priority"  value="{{$article->sort}}">
            </div>

            <table style="width:30%">
                <tr>
                    <td>Visible:</td>
                    <td>
                        <label for="visible">Yes</label>
                        <input name="visible" id="visible" type="radio" value="Y"
                               @if($article->visible == 'Y') checked @endif>
                    </td>
                    <td>
                        <label for="invisible">No</label>
                        <input name="visible" id="invisible" type="radio" value="N"
                               @if($article->visible == 'N') checked @endif>
                    </td>
                </tr>

            </table>

        <button type="submit" class="btn btn-primary form-control" style="margin: 10px 0px 20px 0px">Done</button>

        {!! Form::close() !!}


        <script type="text/javascript">

            $(function(){
                //$('textarea').tooltip('disable');
                $('#function_form').validate({
                    rules:{
                        name: "required"
                    }
                });
            });

            /*
            //nicEditor
            bkLib.onDomLoaded(function() {
                new nicEditor({fullPanel : true}).panelInstance('content');
                new nicEditor({fullPanel : true}).panelInstance('content_en');
            });*/

            tinymce.init({
                selector: 'textarea',
                height: 1000,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code jbimages'
                ],
                toolbar:    'insertfile undo redo | styleselect | bold italic |' +
                            ' alignleft aligncenter alignright alignjustify |' +
                            ' bullist numlist outdent indent | link image jbimages',
                content_css: [
                    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                    '//www.tinymce.com/css/codepen.min.css'
                ],
                relative_urls: false
            });

        </script>

    @stop