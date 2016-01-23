@extends('admin.templates.create')

    @section('title')
        Edit article
    @stop

    @section('title')
        Edit article
    @stop

    @section('content')

        {!! Form::open(array('route' => array('article_update', $article->article_id), 'files'=>true)) !!}
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" name="title" class="form-control" id="title" value="{{$article->title}}">
            </div>



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