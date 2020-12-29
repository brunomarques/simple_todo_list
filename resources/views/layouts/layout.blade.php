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
        @yield('css')
    </head>
    <body class="h-100">
        <div id="preloader">
            <div class="loader"></div>
        </div>

        <div class="main-wrapper">
            @component("components.top-menu-left")@endcomponent

            @component("components.menu-top")@endcomponent

            <div class="content-body" style="margin-left: 0px !important;">
                <div class="container-fluid">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>

            @component('components.footer')@endcomponent
    </body>

    @yield('js')
</html>
