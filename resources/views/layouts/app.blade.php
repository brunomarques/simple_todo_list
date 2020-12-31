<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Laravel - {{ env("app_name") }}</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/favicon.png") }}">

        <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/adminlte.min.css") }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="/"><b>{{ env("app_name") }}</b></a>
            </div>

            <div class="card shadow-lg border-rounded-6">
                <div class="card-body login-card-body border-rounded-6">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
