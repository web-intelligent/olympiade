@include('profile.includes.header')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('home') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                <img src="{{ asset('public/assets/img/logo-4.png') }}" width="180" alt="">
                            </a>
                            <p class="text-center">Всероссийская Олимпиада по туризму</p>
                            <form action="{{ route('profile.auth.submit') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="response-message bg-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <small style="font-size: 10px" class="text-white">Нажмите, чтобы скрыть</small>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Логин *</label>
                                    <input name="email" value="{{ old('email') }}" required placeholder="Адрес электронной почты" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <small class="text-secondary">Адрес электронной почты, указанный при регистрации</small>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Пароль *</label>
                                    <input placeholder="*************" name="password" required type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value="1" name="remember" id="flexCheckChecked">
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Запомнить меня
                                        </label>
                                    </div>
                                    <a class="text-primary fw-bold" href="{{ route('password-forgot') }}">Забыли пароль?</a>
                                </div>
                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Авторизоваться</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-bold">Нет личного кабинета?</p>
                                    <a class="text-primary fw-bold ms-2" href="{{ route('profile.create') }}">Зарегистрируйтесь</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('profile.includes.footer')
