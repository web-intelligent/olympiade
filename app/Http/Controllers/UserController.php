<?php

namespace App\Http\Controllers;

use App\Services\AppService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /*
     * Форма регистрации пользователя
     * */
    public function create()
    {

        $meta = [
            'title' => 'Регистрация участников конкурса - Всероссийская Олимпиада по туризму',
            'keywords' => 'регистрация участников конкурса, Всероссийская олимпиада по туризму регистрация',
            'description' => 'Регистрация участников конкурса - Всероссийская Олимпиада по туризму',
        ];
        $states = AppService::$states;
        return view('registration', compact('meta', 'states'));
    }

    /*
     * Получение субъектов РФ
     * */
    public function regions(Request $request)
    {
        if($request->ajax()) {
            if($request->region == 'get') {
                $regions = DB::table('region_municipality')->distinct(['region'])->get('region');

                return view('ajax.regions', compact('regions'))->render();
            }
        }
    }

    /*
     * Получение муниципалитетов по субъекту РФ
     * */
    public function municipality(Request $request)
    {
        if($request->ajax()) {
            $muns = DB::table('region_municipality')
                ->where('region', '=', $request->region)
                ->orderBy('municipality')
                ->get('municipality');

            return view('ajax.municipality', compact('muns'))->render();
        }
    }

    /*
     * Регистрация пользователя
     * */
    public function store(Request $request)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'password' => [
                    'required', 'min:8', 'max:25', 'confirmed'
                ],

                'email' => [
                    'required', 'max:55', 'min:5', 'email', 'unique:users'
                ],
                'chief_email' => [
                    'required', 'max:55', 'min:5', 'email'
                ],
                'first_name' => [
                    'required', 'max:55', 'min:1', 'string'
                ],
                'last_name' => [
                    'required', 'max:55', 'min:1', 'string'
                ],
                'fio' => [
                    'required', 'max:255', 'min:1', 'string'
                ],
                'org_name' => [
                    'required', 'max:355', 'min:1', 'string'
                ],
                'region' => [
                    'nullable', 'max:55', 'min:10', 'string'
                ],
                'municipality' => [
                    'nullable', 'max:100', 'min:10', 'string'
                ],
                'state' => [
                    'required', 'max:100', 'min:1', 'string'
                ],
                'seat' => [
                    'required', 'max:100', 'min:1', 'string'
                ],
                'class_group' => [
                    'required', 'max:55', 'min:1', 'string'
                ],
                'accept' => [
                    'accepted'
                ],

            ],
            // Сообщения об ошибках валидации
            [

                'email.required' => 'Укажите адрес электронной почты',
                'email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'email.max' => 'Адрес электронной почты должен содержать не более 55 символов',
                'email.email' => 'Адрес электронной почты указан неверно',
                'email.unique' => 'Указанный адрес электронной почты уже зарегистрирован',

                'chief_email.required' => 'Укажите адрес электронной почты',
                'chief_email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'chief_email.max' => 'Адрес электронной почты должен содержать не более 55 символов',
                'chief_email.email' => 'Адрес электронной почты указан неверно',

                'first_name.required' => 'Укажите имя',
                'first_name.max' => 'Имя не должно содержать более 55 символов',
                'first_name.min' => 'Имя не должно содержать менее 1 символов',
                'first_name.string' => 'Указан неверный формат имени',

                'last_name.required' => 'Укажите фамилию',
                'last_name.max' => 'Поле "Фамилия" не должно содержать более 55 символов',
                'last_name.min' => 'Поле "Фамилия" не должно содержать менее 1 символов',
                'last_name.string' => 'Указан неверный формат фамилии',

                'fio.required' => 'Укажите ФИО',
                'fio.max' => 'Поле "ФИО" не должно содержать более 255 символов',
                'fio.min' => 'Поле "ФИО" не должно содержать менее 1 символов',
                'fio.string' => 'Указан неверный формат фамилии',

                'org_name.required' => 'Укажите наименование организации',
                'org_name.max' => 'Поле "Наименование организации" не должно содержать более 355 символов',
                'org_name.min' => 'Поле "Наименование организации" не должно содержать менее 1 символов',
                'org_name.string' => 'Указан неверный формат наименования организации',

                'region.max' => 'Поле "Субъект РФ" не должно содержать более 55 символов',
                'region.min' => 'Поле "Субъект РФ" не должно содержать менее 1 символов',
                'region.string' => 'Указан неверный формат наименования субъекта РФ',

                'municipality.max' => 'Поле "Муниципалитет" не должно содержать более 100 символов',
                'municipality.min' => 'Поле "Муниципалитет" не должно содержать менее 1 символов',
                'municipality.string' => 'Указан неверный формат наименования муниципалитета',


                'state.required' => 'Поле "Укажите страну" обязательно для заполнения',
                'state.max' => 'Поле "Укажите страну" не должно содержать более 100 символов',
                'state.min' => 'Поле "Укажите страну" не должно содержать менее 1 символов',
                'state.string' => 'Указан неверный формат поля "Укажите страну"',

                'seat.required' => 'Поле "Должность руководителя" обязательно для заполнения',
                'seat.max' => 'Поле "Должность руководителя" не должно содержать более 100 символов',
                'seat.min' => 'Поле "Должность руководителя" не должно содержать менее 1 символов',
                'seat.string' => 'Указан неверный формат поля "Должность руководителя"',

                'class_group.required' => 'Поле "Класс/Группа" обязательно для заполнения',
                'class_group.max' => 'Поле "Класс/Группа" не должно содержать более 100 символов',
                'class_group.min' => 'Поле "Класс/Группа" не должно содержать менее 1 символов',
                'class_group.string' => 'Указан неверный формат поля "Класс/Группа"',

                'password.required' => 'Укажите пароль',
                'password.confirmed' => 'Пароли не совпадают',
                'password.min' => 'Пароль должен содержать не менее 8 символов',
                'password.max' => 'Пароль должен содержать не более 25 символов',

                'accept.accepted' => 'Необходимо дать согласие на обработку персональных данных',

            ]

        )->validate();

        $user = \App\Models\User::create([
            'email' => $request->email,
            'chief_email' => $request->chief_email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'fio' => $request->fio,
            'org_name' => $request->org_name,
            'region' => $request->region,
            'municipality' => $request->municipality,
            'state' => $request->state,
            'seat' => $request->seat,
            'class_group' => $request->class_group,
            'password' => Hash::make($request->password),
        ]);

        if($user) return redirect()->route('login')->with('success', 'Регистрация прошла успешно, авторизуйтесь, чтобы войти в личный кабинет');
        return redirect()->back()->with('wrong', 'Зарегистрироваться не удалось, повторите попытку или обратитесь в службу поддержки');

    }

    /*
     * Страница авторизации пользователя
     * */
    public function authForm()
    {
        // Проверим если авторизован, перенаправим в личный кабинет
//        if(Auth::check()) {
//            return redirect()->route('profile.auth'); // не создан маршрут
//        }

        $meta = [
            'title' => 'Авторизация пользователя',
            'description' => 'Страница авторизации пользователя',
            'keywords' => 'авторизация пользователя'
        ];

        return view('authorisation', compact('meta'));
    }

    /*
     * Отправка данных для авторизации пользователя
     * */
    public function authFormSubmit(Request $request)
    {
        $valid_fields = [
            'password' => [
                'required', 'min:8', 'max:25'
            ],
            'email' => [
                'required', 'max:55', 'min:5', 'email'
            ],
        ];
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила

            $valid_fields,

            // Сообщения об ошибках валидации
            [
                'password.required' => 'Укажите пароль',
                'password.min' => 'Пароль должен содержать не менее 8 символов',
                'password.max' => 'Пароль должен содержать не более 25 символов',

                'email.required' => 'Укажите адрес электронной почты',
                'email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'email.max' => 'Адрес электронной почты должен содержать не более 55 символов',
                'email.email' => 'Адрес электронной почты указан неверно',

            ]

        )->validate();

        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->filled('remember'))) {

            // Установка куки запоминания, если выбрана опция "Remember Me"
            if ($request->filled('remember')) {
                Auth::user()->setRememberToken(Str::random(60));
                Auth::user()->save();

                $rememberToken = Auth::user()->getRememberToken();
                Cookie::queue('remember_token', $rememberToken, 43200); // Продолжительность куки - 30 дней
            }

            session()->flash('success', 'Вы авторизовались успешно');
            return redirect()->route('profile.index');
        }

        return redirect()->back()->with('wrong', 'Неверный логин или пароль');

    }

    /*
    *   Выход пользователя
    * */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    /*
     * Личный кабинет пользователя
     * */
    public function profile()
    {

        $meta = [
            'title' => 'Личный кабинет пользователя - Всероссийская Олимпиада по туризму',
            'description' => 'Личный кабинет пользователя - Всероссийская Олимпиада по туризму',
            'keywords' => 'Личный кабинет пользователя - Всероссийская Олимпиада по туризму',
        ];

        $user = Auth::user();

        return view('profile.index', compact('meta', 'user'));
    }

    /*
     * Форма редактирования данных профиля
     * */
    public function edit($user_id)
    {
        $meta = ['title' => 'Редактирование данных профиля - Всероссийская Олимпиада по туризму'];

        $user = \App\Models\User::find($user_id);
        $states = AppService::$states;
        $regions = DB::table('region_municipality')->distinct('region')->get('region');
        $municipalities = DB::table('region_municipality')->where('region', '=', $user->region)->get('municipality');


        return view('profile.edit', compact('meta', 'user', 'states', 'regions', 'municipalities'));
    }

    /*
     * Отправка данных для редактирования
     * */
    public function update(Request $request, $user_id)
    {
        //Валидация
        Validator::make(
            $request->all(),
            // Валидационные правила
            [
                'email' => [
                    'required', 'max:55', 'min:5', 'email',
                ],
                'chief_email' => [
                    'required', 'max:55', 'min:5', 'email'
                ],
                'first_name' => [
                    'required', 'max:55', 'min:1', 'string'
                ],
                'last_name' => [
                    'required', 'max:55', 'min:1', 'string'
                ],
                'fio' => [
                    'required', 'max:255', 'min:1', 'string'
                ],
                'org_name' => [
                    'required', 'max:355', 'min:1', 'string'
                ],
                'region' => [
                    'nullable', 'max:55', 'min:10', 'string'
                ],
                'municipality' => [
                    'nullable', 'max:100', 'min:10', 'string'
                ],
                'state' => [
                    'required', 'max:100', 'min:1', 'string'
                ],
                'seat' => [
                    'required', 'max:100', 'min:1', 'string'
                ],
                'class_group' => [
                    'required', 'max:55', 'min:1', 'string'
                ],

            ],
            // Сообщения об ошибках валидации
            [

                'email.required' => 'Укажите адрес электронной почты',
                'email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'email.max' => 'Адрес электронной почты должен содержать не более 55 символов',
                'email.email' => 'Адрес электронной почты указан неверно',

                'chief_email.required' => 'Укажите адрес электронной почты',
                'chief_email.min' => 'Адрес электронной почты должен содержать не менее 5 символов',
                'chief_email.max' => 'Адрес электронной почты должен содержать не более 55 символов',
                'chief_email.email' => 'Адрес электронной почты указан неверно',

                'first_name.required' => 'Укажите имя',
                'first_name.max' => 'Имя не должно содержать более 55 символов',
                'first_name.min' => 'Имя не должно содержать менее 1 символов',
                'first_name.string' => 'Указан неверный формат имени',

                'last_name.required' => 'Укажите фамилию',
                'last_name.max' => 'Поле "Фамилия" не должно содержать более 55 символов',
                'last_name.min' => 'Поле "Фамилия" не должно содержать менее 1 символов',
                'last_name.string' => 'Указан неверный формат фамилии',

                'fio.required' => 'Укажите ФИО',
                'fio.max' => 'Поле "ФИО" не должно содержать более 255 символов',
                'fio.min' => 'Поле "ФИО" не должно содержать менее 1 символов',
                'fio.string' => 'Указан неверный формат фамилии',

                'org_name.required' => 'Укажите наименование организации',
                'org_name.max' => 'Поле "Наименование организации" не должно содержать более 355 символов',
                'org_name.min' => 'Поле "Наименование организации" не должно содержать менее 1 символов',
                'org_name.string' => 'Указан неверный формат наименования организации',

                'region.max' => 'Поле "Субъект РФ" не должно содержать более 55 символов',
                'region.min' => 'Поле "Субъект РФ" не должно содержать менее 1 символов',
                'region.string' => 'Указан неверный формат наименования субъекта РФ',

                'municipality.max' => 'Поле "Муниципалитет" не должно содержать более 100 символов',
                'municipality.min' => 'Поле "Муниципалитет" не должно содержать менее 1 символов',
                'municipality.string' => 'Указан неверный формат наименования муниципалитета',


                'state.required' => 'Поле "Укажите страну" обязательно для заполнения',
                'state.max' => 'Поле "Укажите страну" не должно содержать более 100 символов',
                'state.min' => 'Поле "Укажите страну" не должно содержать менее 1 символов',
                'state.string' => 'Указан неверный формат поля "Укажите страну"',

                'seat.required' => 'Поле "Должность руководителя" обязательно для заполнения',
                'seat.max' => 'Поле "Должность руководителя" не должно содержать более 100 символов',
                'seat.min' => 'Поле "Должность руководителя" не должно содержать менее 1 символов',
                'seat.string' => 'Указан неверный формат поля "Должность руководителя"',

                'class_group.required' => 'Поле "Класс/Группа" обязательно для заполнения',
                'class_group.max' => 'Поле "Класс/Группа" не должно содержать более 100 символов',
                'class_group.min' => 'Поле "Класс/Группа" не должно содержать менее 1 символов',
                'class_group.string' => 'Указан неверный формат поля "Класс/Группа"',

            ]

        )->validate();

        $user = \App\Models\User::where('id', $user_id)->update([
            'email' => $request->email,
            'chief_email' => $request->chief_email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'fio' => $request->fio,
            'org_name' => $request->org_name,
            'region' => $request->region,
            'municipality' => $request->municipality,
            'state' => $request->state,
            'seat' => $request->seat,
            'class_group' => $request->class_group,
        ]);

        if($user) return redirect()->route('profile.index')->with('success', 'Данные профиля обновлены успешно');
        return redirect()->back()->with('wrong', 'Что-то пошло не так, попробуйте ещё раз или обратитесь в службу поддержки');
    }

}
