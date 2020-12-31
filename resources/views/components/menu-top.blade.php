<nav class="main-header navbar navbar-expand navbar-dark navbar-gray-dark" style="margin-left: 0px !important;">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <span class="nav-link">
                <b>{{ env("app_name") }}</b>
            </span>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">{{ Auth::user()->name }}</a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <a href="javascript:void()" class="dropdown-item">
                        <div class="media">
                            <i class="far fa-user"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title"> My Profile</h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void()" class="dropdown-item">
                        <div class="media">
                            <i class="far fa-calendar-alt"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title"> My Calender</h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void()" class="dropdown-item">
                        <div class="media">
                            <i class="fas fa-envelope-open-text"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    My Inbox
                                    <span class="float-right text-sm">
                                        <div class="badge gradient-3 badge-pill badge-primary">3</div>
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void()" class="dropdown-item">
                        <div class="media">
                            <i class="fa fa-paper-plane"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    My Tasks
                                    <span class="float-right text-sm">
                                        <div class="badge badge-pill bg-dark">3</div>
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="javascript:void()" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="media">
                            <i class="fas fa-door-open"></i>
                            <div class="media-body">
                                <h3 class="dropdown-item-title">Sair</h3>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
    </ul>
</nav>
