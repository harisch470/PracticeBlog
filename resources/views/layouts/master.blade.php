
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Post - Blog Template</title>
    @include('layouts.includes.css')
    @yield('headAssets')
</head>

<body>

@section('navBar')
        <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{route('home')}}">Home</a></li>
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li><a href="{{route('posts.create')}}">Create Post</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Administration <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('categories.index')}}">Categories</a></li>
                            <li><a href="{{route('categories.index')}}">Create Category</a></li>
                            <li><a href="{{route('posts.index')}}">Posts</a></li>
                            {{--<li><a href="{{route('comments.index')}}">Comments</a></li>--}}
                        </ul>
                    </li>

                @endif
            </ul>
            @if (Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Welcome, {{ $loggedInUserName }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">

                        <li><a href="{{route('userPosts')}}">My Total Posts: [{{$userPostCount}}]</a></li>
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="#">Change Password</a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
@show

<!-- Page Content -->
<div class="container">

    <div class="row">
        @yield('pageContent')


        <!-- Blog Sidebar Widgets Column -->
        @yield('rightBar')
    </div>


     <!-- Footer -->


    <footer>
        <hr>
        <div class="row">
            <div class="col-lg-6">
                <p>Copyright &copy; Your Website 2017</p>
            </div>
            <div class="col-lg-6">
                <p class="text-right">Best start Code for Laravel beginners</p>
            </div>
        </div>
        <!-- /.row -->
    </footer>

</div>
<!-- /.container -->
@include('layouts.includes.js')
@yield('footerAssets')
<div class="modal"><!-- Place at bottom of page --></div>
<script>
    $body = $("body");
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }
    });
</script>
</body>

</html>
