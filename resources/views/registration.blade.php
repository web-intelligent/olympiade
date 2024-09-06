@include('includes.header')

<section class="appointment" style="padding-top: 50px;">
    <div class="container">
        <h2 style="text-transform: none" class="text-center mb-4">Регистрация участников конкурса</h2>
        <div class="row mb-5">
            <div class="col-lg-8 col-md-12 offset-sm-0 offset-lg-2">
                <form action="{{ route('profile.store') }}" method="POST">
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
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Укажите страну *</div>
                                <select required name="state" class="form-select">
                                    <option value="">Выберите страну</option>
                                    @foreach($states as $state)
                                        <option @if(old('state') == $state) selected @endif value="{{ $state }}">{{ $state }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="appends"><div class="row"></div></div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Наименование образовательной организации *</div>
                                <textarea required name="org_name" class="form-control" rows="5" placeholder="Муниципальное бюджетное образовательное учреждение «Средняя общеобразовательная школа №5»">{{ old('org_name') }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="pb-2 border-bottom mb-3">Участник</h5>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Имя *</div>
                                <input required type="text" class="form-control" placeholder="Иван" name="first_name" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Фамилия *</div>
                                <input required type="text" class="form-control" placeholder="Иванов" name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Класс/Группа *</div>
                                <input required type="text" class="form-control" placeholder="Класс/Группа" name="class_group" value="{{ old('class_group') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Адрес электронной почты *</div>
                                <input required type="email" class="form-control" placeholder="contact@domain.ru" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <h5 class="pb-2 border-bottom mb-3">Руководитель</h5>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">ФИО *</div>
                                <input required type="text" class="form-control" placeholder="Иван Иван Иванович" name="fio" value="{{ old('fio') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Должность руководителя *</div>
                                <input required type="text" class="form-control" placeholder="Учитель ..." name="seat" value="{{ old('seat') }}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6">
                            <div class="mb-3">
                                <div class="mb-2 fw-bold">Адрес электронной почты руководителя *</div>
                                <input required type="email" class="form-control" placeholder="contact@domain.ru" name="chief_email" value="{{ old('chief_email') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-3">
                                    <div class="mb-2 fw-bold">Придумайте надёжный пароль *</div>
                                    <input value="{{ old('password') }}" type="password" name="password" class="form-control" required placeholder="Пароль">
                                    <small class="text-secondary">Пароль должен содержать не менее 8 символов</small>
                                    <div class="valid-feedback">
                                        Пароль указан
                                    </div>
                                    <div class="invalid-feedback">
                                        Укажите пароль
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="mb-3">
                                    <div class="mb-2 fw-bold">Повторите пароль *</div>
                                    <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" class="form-control" required placeholder="Пароль ещё раз">
                                    <small class="text-secondary">Пароль должен содержать не менее 8 символов</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <div class="form-check">
                                    <input required class="form-check-input" type="checkbox" id="approve_info_working" name="accept">
                                    <label class="form-check-label" for="approve_info_working">
                                        Просим подтвердить согласие на обработку <a target="_blank" href="https://еип-фкис.рф/обработка-пд/">персональных данных</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <small class="text-secondary">* - Поля, обязательные для заполнения</small>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment -->



@include('includes.footer')
