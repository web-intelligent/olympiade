<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FakeTestController extends Controller
{
    /*
     * Страница теста
     * */
    public function index()
    {
        $meta = [
            'title' => 'Пробное тестирование - Всероссийская Олимпиада по туризму'
        ];
        return view('profile.tests.fake.index', compact('meta'));
    }
}
