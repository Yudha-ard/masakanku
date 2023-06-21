<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="{{ url('https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css') }}" rel="stylesheet">
        <title>{{ env('APP_NAME') }} | @yield('title')</title>
        <link href="{{ URL::asset('assets/frontend/css/sweetalert2.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('assets/frontend/css/styles.css') }}" rel="stylesheet">
        <script src="{{ URL::asset('assets/frontend/js/sweetalert2.all.min.js') }}"></script>
        <script src="{{ URL::asset('assets/frontend/js/jquery-3.7.0.min.js') }}"></script>
        <script src="{{ URL::asset('assets/frontend/js/main.js') }}"></script>
    </head>
    <body>

        <a href="#" class="scrolltop" id="scroll-top">
            <i class='bx bx-chevron-up scrolltop__icon'></i>
        </a>

        <header class="l-header" id="header">
            <nav class="nav bd-container">
                <a href="#" class="nav__logo">{{ env('APP_NAME') }}</a>

                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                        <li class="nav__item"><a href="{{ route('front.index') }}" class="nav__link @if(Request::path('/') === '/') active-link @endif">Home</a></li>
                        <li class="nav__item"><a href="{{ route('front.about') }}" class="nav__link @if(Request::path('about') === 'about') active-link @endif">About</a></li>
                        <li class="nav__item"><a href="{{ route('front.recipe') }}" class="nav__link @if(Request::path('recipe') === 'recipe') active-link @endif">Recipe</a></li>
                        <li class="nav__item"><a href="{{ route('front.contact') }}" class="nav__link @if(Request::path('contact') === 'contact') active-link @endif">Contact us</a></li>

                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
        
@yield('content')
        

</main>

<footer class="footer section bd-container">
    <div class="footer__container bd-grid">
        <div class="footer__content">
            <a href="#" class="footer__logo">Tasty Food</a>
            <span class="footer__description">Restaurant</span>
            <div>
                <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
            </div>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Services</h3>
            <ul>
                <li><a href="#" class="footer__link">Delivery</a></li>
                <li><a href="#" class="footer__link">Pricing</a></li>
                <li><a href="#" class="footer__link">Fast food</a></li>
                <li><a href="#" class="footer__link">Reserve your spot</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Information</h3>
            <ul>
                <li><a href="#" class="footer__link">Event</a></li>
                <li><a href="#" class="footer__link">Contact us</a></li>
                <li><a href="#" class="footer__link">Privacy policy</a></li>
                <li><a href="#" class="footer__link">Terms of services</a></li>
            </ul>
        </div>

        <div class="footer__content">
            <h3 class="footer__title">Adress</h3>
            <ul>
                <li>Lima - Peru</li>
                <li>Jr Union #999</li>
                <li>999 - 888 - 777</li>
                <li>tastyfood@email.com</li>
            </ul>
        </div>
    </div>

    <p class="footer__copy">{{ env('APP_NAME') }} &#169; {{ date('Y') }} . All right reserved</p>
</footer>

<script src="{{ url('https://unpkg.com/scrollreveal') }}"></script>
</body>
</html>
            

 