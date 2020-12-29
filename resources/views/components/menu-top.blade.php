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
                <li class="icons d-none d-md-flex text-center" style="width: auto;">
                    <div class="user-img c-pointer-x">
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
            </ul>
        </div>
    </div>
</div>
