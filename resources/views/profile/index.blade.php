@include('profile.includes.header')

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('profile.includes.aside')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">

            <nav class="navbar navbar-expand-lg navbar-light">
                <h5>Личный кабинет участника Всероссийской Олимпиады по туризму</h5>
                <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
            <!--  Row 1 -->
            <div class="row">
                <div class="col-lg-12 d-flex align-items-strech">
                    <div class="card w-100">
                        <div class="card-body">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                <div class="mb-3 mb-sm-0">
                                    <h5 class="card-title fw-semibold" style="font-size:36px">Данные профиля</h5>
                                </div>
                            </div>
                            <div class="mb-3 fw-semibold" style="font-size: 24px">ID пользователя: #{{ $user->id }}</div>
                            <h6 class="card-title fw-semibold pb-2 border-bottom mb-3">Участник</h6>
                            <div class="mb-3 fw-semibold">Имя: {{ $user->first_name }}</div>
                            <div class="mb-3 fw-semibold">Фамилия: {{ $user->last_name }}</div>
                            <div class="mb-3 fw-semibold">Класс/Группа: {{ $user->class_group }}</div>
                            <div class="mb-3 fw-semibold">Адрес электронной почты: {{ $user->email }}</div>
                            <div class="mb-3 fw-semibold">Страна: {{ $user->state }}</div>
                            @if(isset($user->region))
                                <div class="mb-3 fw-semibold">Субъект РФ: {{ $user->region }}</div>
                            @endif
                            @if(isset($user->municipality))
                                <div class="mb-3 fw-semibold">Муниципалитет: {{ $user->municipality }}</div>
                            @endif
                            <h6 class="card-title fw-semibold pb-2 border-bottom mb-3">Руководитель</h6>
                            <div class="mb-3 fw-semibold">ФИО руководителя: {{ $user->fio }}</div>
                            <div class="mb-3 fw-semibold">Должность руководителя: {{ $user->seat }}</div>
                            <div class="mb-3 fw-semibold">Адрес электронной почты руководителя: {{ $user->chief_email }}</div>
                            <div class="mb-3 fw-semibold">Наименование образовательной организации: {{ $user->org_name }}</div>
                            <div class="mb-3">
                                <a href="{{ route('profile.edit', ['user_id' => $user->id]) }}" class="btn btn-primary"><i class="ti ti-edit-circle"></i> Изменить данные</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Всероссийской Олимпиады по туризму (с международным участием) {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</div>
@include('profile.includes.footer')
