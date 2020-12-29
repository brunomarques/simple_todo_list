<!DOCTYPE html>
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

    <body>
        <div id="preloader">
            <div class="loader"></div>
        </div>

        <div class="main-wrapper">
            <div class="nav-header">
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
                            @if (Route::has('login'))
                                @auth
                                    <li class="icons d-none d-md-flex" style="width: 120px">
                                        <a href="{{ url('/home') }}" class="text-sm">Início</a>
                                    </li>
                                @else
                                    <li class="icons d-none d-md-flex" style="width: 70px;">
                                        <a href="{{ route('login') }}" class="text-sm">Login</a>
                                    </li>

                                    @if (Route::has('register'))
                                        <li class="icons d-none d-md-flex text-center" style="width: 70px;">
                                            <a href="{{ route('register') }}" class="text-sm">Registrar</a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="content-body" style="margin-left: 0px !important;">
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="card-title">Criar tarefa</h4>
                                        </div>
                                        <div class="col-xl-6 text-right">
                                            <i class="fas fa-plus text-success" style="font-size: 1rem"></i>
                                        </div>
                                    </div>
                                    <p class="card-text">
                                        Para inserir uma tarefa é bem simples. Basta clicar no botão <span class="text-success" style="font-size: 1rem"><i class="fas fa-plus"></i> Nova atividade</span> e seguir as instruções da tela.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('register') }}" class="card-link float-right">Cadastre-se agora</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="card-title">Alterar tarefa</h4>
                                        </div>
                                        <div class="col-xl-6 text-right">
                                            <i class="fas fa-pencil-alt text-warning" style="font-size: 1rem"></i>
                                        </div>
                                    </div>
                                    <p class="card-text">
                                        Uma vez criada a atividade, ela será exibida em sua lista de atividades. Passando o mouse sobre qualquer linha fará com que o ícone de edição <i class="fas fa-pencil-alt text-warning" style="font-size: 1rem"></i> apareça, permitindo que você clique e altere facilmente.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('register') }}" class="card-link float-right">Cadastre-se agora</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-5">
                        <div class="col-xl-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="card-title">Excluir tarefa</h4>
                                        </div>
                                        <div class="col-xl-6 text-right">
                                            <i class="fas fa-trash text-danger" style="font-size: 1rem"></i>
                                        </div>
                                    </div>
                                    <p class="card-text">
                                        Assim como o Alterar Tarefa, passando o mouse sobre qualquer linha fará com que o ícone de exclusão <i class="fas fa-trash text-danger" style="font-size: 1rem"></i> apareça, permitindo que você remova uma atividade de sua lista facilmente.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('register') }}" class="card-link float-right">Cadastre-se agora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-6">
                                            <h4 class="card-title">Resgatar tarefa</h4>
                                        </div>
                                        <div class="col-xl-6 text-right">
                                            <i class="fas fa-trash-restore text-info" style="font-size: 1rem"></i>
                                        </div>
                                    </div>
                                    <p class="card-text">
                                        Se por acaso seja necessário resgatar uma atividade removida da lista, basta ativá-la novamente. Clique no botão <span class="text-info" style="font-size: 1rem"><i class="fas fa-trash-restore"></i> Re-ativar tarefa</span>, pesquisar por um nome próximo e ativá-la.
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('register') }}" class="card-link float-right">Cadastre-se agora</a>
                                </div>
                            </div>
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

            <div class="footer" style="padding-left: 0px !important;">
                <div class="copyright">
                    <p>{{ env("app_name") }} (v1.0.0)</p>
                </div>
            </div>
        </div>

        <script src="{{ asset("plugins/common/common.min.js") }}"></script>
        <script src="{{ asset("js/custom.min.js") }}"></script>
        <script src="{{ asset("js/settings.js") }}"></script>
        <script src="{{ asset("js/quixnav.js") }}"></script>
    </body>
</html>
