<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','EPU Drive')</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    
    <!-- Styles -->
    <link href="https://bootswatch.com/lumen/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/tools/app.css') }}" rel="stylesheet">

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
    @stack('styles')
</head>
<body id="app-layout">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{!!asset('images/file.png')!!}" alt="logo">
                    <strong style="color: #FF6B6B">EPU</strong><sub style="color: #556270">DRIVE</sub>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if (auth()->check() && auth()->user()->admin)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"><b style="color: #FF0000">Quản trị</b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{!! action('UserController@getActivation') !!}">Kích hoạt tài khoản
                            @if ($stat['unactivated_user']>0)
                            <span class="badge badge-important">{{$stat['unactivated_user']}}</span></a>
                            @endif
                            </li>
                            <li><a href="{!! action('TaskController@getEdit') !!}">Bài mới</a></li>
                        </ul>
                    </li>
                    @endif
                    <li><a href="{!! url('/home') !!}">Bảng tin</a></li>
                    <li><a href="{!! action('UserController@getIndex') !!}">Thành viên</a></li>
                    <li><a href="{!! url('/gioi-thieu') !!}">Giới thiệu</a></li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{!! url('/login') !!}">Đăng nhập</a></li>
                    <li><a href="{!! url('/register') !!}">Đăng ký</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{!! Gravatar::get(Auth::user()->email) !!}" class="user-icon">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{!! action('UserController@getDetail', ['id'=> auth()->user()->id]) !!}"><i class="fa fa-btn fa-user"></i>Thông tin tài khoản</a></li>
                            <li><a href="{!! action('UserController@getEdit') !!}"><i class="fa fa-btn fa-edit"></i>Cập nhật hồ sơ</a></li>
                            <li class="divider"></li>
                            <li><a href="{!! url('/logout') !!}"><i class="fa fa-btn fa-sign-out"></i>Đăng xuất</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>

    @yield('content')
    <footer class="footer">
        <div class="container">
            <p class="pull-right">Sinh viên: Ngô Xuân Bách - Trần Anh Đức</p>
            <p>&copy; 2016 Đại Học Điện Lực Hà Nội</p>
        </div>
    </footer>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @stack('scripts')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
