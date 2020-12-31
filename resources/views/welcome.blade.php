<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <title>Laravel - {{ env("app_name") }}</title>

        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/favicon.png") }}">

        <link rel="stylesheet" href="{{ asset("plugins/fontawesome-free/css/all.min.css") }}">
        <link rel="stylesheet" href="{{ asset("css/adminlte.min.css") }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    </head>

    <body class="hold-transition layout-boxed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px !important;">
                <ul class="navbar-nav">
                    <li>
                        <span class="brand-title">
                            <b>{{ env("app_name") }}</b>
                        </span>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{ url('/home') }}" class="nav-link">Início</a>
                            </li>
                        @else
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item d-none d-sm-inline-block text-center">
                                    <a href="{{ route('register') }}" class="nav-link">Registrar</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </nav>

    	    <div class="content" style="margin-left: 0px !important;">
                <div class="container-fluid">
                    <div class="row justify-content-between mb-5 mt-5">
                        <div class="col-12 ">
                            <h1 class="text-center">Organize seu dia com o {{ env("app_name") }}!</h1>
                            <h3 class="mb-0">
                                O {{ env("app_name") }} é uma ferramenta simples de suporte às nossas atividades diárias. Com o {{ env("app_name") }}, você pode criar tarefas facilmente.
                            </h3>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-xl-6">
                            <div class="card card-success card-outline">
                                <div class="card-header" style="border-bottom: none !important;">
                                    <h2 class="card-title" style="font-size: 2rem">Criar tarefa</h2>

                                    <div class="card-tools">
                                        <i class="fas fa-plus text-success" style="font-size: 2rem"></i>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">
                                        Para inserir uma tarefa é bem simples. Basta clicar no botão <span class="text-success" style="font-size: 1rem"><i class="fas fa-plus"></i> Nova atividade</span> e seguir as instruções da tela.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card card-warning card-outline">
                                <div class="card-header" style="border-bottom: none !important;">
                                    <h2 class="card-title" style="font-size: 2rem">Alterar tarefa</h2>

                                    <div class="card-tools">
                                        <i class="fas fa-pencil-alt text-warning" style="font-size: 2rem"></i>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">
                                        Uma vez criada a atividade, ela será exibida em sua lista de atividades. Passando o mouse sobre qualquer linha fará com que o ícone de edição <i class="fas fa-pencil-alt text-warning" style="font-size: 1rem"></i> apareça, permitindo que você clique e altere facilmente.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xl-6">
                            <div class="card card-danger card-outline">
                                <div class="card-header" style="border-bottom: none !important;">
                                    <h2 class="card-title" style="font-size: 2rem">Excluir tarefa</h2>

                                    <div class="card-tools">
                                        <i class="fas fa-trash text-danger" style="font-size: 2rem"></i>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">
                                        Assim como o Alterar Tarefa, passando o mouse sobre qualquer linha fará com que o ícone de exclusão <i class="fas fa-trash text-danger" style="font-size: 1rem"></i> apareça, permitindo que você remova uma atividade de sua lista facilmente.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card card-info card-outline">
                                <div class="card-header" style="border-bottom: none !important;">
                                    <h2 class="card-title" style="font-size: 2rem">Resgatar tarefa</h2>

                                    <div class="card-tools">
                                        <i class="fas fa-trash-restore text-info" style="font-size: 2rem"></i>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <p class="card-text">
                                        Se por acaso seja necessário resgatar uma atividade removida da lista, basta ativá-la novamente. Clique no botão <span class="text-info" style="font-size: 1rem"><i class="fas fa-trash-restore"></i> Re-ativar tarefa</span>, pesquisar por um nome próximo e ativá-la.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between mb-5 mt-0">
                        <div class="col-12">
                            <a href="{{ route('register') }}" class="btn btn-lg btn-outline-success btn-block">Cadastre-se agora</a>
                        </div>
                    </div>

                    <div class="row justify-content-between mb-5 mt-0">
                        <div class="col-12 ">
                            <h1 class="text-center">Mantenha-se organizado</h1>
                            <h3 class="mb-0">
                                Fique mais tranquilo tirando todas as tarefas do dia a dia da sua cabeça e colocando em uma lista de atividades. E o melhor: você pode acessar de qualquer dispositivo, onde você estiver.
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="main-footer" style="margin-left: 0px !important;">
                <div class="float-right d-none d-sm-block">
                    <b>V</b> 1.0.5
                </div>
                <strong>{{ env("app_name") }}</strong> All rights reserved.
            </footer>
        </div>
    </body>
</html>
