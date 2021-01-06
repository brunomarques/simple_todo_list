<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel - {{ env("app_name") }}</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/logo.svg") }}">

        <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/adminlte.min.css") }}">
        <link rel="stylesheet" href="{{ asset("plugins/nestable2/dist/jquery.nestable.min.css") }}">
        <link rel="stylesheet" href="{{ asset("plugins/sweetalert2/sweetalert2.min.css") }}">
        {{-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{ asset("css/uikit.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/theme.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        @yield('css')
    </head>

    <body class="hold-transition uk-background-muted">
        <div class="wrapper">
            @component("components.menu-top")@endcomponent

            <div class="content-wrapper" style="margin-left: 0px !important;">
                <section class="container">
                    <div class="row mb-2 mt-3">
                        <div class="col-10">
                            <h3>Olá {{ Auth::user()->name }}, é sempre muito bom ter você por aqui!</h3>
                            <p>Temos atividades para serem feitas, não é mesmo? :)</p>
                        </div>

                        <div class="col-2">
                            <span class="text-sm btn btn-app shadow-sm float-right" id="new">
                                <i class="fas fa-plus text-success"></i>
                                Nova atividade
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 status">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </section>

                <div class="content" style="margin-left: 0px !important;">
                    <div class="container">
