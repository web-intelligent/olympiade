<!doctype html>
<html class="no-js" lang="ru">
<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="@if(isset($meta['keywords'])) {{ $meta['keywords'] }} @else Всероссийская Олимпиада по туризму (с международным участием) 2024 @endif">
    <meta name="description" content="@if(isset($meta['description'])) {{ $meta['description'] }} @else Всероссийская Олимпиада по туризму (с международным участием) 2024 @endif">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{ $meta['title'] }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('public/assets/img/icon-1.png') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/my-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/bootstrap.min.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/nice-select.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/font-awesome.min.css') }}">
    <!-- icofont CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/icofont.css') }}">
    <!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/slicknav.min.css') }}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/owl-carousel.css') }}">
    <!-- Datepicker CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/datepicker.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/animate.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/magnific-popup.css') }}">

    <!-- Medipro CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/responsive.css') }}">

    {{-- Style By web-intyelligent--}}
    <link rel="stylesheet" href="{{ asset('public/assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/my-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/my-style.css') }}">

</head>
<style>
    * {
        text-transform: none !important;
    }
</style>
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

<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>

        <div class="indicator">
            <i class="fa-solid fa-compass text-white"></i>
        </div>
    </div>
</div>
<!-- End Preloader -->

<!-- Get Pro Button -->
<ul class="pro-features">
    <a class="get-pro" href="#">Инфо</a>
    <li class="big-title">Регистрируясь, вы даёте разрешение на:</li>
    <li>- Обработку и хранение внесенных данных, в том числе и персональных данных</li>
    <li>- Размещение и использование сведений о проведении мероприятия с целью информационного сопровождения Финала Олимпиады на официальном сайте ФГБУ «ФЦОМОФВ»</li>
    <li>- Публикацию результатов проведения Финала Олимпиады на официальном сайте ФГБУ «ФЦОМОФВ» https://еип-фкис.рф/детско-юношеский-туризм-олимпиада/, а также в официальной группе организации в социальных сетях ВКонтакте.х</li>
    <div class="button">
        <a href="" target="_blank" class="btn" style="background: #1A76D1">Политика обработки ПД</a>
{{--        <a href="" target="_blank" class="btn">Buy Pro Version</a>--}}
    </div>
</ul>

<!-- Header Area -->
<header class="header" >
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-5 col-12">
                    <!-- Contact -->
                    <ul class="top-link p-0 wavifun_top-link">
                        <li><a href="https://edu.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/1.png" alt=""></a></li>
                        <li><a href="http://minsport.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/2.png" alt=""></a></li>
                        <li><a href="https://rosstat.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/3.png" alt=""></a></li>
                        <li><a href="https://www.rospotrebnadzor.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/4.png" alt=""></a></li>
                        <li><a href="https://minzdrav.gov.ru" target="_blank"><img src="https://еип-фкис.рф/wp-content/global_scripts/new_design/images/5.png" alt=""></a></li>

{{--                        <li><a href="#">Общие положение</a></li>--}}
{{--                        <li><a href="#">Руководство</a></li>--}}
{{--                        <li><a href="#">Doctors</a></li>--}}
{{--                        <li><a href="#">Contact</a></li>--}}
{{--                        <li><a href="#">FAQ</a></li>--}}
                    </ul>
                    <!-- End Contact -->
                </div>
                <div class="col-lg-6 col-md-7 col-12">
                    <!-- Top Contact -->
                    <ul class="top-contact">
{{--                        <li><i class="fa fa-phone"></i>+7 (904) 829-94-35</li>--}}
                        <li><i class="fa fa-envelope"></i><a href="mailto:contact@еип-фкис.рф">contact@еип-фкис.рф</a></li>
                    </ul>
                    <!-- End Top Contact -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-12">
                        <!-- Start Logo -->
                        <div class="logo">
                            <a href="{{ route('home') }}"><img style="width: 170px; object-fit: contain" src="{{ asset('public/assets/img/logo-4.png') }}" alt=""></a>
                        </div>
                        <!-- End Logo -->
                        <!-- Mobile Nav -->
                        <div class="mobile-nav"></div>
                        <!-- End Mobile Nav -->
                    </div>
                    <div class="col-lg-7 col-md-9 col-12">
                        <!-- Main Menu -->
                        <div class="main-menu">
                            <nav class="navigation">
                                <ul class="nav menu">
{{--                                    <li class="active"><a href="{{ route('home') }}">Главная</a></li>--}}
                                    <li><a href="{{ route('home') }}">Главная</a></li>
                                    <li ><a href="{{ route('home') }}#stages">Этапы</a></li>
                                    <li ><a href="{{ route('home') }}#partaker">Участники</a></li>
{{--                                    <li><a href="#">Программа <i class="icofont-rounded-down"></i></a>--}}
{{--                                        <ul class="dropdown">--}}
{{--                                            <li><a href="404.html">404 Error</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#">Награждение <i class="icofont-rounded-down"></i></a>--}}
{{--                                        <ul class="dropdown">--}}
{{--                                            <li><a href="blog-single.html">Blog Details</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
                                    <li ><a href="{{ route('profile.index') }}">Личный кабинет</a></li>
                                    <li ><a href="{{ route('home') }}#support">Поддержка</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--/ End Main Menu -->
                    </div>
                    <div class="col-lg-2 col-12">
                        <div class="get-quote">
                            <a href="{{ route('profile.create') }}" class="btn" style="background: #1A76D1; color: #fff; text-transform: none">Принять участие</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!-- End Header Area -->
