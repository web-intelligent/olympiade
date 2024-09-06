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
                                    <h5 class="card-title fw-semibold" style="font-size:36px">Редактирование данных профиля</h5>
                                </div>
                            </div>
                            <form action="{{ route('profile.update', ['user_id' => $user->id]) }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="response-message bg-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <small style="font-size: 12px" class="text-white">Нажмите, чтобы скрыть</small>
                                    </div>
                                @endif
                                <div class="mb-3 fw-semibold" style="font-size: 24px">ID пользователя: #{{ $user->id }}</div>
                                <h6 class="card-title fw-semibold pb-2 border-bottom mb-3">Участник</h6>

                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Имя *</div>
                                            <input required placeholder="Иван" class="form-control" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Фамилия *</div>
                                            <input required placeholder="Иванов" class="form-control" type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Класс/Группа *</div>
                                            <input required placeholder="11" class="form-control" type="text" name="class_group" value="{{ old('class_group', $user->class_group) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Адрес электронной почты *</div>
                                            <input required placeholder="11" class="form-control" type="text" name="email" value="{{ old('email', $user->email) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Страна *</div>
                                           <select required class="form-select" name="state">
                                               @foreach($states as $state)
                                                   <option @if($state == old('state', $user->state)) selected @endif value="{{ $state }}">{{ $state }}</option>
                                               @endforeach
                                           </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="appends">
                                    <div class="row">
                                        @if(isset($user->region))
                                            <div class="col-sm-12 col-lg-6 set_region">
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Субъект РФ *</div>
                                                    <select required class="form-select" name="region">
                                                        @foreach($regions as $region)
                                                            <option @if($region->region == old('region', $user->region)) selected @endif value="{{ $region->region }}">{{ $region->region }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                        @if(isset($user->municipality))
                                            <div class="col-sm-12 col-lg-6 set_municipality">
                                                <div class="mb-3">
                                                    <div class="mb-2 fw-bold">Муниципалитет *</div>
                                                    <select required class="form-select" name="municipality">
                                                        @foreach($municipalities as $municipality)
                                                            <option @if($municipality->municipality == old('region', $user->municipality)) selected @endif value="{{ $municipality->municipality }}">{{ $municipality->municipality }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <h6 class="card-title fw-semibold pb-2 border-bottom mb-3">Руководитель</h6>
                                <div class="row">
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">ФИО руководителя *</div>
                                            <input required placeholder="Иванов Иван Иванович" class="form-control" type="text" name="fio" value="{{ old('fio', $user->fio) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Должность руководителя *</div>
                                            <input required placeholder="Учитель" class="form-control" type="text" name="seat" value="{{ old('seat', $user->seat) }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-6">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Адрес электронной почты руководителя *</div>
                                            <input required placeholder="contact@mail.ru" class="form-control" type="text" name="chief_email" value="{{ old('chief_email', $user->chief_email) }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <div class="mb-2 fw-bold">Наименование образовательной организации *</div>
                                            <textarea required placeholder="Муниципальное бюджетное образовательное учреждение «Звонаревокутская средняя общеобразовательная школа»" class="form-control" name="org_name">{{ old('org_name', $user->org_name) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <small class="text-secondary">* - Поля, обязательные для заполнения</small>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary"><i class="ti ti-edit-circle"></i> Редактировать данные</button>
                                </div>

                            </form>
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
