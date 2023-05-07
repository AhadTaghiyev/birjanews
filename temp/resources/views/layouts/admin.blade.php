<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link rel="shortcut icon" href="{{asset('files/img/logo/loqod.png')}}">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

    @yield('styles')

</head>

<body id="page-top">

<div id="wrapper">

    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/admin')}}">
            <div class="sidebar-brand-icon">
                <i class="far fa-eye"></i>
            </div>
            <div class="sidebar-brand-text mx-1">Oko </div>
        </a>

        <hr class="sidebar-divider my-0">

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Interface
        </div>


        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
                <i class="fas fa-users"></i>
                <span>İstifadəçilər</span>
            </a>
            <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-color-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">İstifadəçi Əməliyyatları:</h6>
                    <a class="collapse-item" href="{{route('admin.users.index')}}">Bütün İstifadəçilər</a>
                    <a class="collapse-item" href="{{route('admin.users.create')}}">İstifadəçi Yarat</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.slider.index')}}"  data-target="#slider" aria-expanded="true" aria-controls="slider">
                <i class="fas fa-images"></i>
                <span>Slayder</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.about.index')}}"  data-target="#about" aria-expanded="true" aria-controls="about">
                <i class="fas fa-address-card"></i>
                <span>Haqqımızda</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blogs" aria-expanded="true" aria-controls="blogs">
                <i class="fas fa-users"></i>
                <span>Bloqlar</span>
            </a>
            <div id="blogs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-color-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Əlavələr:</h6>
                    <a class="collapse-item" href="{{route('admin.blog.category.index')}}">Kateqoriyalar</a>
                    <a class="collapse-item" href="{{route('admin.author.index')}}">Müəlliflər</a>
                    <a class="collapse-item" href="{{route('admin.blog.comments.index')}}">Komentlər</a>
                    <h6 class="collapse-header">Bloq növləri:</h6>
                    <a class="collapse-item" href="{{route('admin.blog.index')}}">Bloqlar</a>
                    <a class="collapse-item" href="{{route('admin.blog.blog7.index')}}">7 ölçülü Bloqlar</a>
                    <a class="collapse-item" href="{{route('admin.blog.videoBlog.index')}}">Video Bloqlar</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.partners.index')}}"  data-target="#about" aria-expanded="true" aria-controls="about">
                <i class="fas fa-handshake"></i>
                <span>Partnyorlar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallerymenu" aria-expanded="true" aria-controls="activities">
                <i class="fas fa-images"></i>
                <span>Qalereya</span>
            </a>
            <div id="gallerymenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-color-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Qalereya:</h6>
                    <a class="collapse-item" href="{{route('admin.gallery.category.index')}}">Kateqoriyalar</a>
                    <a class="collapse-item" href="{{route('admin.gallery.index')}}">Şəkillər</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.services.index')}}" data-target="#services" aria-expanded="true" aria-controls="services">
                <i class="fas fa-concierge-bell"></i>
                <span>Xidmətlər</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.projects.index')}}" data-target="#projects" aria-expanded="true" aria-controls="projects">
                <i class="fas fa-tasks"></i>
                <span>Layihələr</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.instagram.index')}}" data-target="#projects" aria-expanded="true" aria-controls="projects">
                <i class="fab fa-instagram"></i>
                <span>Instagram</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.contact.index')}}" data-target="#contact" aria-expanded="true" aria-controls="contact">
                <i class="fas fa-id-card-alt"></i>
                <span>Əlaqə</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('admin.subscribe.index')}}" data-target="#subscriber" aria-expanded="true" aria-controls="subscriber">
                <i class="far fa-newspaper"></i>
                <span>Abunəçilər</span>
            </a>
        </li>

        <hr class="sidebar-divider">


        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-color-white topbar mb-4 static-top shadow">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>


                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('admin.users.edit', Auth::user()->id )}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profil Redaktə
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Çıxış
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <div class="container-fluid">
                <div class="row">
                    @yield('button-up')
                </div>
                <div class="row">
                    @yield('content')

                </div>
            </div>
        </div>

        <footer class="sticky-footer bg-color-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span class="text-gray-600">Copyright &copy; Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Çıxmaqa əminsiniz?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Çıxış etmək üçün seçiminizi edin</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">İmtina</button>

                <a class="btn btn-danger" href="{{route('logout')}}">Çıxış</a>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/admin.js')}}"></script>



@yield('footer')

@yield('scripts')



</body>

</html>
