<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">FRANCODE</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="/admin/function_type">Types</a></li>
                {{--<li><a href="/admin/function">Function</a></li>--}}
                <li><a href="/admin/category">Categories</a></li>
                <li><a href="/admin/article">Articles</a></li>
                @if(\Illuminate\Support\Facades\Auth::user()->level > 99)
                    <li><a href="/admin/user">Users</a></li>
                @endif
            </ul>

            {{--<form class="navbar-form navbar-left navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>--}}

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/admin/user/edit/{{Auth::user()->user_id}}">
                        @if(\Illuminate\Support\Facades\Auth::user()->cloudinary_api_response != "")
                            <img
                                    src="{{json_decode(\Illuminate\Support\Facades\Auth::user()->cloudinary_api_response)->url}}"
                                    style="width: 25px; height: 25px;">
                        @else
                            <span class="glyphicon glyphicon-user"></span>
                        @endif
                        {{Auth::user()->email}}
                    </a>
                </li>
                <li>
                    <a href="/auth/logout">
                        <span class="glyphicon glyphicon-log-out"></span>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>