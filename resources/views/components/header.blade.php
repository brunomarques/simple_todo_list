<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel - {{ env("app_name") }}</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/favicon.png") }}">

        <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/adminlte.min.css") }}">
        <link rel="stylesheet" href="{{ asset("plugins/nestable2/dist/jquery.nestable.min.css") }}">
        <link rel="stylesheet" href="{{ asset("plugins/sweetalert2/sweetalert2.min.css") }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
        @yield('css')
    </head>

    <body class="hold-transition layout-boxed">
        <div class="wrapper">
            @component("components.menu-top")@endcomponent

            <div class="content" style="margin-left: 0px !important;">
                <div class="container-fluid">
