<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {!! HTML::style('css/all.css') !!}
    {!! HTML::style('css/fr_custom.css') !!}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    {{--jQuery tooltip--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    {!! HTML::script('js/_general_js.js') !!}
    {!! HTML::script('js/jquery_validation/jquery.validate.js')!!}
    {{--{!! HTML::script('js/jquery_validation/localization/messages_zh_TW.js')!!}--}}
    {!! HTML::script('js/tinymce/tinymce.min.js') !!}
    {{--{!! HTML::script('js/nicEditor/nicEdit.js') !!}--}}


    <!--*************************
    * jQuery file upload starts *
    **************************-->

        <!-- jQuery UI styles -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/dark-hive/jquery-ui.css" id="theme">
        <!-- Demo styles -->

        <!--[if lte IE 8]>
        <link rel="stylesheet" href="css/demo-ie8.css">
        <![endif]-->
        <style>
        /* Adjust the jQuery UI widget font-size: */
        .ui-widget {
            font-size: 0.95em;
        }
        </style>
        <!-- blueimp Gallery styles -->
        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
        <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
        <link rel="stylesheet" href="/css/file_upload/jquery.fileupload.css">
        <link rel="stylesheet" href="/css/file_upload/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="/css/file_upload/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="/css/file_upload/jquery.fileupload-ui-noscript.css"></noscript>

    <!--*************************
    * jQuery file upload ends   * 
    **************************-->


</head>
<body>

@include('admin.navbar.navbar')

<div class="container">
    <h2>@yield('title')</h2>
    <hr/>

    @yield('content')
</div>

</body>
</html>

<script>
    $(function(){
        focus_on_first_input();

        $( document ).tooltip();
    })
</script>

 
<!--*************************
* jQuery file upload starts *
**************************-->

    <!-- The template to display files available for upload -->
    <script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload fadexx">
            <td>
                <span class="preview"></span>
            </td>
            <td>
                <p class="name">{%=file.name%}</p>
                <strong class="error"></strong>
            </td>
            <td>
                <p class="size">Processing...</p>
                <div class="progress"></div>
            </td>
            <td>
                {% if (!i && !o.options.autoUpload) { %}
                    <button class="start" disabled>Start</button>
                {% } %}
                {% if (!i) { %}
                    <button class="cancel">Cancel</button>
                {% } %}
            </td>
        </tr>
    {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-download fadexx">
            <td>
                <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                        <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
                </span>
            </td>
            <td>
                <p class="name">
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                </p>
                {% if (file.error) { %}
                    <div><span class="error">Error</span> {%=file.error%}</div>
                {% } %}
            </td>
            <td>
                <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <td>
                <button class="delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button>
                <input type="checkbox" name="delete" value="1" class="toggle">
            </td>
        </tr>
    {% } %}
    </script>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>


    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/js/file_upload/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/js/file_upload/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="/js/file_upload/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="/js/file_upload/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="/js/file_upload/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="/js/file_upload/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="/js/file_upload/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="/js/file_upload/jquery.fileupload-ui.js"></script>
    <!-- The File Upload jQuery UI plugin -->
    <script src="/js/file_upload/jquery.fileupload-jquery-ui.js"></script>
    <!-- The main application script -->
    <script src="/js/file_upload/main.js"></script>
    <script>
    // Initialize the jQuery UI theme switcher:
    // $('#theme-switcher').change(function () {
    //     var theme = $('#theme');
    //     theme.prop(
    //         'href',
    //         theme.prop('href').replace(
    //             /[\w\-]+\/jquery-ui.css/,
    //             $(this).val() + '/jquery-ui.css'
    //         )
    //     );
    // });
    </script>

<!--*************************
* jQuery file upload ends   * 
**************************-->