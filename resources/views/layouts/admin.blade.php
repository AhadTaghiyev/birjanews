<!doctype html>
<html class="fixed">
<head>
    <!-- Basic -->
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" href="#">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <script src="{{ asset('js/modernizr.js') }}"></script>

    @yield('styles')

</head>
<body>
<section class="body">
    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="{{route('adminpage')}}" class="logo">
                <img src="{{ asset('files/logo/logo_4x.svg') }}" height="42px" width="auto" alt="Birja News" />
            </a>
            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>
        <!-- start: search & user box -->
        <div class="header-right">
            <span class="separator"></span>
            <div id="userbox" class="userbox">
                <a href="#" data-bs-toggle="dropdown">

                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name">{{ Auth::user()->name }}</span>
                        <span class="role">Administrator</span>
                    </div>
                    <i class="fa custom-caret"></i>
                </a>
                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{route('admin.users.edit', Auth::user()->id )}}"><i class="bx bx-user-circle"></i> Profil</a>
                        </li>

                        <li>
                            <a role="menuitem" tabindex="-1" href="{{route('logout')}}"><i class="bx bx-power-off"></i> Çıxış</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </header>

        <div class="inner-wrapper">

            <aside id="sidebar-left" class="sidebar-left">
                <div class="sidebar-header">
                    <div class="sidebar-title">

                    </div>
                    <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li>
                                    <a class="nav-link" href="{{ route('adminpage') }}">
                                        <i class="bx bx-home-alt" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class="bx bx-user" aria-hidden="true"></i>
                                        <span>İstifadəçilər</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{route('admin.users.index')}}">
                                                Bütün İstifadəçilər
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{route('admin.users.create')}}">
                                                İstifadəçi Yarat
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{route('admin.slider.index')}}"  data-target="#slider" aria-expanded="true" aria-controls="slider">
                                        <i class="fas fa-images"></i>
                                        <span>Slayder</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{route('admin.banner.index')}}"  data-target="#banner" aria-expanded="true" aria-controls="banner">
                                        <i class="far fa-image"></i>
                                        <span>Banner</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class="bx bx-list-ul" aria-hidden="true"></i>
                                        <span>Hərrac Elanları</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{route('admin.blog.index')}}">
                                                Bütün Hərrac Elanları
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{route('admin.blog.create')}}">
                                                Hərrac Elanı Yarat
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a class="nav-link" href="#">
                                        <i class="bx bx-list-ul" aria-hidden="true"></i>
                                        <span>Birja Yeniliklərəri</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a class="nav-link" href="{{route('admin.yenilikler.index')}}">
                                                Bütün Birja Yenilikləri
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{route('admin.yenilikler.create')}}">
                                                Birja Elanı Yarat
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                                <li>
                                    <a class="nav-link" href="{{route('admin.partners.index')}}">
                                        <i class="bx bxs-buildings" aria-hidden="true"></i>
                                        <span>Hərrac Təşkilatları</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="{{route('admin.contact.index')}}" data-target="#contact" aria-expanded="true" aria-controls="contact">
                                        <i class="bx bxs-contact" aria-hidden="true"></i>
                                        <span>Əlaqə</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>

            <section role="main" class="content-body">
                <header class="page-header">
                    <h2>BirjaNews</h2>
                    <div class="right-wrapper text-end">


                    </div>
                </header>

                <div class="row">

                    <div class="col-lg-12">

                        @yield('content')

                    </div>
                </div>

            </section>
        </div>
    </section>

    <script src="{{asset('js/admin.js')}}"></script>



    @yield('footer')

    @yield('scripts')


    </body>
</html>
