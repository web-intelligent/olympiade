<?php

use App\Http\Controllers\FakeTestController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RealTestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $meta = [
        'title' => 'Всероссийская туристско-краеведческая Олимпиада',
        'description' => 'Всероссийская туристско-краеведческая Олимпиада проводится с целью популяризация детско-юношеского туризма, вовлечения обучающихся в туристско-краеведческую деятельность, выявления и поддержки одаренных детей',
        'keywords' => 'Всероссийская туристско-краеведческая Олимпиада'
    ];
    return view('home', compact('meta'));
})->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::get('/регистрация', [UserController::class, 'create'])->name('profile.create');
    Route::post('/регистрация', [UserController::class, 'store'])->name('profile.store');
    Route::get('/авторизация', [UserController::class, 'authForm'])->name('login');
    Route::post('/авторизация', [UserController::class, 'authFormSubmit'])->name('profile.auth.submit');

});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/личный-кабинет', [UserController::class, 'profile'])->name('profile.index');
    Route::get('/редактировать-данные-профиля/{user_id}', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/редактировать-данные-профиля/{user_id}', [UserController::class, 'update'])->name('profile.update');
    Route::get('/выйти', [UserController::class, 'logout'])->name('profile.logout');

    // FAKE TEST
    Route::get('/пробное-тестирование', [FakeTestController::class, 'index'])->name('fake.test.index');
    Route::get('/тестирование', [RealTestController::class, 'index'])->name('real.test.index');
});

Route::post('/regions', [UserController::class, 'regions'])->name('get.regions');
Route::post('/municipality', [UserController::class, 'municipality'])->name('get.municipality');


Route::group(['prefix' => 'password', 'middleware' => 'guest'], function () {
    Route::get('/забыли-пароль', [PasswordController::class, 'index'])->name('password-forgot');
    Route::post('/забыли-пароль', [PasswordController::class, 'store'])->name('password-send-link');
    Route::get('/сброс-пароля', [PasswordController::class, 'reset'])->name('password.reset');
    Route::post('/сброс-пароля', [PasswordController::class, 'resetRequest'])->name('password.reset.request');
});
