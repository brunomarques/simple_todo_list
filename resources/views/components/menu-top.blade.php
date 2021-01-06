<div uk-sticky="media: 960" class="uk-navbar-container tm-navbar-container uk-sticky uk-active uk-sticky-below uk-sticky-fixed shadow-sm">
    <div class="uk-container uk-container-expand">
        <nav class="uk-navbar" uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="#">{{ env("app_name") }}</a>
            </div>

            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li>
                        <a href="#">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="uk-navbar-dropdown uk-animation-toggle" uk-dropdown="pos: bottom-justify; offset: -10; animation: uk-animation-slide-top-small">
                            <ul class="uk-nav uk-navbar-dropdown-nav">
                                <li>
                                    <a href="#">
                                        <i class="far fa-user mr-3"></i> Meu perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="far fa-calendar-alt mr-3"></i> Calendário
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fas fa-envelope-open-text mr-3"></i> Mensagens
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-paper-plane mr-3"></i> Atividades
                                    </a>
                                </li>
                                <li class="uk-nav-divider"></li>
                                <li>
                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-door-open mr-3"></i> Sair
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
