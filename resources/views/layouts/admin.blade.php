<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SRM">
    <meta name="generator" content="Jekyll v3.8.5">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CRM</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="{{ asset('css/form-validation.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.datetimepicker.css') }}" rel="stylesheet">

    <!-- Bootstrap core JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{ asset('js/JQueryPlag/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('js/JQueryPlag/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('js/JQueryPlag/jquery.serialize-object.min.js') }}"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .table td, .table th {
            border-left: 1px solid #dee2e6;
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <style type="text/css">/* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
</head>
<body>
{{--<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">--}}
    {{--<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">CRM Evil</a>--}}
    {{--<input class="form-control form-control-dark w-100" type="text" id="search"--}}
           {{--placeholder="Поиск: Название компании, ИНН, Город">--}}
    {{--<ul class="navbar-nav px-1">--}}
        {{--<li class="nav-item text-nowrap">--}}
            {{--<a class="btn btn-primary btn-sm" href="{{url('create')}}">Добавить контрагента</a>--}}
        {{--</li>--}}
    {{--</ul>--}}
    {{--<ul class="navbar-nav px-1">--}}
        {{--<li class="nav-item text-nowrap">--}}
            {{--<a class="btn btn-danger btn-sm" href="{{ route('logout') }}"--}}
               {{--onclick="event.preventDefault();--}}
                           {{--document.getElementById('logout-form').submit();">Выйти--}}
            {{--</a>--}}
            {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>--}}

        {{--</li>--}}
    {{--</ul>--}}
{{--</nav>--}}
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(Request::is('table')) active @endif">
                <a class="nav-link" href="{{url('/table')}}">Главная</a>
            </li>
            <li class="nav-item @if(Request::is('myHistory')) active @endif">
                <a class="nav-link" href="{{url('myHistory')}}">Моя история</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Аккаунт</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <span class="dropdown-item">{{Auth::user()->name}}</span>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" style="color: red" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Выйти</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                </div>
            </li>
        </ul>
        @if(Request::is('table'))
            <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="Поиск" aria-label="Поиск">
                <button class="btn btn-outline-light my-2 my-sm-0" id="searchBtn" type="submit">Поиск</button>
            </div>
        @endif
    </div>
</nav>

@yield('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
</body>
</html>