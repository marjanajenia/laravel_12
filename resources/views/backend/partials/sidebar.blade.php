<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <!-- SETTING MENU -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span key="t-setting">Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('setting.index') }}" class="waves-effect">
                                <span key="t-all-device">Other Setting</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#" class="waves-effect">
                                <span key="t-create-device">Create Device</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- User MENU -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-group"></i>
                        <span key="t-user">User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bx-lock"></i>
                                <span key="t-role">All Role</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#" class="waves-effect">
                                <span key="t-create-tutorial">Create Tutorial</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- BOOKS MENU -->
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-book-content"></i>
                        <span key="t-books">Books</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="#" class="waves-effect">
                                <span key="t-create-book">Create Book</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
