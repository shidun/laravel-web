<div class="blog-masthead">
    <div class="container">
        <form action="/posts/search">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="blog-nav-item " href="{{ url('/posts') }}">首页</a>
                </li>
                <li>
                    <a class="blog-nav-item" href="{{ url('/post/create') }}">写文章</a>
                </li>
                <li>
                    <a class="blog-nav-item" href="{{ url('/notices') }}">通知</a>
                </li>
                <li>
                    <input name="query" type="text" value="" class="form-control" style="margin-top:10px" placeholder="搜索词">
                </li>
                <li>
                    <button class="btn btn-default" style="margin-top:10px" type="submit">Go!</button>
                </li>
            </ul>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <div>
                    <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img  class="preview_img" src="{{ URL::asset(\Auth::user()->avatar) }}" alt="" class="img-rounded" style="width: 30px;border-radius:2000px; margin-right: 5px;">{{ \Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/user/{{ \Auth::user()->id }}">我的主页</a></li>
                        <li><a href="/users/setting">个人设置</a></li>
                        <li><a href="/logout">登出</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>