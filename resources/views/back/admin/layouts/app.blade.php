<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ env('APP_NAME') }} | @yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="Website tempat pencarian resep masakan" />
    <meta name="keywords" content="masakan, nusantara, website" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Masakan, Nusantara" />
    <meta property="og:url" content="{{ env('APP_URL') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <link rel="canonical" href="{{ env('APP_URL') }}" />
    <link rel="shortcut icon" href="{{ URL::asset('assets/backend/media/logos/favicon.ico') }}" />
    <script src="{{ URL::asset('assets/frontend/js/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ URL::asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('assets/backend/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ URL::asset('assets/backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('assets/frontend/js/ckeditor.js') }}"></script>
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    class="app-default">
    @include('sweetalert::alert')
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }            
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <div id="kt_app_header" class="app-header ">
                <div class="app-container  container-fluid d-flex align-items-stretch flex-stack "
                    id="kt_app_header_container">
                    <div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-outline ki-abstract-14 fs-2"></i>
                        </div>
                        <a href="">
                            <img alt="Logo" src="{{ asset('assets/auth/chef.png') }}" class="h-30px" />
                        </a>
                    </div>
                    <div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
                        <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1">
                            <div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1"></div>
                            <div class="app-navbar-item ms-1 ms-md-3">
                                <div class="">
                                    <div class="d-flex align-items-center"
                                        data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                        data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                                        <div class="d-flex flex-center cursor-pointer symbol symbol-circle symbol-40px">
                                            @if(is_null(Auth::user()->img_profile))
                                                <img alt="Profile Image" src="{{ URL::asset('storage/images/user/default.png') }}" />
                                            @else
                                                <img alt="Profile Image" src="{{ URL::asset('storage/images/user/'.Auth::user()->img_profile) }}" />
                                            @endif
                                        </div>
                                        <div class="d-flex flex-column align-items-start justify-content-center ms-3">
                                            <span class="text-gray-500  fs-8 fw-semibold">Hello</span>
                                            <a class="text-gray-800 fs-7 fw-bold text-hover-primary">{{
                                                Auth::user()->name }}</a>
                                        </div>
                                    </div>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <div class="symbol symbol-50px me-5">
                                                    @if(is_null(Auth::user()->img_profile))
                                                        <img alt="Profile Image" src="{{ URL::asset('storage/images/user/default.png') }}" />
                                                    @else
                                                        <img alt="Profile Image" src="{{ URL::asset('storage/images/user/'.Auth::user()->img_profile) }}" />
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bold d-flex align-items-center fs-5">
                                                        {{ Auth::user()->name }}
                                                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                                                            @if(Auth::user()->is_admin) admin @else user @endif</span>
                                                    </div>
                                                    <a href="mailto:{{ Auth::user()->email }}"
                                                        class="fw-semibold text-muted text-hover-primary fs-7">
                                                        {{ Auth::user()->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-5">
                                            @if (Auth::user()->is_admin == 1)
                                            <a href="{{ route('admin.profile') }}" class="menu-link px-5">
                                                Profile
                                            @else
                                            <a href="{{ route('user.profile') }}" class="menu-link px-5">
                                                Profile
                                            @endif
                                            </a>
                                        </div>
                                        <div class="menu-item px-5 my-1">
                                            @if (Auth::user()->is_admin == 1)
                                            <a href="{{ route('admin.profile.edit') }}" class="menu-link px-5">
                                                Settings
                                            @else
                                            <a href="{{ route('user.profile.edit') }}" class="menu-link px-5">
                                                Settings
                                            @endif
                                            </a>
                                        </div>
                                        <div class="menu-item px-5">
                                            <a href="{{ route('logout') }}" class="menu-link px-5"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Sign Out
                                            </a>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">

                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">

                    <div class="app-sidebar-logo flex-shrink-0 d-none d-md-flex align-items-center px-8"
                        id="kt_app_sidebar_logo">
                        <a href="">
                            <img alt="Logo" src="{{ URL::asset('assets/backend/media/logos/demo42.svg') }}"class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
                            <img alt="Logo" src="{{ URL::asset('assets/backend/media/logos/demo42-dark.svg') }}" class="h-25px h-lg-25px theme-dark-show" />
                        </a>
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_aside_mobile_toggle">
                                <i class="ki-outline ki-abstract-14 fs-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
                            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
                                <div class="menu-item here show menu-accordion" data-kt-menu-placement="right-start">
                                @if (Auth::user()->is_admin == 1)
                                    <a class="menu-link" href="{{ route('admin.dashboard') }}">
                                @elseif (Auth::user()->is_admin == 0)
                                    <a class="menu-link" href="{{ route('user.dashboard') }}">
                                @endif
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-element-11 fs-2 @if(Request::path('admin/dashboard') === 'admin/dashboard') text-info @elseif(Request::path('admin/dashboard') === 'admin/dashboard') text-info @endif"></i>
                                        </span>
                                        <span class="menu-title">Dashboard</span>
                                    </a>
                                </div>
                                @if (Auth::user()->is_admin == 1)
                                <div class="menu-item pt-5">
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Apps</span>
                                    </div>
                                </div>

                                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                    <span class="menu-link">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-tablet-text-down fs-2 @if(Request::path('admin/resep') === 'admin/resep' || Request::path('admin/resep/create') === 'admin/resep/create'|| Request::path('admin/resep/{resep}') === 'admin/resep/{resep}' || Request::path('admin/resep/{resep}/edit') === 'admin/resep/{resep}/edit') text-info @endif"></i>
                                        </span>
                                        <span class="menu-title">Recipe</span>
                                        <span class="menu-arrow"></span>
                                    </span>

                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.resep') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Recipe</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="menu-sub menu-sub-accordion">
                                        <div class="menu-item">
                                            <a class="menu-link" href="{{ route('admin.kategori') }}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Categori</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.user') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-people fs-2 @if(Request::path('admin/user') === 'admin/user') text-info @endif"></i>
                                        </span>
                                        <span class="menu-title">User</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.pesan') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-message-notif fs-2 @if(Request::path('admin/pesan') === 'admin/pesan') text-info @endif"></i>
                                        </span>
                                        <span class="menu-title">Message</span>
                                    </a>
                                </div>
                                <div class="menu-item pt-5">
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Setting</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.profile') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-address-book fs-2 @if(Request::path('admin/profile') === 'admin/profile') text-info @endif"></i>
                                        </span>
                                        <span class="menu-title">Profile</span>
                                    </a>
                                </div>
                            @elseif (Auth::user()->is_admin == 0)
                                <div class="menu-item pt-5">
                                    <div class="menu-content">
                                        <span class="menu-heading fw-bold text-uppercase fs-7">Setting</span>
                                    </div>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('user.profile') }}">
                                        <span class="menu-icon">
                                            <i class="ki-outline ki-address-book fs-2 @if(Request::path('user/profile') === 'user/profile') text-info @endif"></i>
                                        </span>
                                        <span class="menu-title">Profile</span>
                                    </a>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

                <div id="kt_app_footer" class="app-footer ">
                    <div class="app-container  container-xxl d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">{{ date('Y') }} &copy;</span>
                            <a href="{{ url('mailto:yudha.ard28@gmail.com') }}" target="_blank" class="text-gray-800 text-hover-primary">{{ env('APP_NAME') }}</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script src="{{ URL::asset('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/scripts.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/widgets.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/custom/widgets.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/js/custom/utilities/modals/users-search.js') }}"></script>
</body>

</html>