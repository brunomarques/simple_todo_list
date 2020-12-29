<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Laravel - {{ env("app_name") }}</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/favicon.png") }}">

        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    </head>
    <body class="h-100">
        <div id="preloader">
            <div class="loader"></div>
        </div>

        <div class="main-wrapper">
            {{-- <div class="nav-header">
                <div class="brand-logo">
                    <a href="/">
                        <b class="logo-abbr"><i class="fas fa-clipboard-list"></i></b>
                        <span class="brand-title">
                            <b>{{ env("app_name") }}</b>
                        </span>
                    </a>
                </div>
            </div>

            <div class="header">
                <div class="header-content clearfix">
                    <div class="header-left"></div>

                    <div class="header-right">
                        <ul class="">
                            <li class="icons d-none d-md-flex">
                                <a href="javascript:void(0)" class="window_fullscreen-x">
                                    <i class="icon-frame"></i>
                                </a>
                            </li>

                            @guest
                                @if (Route::has('login'))
                                    <li class="icons d-none d-md-flex" style="width: 70px;">
                                        <a href="{{ route('login') }}" class="text-sm">Login</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="icons d-none d-md-flex text-center" style="width: 70px;">
                                        <a href="{{ route('register') }}" class="text-sm">Registrar</a>
                                    </li>
                                @endif
                            @else
                                <li class="icons d-none d-md-flex text-center" style="width: auto;">
                                    <div class="user-img c-pointer-x">
                                        <span class="activity active"></span>
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="drop-down dropdown-profile animated flipInX">
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="javascript:void()"><i class="icon-user"></i> <span>My Profile</span></a></li>
                                                <li><a href="javascript:void()"><i class="icon-calender"></i> <span>My Calender</span></a></li>
                                                <li><a href="javascript:void()"><i class="icon-envelope-open"></i> <span>My Inbox</span> <div class="badge gradient-3 badge-pill badge-primary">3</div></a></li>
                                                <li><a href="javascript:void()"><i class="icon-paper-plane"></i> <span>My Tasks</span><div class="badge badge-pill bg-dark">3</div></a></li>
                                                <li><a href="javascript:void()"><i class="icon-check"></i> <span>Online</span></a></li>
                                                <li><a href="javascript:void()"><i class="icon-lock"></i> <span>Lock Screen</span></a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="icon-key"></i> <span>Sair</span>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div> --}}

            <div class="content-body" style="margin-left: 0px !important;">
                <div class="container-fluid">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>

            <div class="footer" style="padding-left: 0px !important;">
                <div class="copyright">
                    <p>{{ env("app_name") }} (v1.0.0)</p>
                </div>
            </div>
        </div>

        <script src="{{asset("plugins/common/common.min.js")}}"></script>
        <script src="{{asset("js/custom.min.js")}}"></script>
        <script src="{{asset("js/settings.js")}}"></script>
        <script src="{{asset("js/quixnav.js")}}"></script>
        <script src="{{asset("js/styleSwitcher.js")}}"></script>
    </body>
</html>
