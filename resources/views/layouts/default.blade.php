<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Blank Page</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Page level plugin CSS-->

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->

    <script src="{{ asset('js/summernote.js') }}"></script>
    <script src="{{ asset('js/summernote-ru-RU.js') }}"></script>

</head>

<body id="page-top">

<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        {{ config('app.name') }}
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>




    <!-- Navbar -->
    <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">


        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('app.login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('app.register') }}</a>
            </li>
        @endif
        @else
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw mt-1"></i>
                <span class="badge badge-danger">999+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw mt-1"></i>
                <span class="badge badge-danger">7</span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>


        <li class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-circle fa-fw"></i>
                {{ Auth::user()->last_name .' '. Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>

</nav>

<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Главная</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('news') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>Новости</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>Календарь</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-address-book"></i>
                <span>Тел. справочник</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('knowledge') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>База знаний</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-headset"></i>
                <span>Служба поддержки</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ route('requestsCreate') }}">Новая заявка</a>
                <a class="dropdown-item" href="{{ route('requestsCreated') }}">Мои заявки</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('requestsSearch') }}">Поиск</a>
                <a class="dropdown-item" href="{{ route('requestsAccepted') }}">Поступившие</a>
                <a class="dropdown-item" href="{{ route('requestsReceived') }}">Принятые</a>
                <a class="dropdown-item" href="{{ route('requestsHistory') }}">История</a>
                <a class="dropdown-item" href="{{ route('requestsReports') }}">Отчеты</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Активы организации</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('crypto') }}">
                <i class="fas fa-fw fa-key"></i>
                <span>Учет СКЗИ</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Статистика</span>
            </a>
        </li>

        <hr>


        {{--<li class="nav-item">--}}
            {{--<a class="nav-link" href="charts.html">--}}
                {{--<i class="fas fa-fw fa-chart-area"></i>--}}
                {{--<span>Charts</span></a>--}}
        {{--</li>--}}
        {{--<li class="nav-item">--}}
        {{--<h6 class="dropdown-header">Login Screens:</h6>--}}
            {{--<a class="nav-link" href="tables.html">--}}
                {{--<i class="fas fa-fw fa-table"></i>--}}
                {{--<span>Tables</span></a>--}}
        {{--</li>--}}
    </ul>



    <div id="content-wrapper">
        @yield('sub-navigation')
        @yield('jumbotron')
        <div class="container-fluid">
            @yield('breadcrumbs')

            <!-- Page Content -->
            @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>&copy; 2019 Raccoon Desk System</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/sb-admin.min.js') }}"></script>

</body>

</html>
