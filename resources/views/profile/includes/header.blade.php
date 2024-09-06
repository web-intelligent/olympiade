<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $meta['title'] }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/assets/img/icon-1.png') }}" />
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/profile/assets/css/my_style.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
@if(session()->has('success'))
    <div class="response-message bg-success">
        {{ session('success') }}
        <br>
        <div style="font-size: 10px">Нажмите, чтобы скрыть</div>
    </div>
@endif
@if(session()->has('wrong'))
    <div class="response-message bg-danger">
        {{ session('wrong') }}
        <br>
        <div style="font-size: 10px">Нажмите, чтобы скрыть</div>
    </div>
@endif
<!--  Body Wrapper -->
