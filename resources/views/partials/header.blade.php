<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body style="background: #F0F9FC;">
    <div style="min-height: 75px; background-color: #0052B1;">
        <div class="container-sm d-flex justify-content-between align-items-lg-center" style="min-height: 75px;">
            <a href="#!"><img width="150px" height="50" src="{{ asset('img/ricky-2008494451.png') }}"
                    alt="Rickya"></a>
            <div class="d-flex justify-content-around">
                <div class="mx-4"><i class="fas fa-shop me-2 text-white"></i><a href="#!/shop"
                        class="navbar-brand text-white text-decoration-none fs-5">SHOP</a></div>
            </div>

            <div>
                <div>
                    @if (auth()->check())
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                </div>
                <a href="#!/{{ auth()->check() ? 'user/' . auth()->id() : 'login' }}"
                    class="text-white text-decoration-none"><i class="fas fa-user"></i></a>
                <a href="" class="text-white text-decoration-none"><i class="fas fa-search mx-2"></i></a>
                <a href="#!/{{ auth()->check() ? 'cart' : 'login' }}" class="text-white text-decoration-none"><i
                        class="fas fa-shopping-cart" href="" class="text-dark text-decoration-none mx-2"></i></a>
            </div>

        </div>
    </div>
