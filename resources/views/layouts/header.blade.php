<header class="header header-sticky p-0 mb-4">
    <div class="container-fluid px-4">
        <button class="header-toggler d-lg-none" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()" style="margin-inline-start: -14px;">
            <svg class="icon icon-lg">
                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
            </svg>
        </button>
        <form class="d-none d-sm-flex" role="search">
            <div class="input-group">
                <span class="input-group-text bg-body-secondary border-0 px-1" id="search-addon">
                    <svg class="icon icon-lg my-1 mx-2 text-body-secondary">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-search"></use>
                    </svg>
                </span>
                <input class="form-control bg-body-secondary border-0" type="text" placeholder="Search..." aria-label="Search" aria-describedby="search-addon" data-coreui-i18n="[placeholder]search">
            </div>
        </form>
        <ul class="header-nav d-none d-md-flex ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span class="d-inline-block my-1 mx-2 position-relative">
                        <svg class="icon icon-lg">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger rounded-circle"><span class="visually-hidden">New alerts</span></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg pt-0">
                    <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold rounded-top mb-2" data-coreui-i18n="notificationsCounter, { 'counter': 5 }">You have 5 notifications</div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2 text-success">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
                        </svg>
                        <span data-coreui-i18n="newUserRegistered">New user registered</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2 text-danger">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user-unfollow"></use>
                        </svg>
                        <span data-coreui-i18n="userDeleted">User deleted</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2 text-info">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-chart"></use>
                        </svg>
                        <span data-coreui-i18n="salesReportIsReady">Sales report is ready</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2 text-success">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-basket"></use>
                        </svg>
                        <span data-coreui-i18n="newClient">New client</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2 text-warning">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                        </svg>
                        <span data-coreui-i18n="serverOverloaded">Server overloaded</span>
                    </a>
                </div>
            </li> 
        </ul>
        <ul class="header-nav ms-auto ms-md-0">
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
             
            <li class="nav-item dropdown">
                <button class="btn btn-link nav-link" type="button" aria-expanded="false" data-coreui-toggle="dropdown">
                    <svg class="icon icon-lg theme-icon-active">
                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
                    </svg>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="light">
                            <svg class="icon icon-lg me-3">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-sun"></use>
                            </svg>
                            <span data-coreui-i18n="light">Light</span>
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center" type="button" data-coreui-theme-value="dark">
                            <svg class="icon icon-lg me-3">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-moon"></use>
                            </svg>
                            <span data-coreui-i18n="dark"> Dark</span>
                        </button>
                    </li>
                    <li>
                        <button class="dropdown-item d-flex align-items-center active" type="button" data-coreui-theme-value="auto">
                            <svg class="icon icon-lg me-3">
                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-contrast"></use>
                            </svg>
                            Auto
                        </button>
                    </li>
                </ul>
            </li>
            <li class="nav-item py-1">
                <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/8.jpg" alt="user@email.com"></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                <div class="dropdown-header text-body-secondary fw-semibold">{{ Auth::user()->name }}</div>
                    <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold" data-coreui-i18n="Settings">Settings</div>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg>
                        <span data-coreui-i18n="Profile">Profile</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <svg class="icon me-2">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                        </svg>
                        <span data-coreui-i18n="Logout">Logout</span>
                    </a>
                </div>
            </li>
        </ul> 
    </div>
</header>