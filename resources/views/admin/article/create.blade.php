@extends('admin.templates.create')

    @section('title')
        Creat a new article
    @stop

    @section('title')
        Creat a new article
    @stop

    @section('content')

        {!! Form::open(array('url' => 'admin/article', 'id' => 'article_form')) !!}
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" name="title" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="name">Title (Eng):</label>
                <input type="text" name="title_en" class="form-control" id="title_en">
            </div>

            <div class="nice_editor form-group">
                <label for="name">Content:</label>
                <textarea name="content" id="content" style="width:100%"></textarea>
            </div>

            <div class="nice_editor form-group">
                <label for="name">Content (Eng)</label>
                <textarea name="content_en" id="content_en" style="width:100%" class="nice_editor"></textarea>
            </div>

            <div class="form-group">
                <label for="sel1">Category：</label>
                <select name="category_id" class="form-control" id="sel1">
                    @foreach( $categories as $category )
                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="sel1">Function Type：</label>
                <select name="admin_function_type_id" class="form-control">
                    @foreach( $function_types as $function_type )
                        <option value="{{$function_type->admin_function_type_id}}">{{$function_type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="reference">Reference:</label>
                <input type="text" name="sort" class="form-control" id="sort">
            </div>

            <div class="form-group">
                <label for="sort">Priority:</label>
                <input type="text" name="sort" class="form-control" id="sort">
            </div>

        <table style="width:30%">
            <tr>
                <td>Visible:</td>
                <td>
                    <label for="visible">Yes</label>
                    <input name="visible" id="visible" type="radio" value="Y" checked>
                </td>
                <td>
                    <label for="invisible">No</label>
                    <input name="visible" id="invisible" type="radio" value="N">
                </td>
            </tr>

            <tr>
                <td>Chinese Version:</td>
                <td>
                    <label for="version_cht_yes">Yes</label>
                    <input name="version_cht" id="version_cht_yes" type="radio" value="Y" checked>
                </td>
                <td>
                    <label for="version_cht_no">No</label>
                    <input name="version_cht" id="version_cht_no" type="radio" value="N">
                </td>
            </tr>

            <tr>
                <td>English Version:</td>
                <td>
                    <label for="version_en_yes">Yes</label>
                    <input name="version_en" id="version_en_yes" type="radio" value="Y" checked>
                </td>
                <td>
                    <label for="version_en_no">No</label>
                    <input name="version_en" id="version_en_no" type="radio" value="N">
                </td>
            </tr>

        </table>

            <button type="submit" class="btn btn-primary form-control" style="margin: 10px 0px 20px 0px">Create</button>


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
                height: 300,
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