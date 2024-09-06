<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="text-nowrap logo-img">
                <img src="{{ asset('public/assets/img/logo-4.png')}}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Кабинет</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('profile.index') }}">
                        <span>
                          <i class="ti ti-user-circle"></i>
                        </span>
                        <span class="hide-menu">Профиль</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('profile.logout') }}">
                        <span>
                          <i class="ti ti-door-exit"></i>
                        </span>
                        <span class="hide-menu">Вытий</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Задания</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('fake.test.index') }}">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                        <span class="hide-menu">Пробное тестирование</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('real.test.index') }}">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Тестирование</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
