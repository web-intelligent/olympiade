<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RealTestController extends Controller
{
    /*
     * Страница теста
     * */
    public function index()
    {
        $meta = [
            'title' => 'Тестирование - Всероссийская Олимпиада по туризму'
        ];
        return view('profile.tests.real.index', compact('meta'));
    }
}
