@include('includes.header')

<section class="appointment" style="padding-top: 50px;">
    <div class="container">
        <h2 style="text-transform: none" class="text-center mb-4">Восстановление пароля</h2>
        <div class="row mb-5">
            <div class="col-lg-4 col-md-12 offset-sm-0 offset-lg-4">
                <form class="row g-3 needs-validation" method="POST" action="{{ route('password-send-link') }}" novalidate>
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

                    <div class="col-12">
                        <label for="yourUsername" class="form-label">Логин (адрес электронной почты)</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="email" name="email" class="form-control" id="yourUsername" value="{{ old('email') }}" placeholder="my-email@domain.ru" required>
                            <div class="invalid-feedback">Введите адрес электронной почты, который указывали при регистрации</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" style="text-transform: none" type="submit">Отправить ссылку для сброса пароля</button>
                    </div>
                    <div class="col-12">
                        <p class="small mb-0">Нет личного кабинета? <a href="{{ route('profile.create') }}">Станьте участником Олимпиады</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment -->



@include('includes.footer')