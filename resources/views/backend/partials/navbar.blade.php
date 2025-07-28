<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('backend') }}/assets/images/logo.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-dark.png" alt="" height="17">
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('backend') }}/assets/images/logo-light.svg" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('backend') }}/assets/images/logo-light.png" alt="" height="19">
                    </span>
                </a>
            </div>

            <button type="button" class="px-3 btn btn-sm font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="p-0 dropdown-menu dropdown-menu-lg dropdown-menu-end"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="m-0 form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i
                                            class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Language -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img id="header-lang-img" src="{{ asset('backend') }}/assets/images/flags/us.jpg"
                        alt="Header Language" height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="en">
                        <img src="{{ asset('backend') }}/assets/images/flags/us.jpg" alt="user-image" class="me-1"
                            height="12"> <span class="align-middle">English</span>
                    </a>
                </div>
            </div>
            <!-- notifications -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="position-relative">
                        <i class="bx bx-bell bx-tada fs-22"></i>

                        @if(auth()->user()->unreadNotifications->count())
                            <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        @endif
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0" key="t-notifications"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small" key="t-view-all"> View All</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <a href="{{ $notification->data['url'] }}" class="text-reset notification-item notification-click" data-id="{{ $notification->id }}">
                                <div class="d-flex">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title bg-primary rounded-circle font-size-16">
                                            <i class="bx {{ $notification->data['icon'] }}"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $notification->data['title'] }}</h6>
                                        <div class="font-size-12 text-muted">
                                            <p class="mb-1">{{ $notification->data['body'] }}</p>
                                            <p class="mb-0"><i class="mdi mdi-clock-outline"></i>
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="text-center text-muted p-3">
                                No new notifications
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- notifications end -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ asset('backend') }}/assets/images/users/avatar-1.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">Henry</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="#"><i class="align-middle bx bx-user font-size-16 me-1"></i>
                        <span key="t-profile">Profile</span></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href=""
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="align-middle bx bx-power-off font-size-16 me-1 text-danger"></i> <span
                            key="t-logout">Logout</span></a>
                    <form class="d-none" id="logout-form" action="" method="POST">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
