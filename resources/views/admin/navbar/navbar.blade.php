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
                <li><a href="/admin/user">Users</a></li>
            </ul>

            {{--<form class="navbar-form navbar-left navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>--}}

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/admin/user/edit/{{Auth::user()->user_id}}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->email}}</a></li>
                <li><a href="/auth/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
    </div>
</nav>