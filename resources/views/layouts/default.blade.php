<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" href="/img/favicon.png" />

    <title>Raccoon Desk System</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Page level plugin CSS-->

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->

    <script src="{{ asset('js/summernote.js') }}"></script>
    <script src="{{ asset('js/summernote-ru-RU.js') }}"></script>

    {{-- FullCallendar --}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">

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
            <a class="nav-link" href="{{ route('login') }}">{{ __('layouts/navigation.login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('layouts/navigation.registration') }}</a>
            </li>
        @endif
        @else
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ __('layouts/navigation.notifications') }}">
                <i class="fas fa-bell fa-fw mt-1"></i>
                <span class="badge badge-danger">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                <a class="dropdown-item" href="#">{{ __('layouts/navigation.action') }}</a>
                <a class="dropdown-item" href="#">{{ __('layouts/navigation.action_2') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">{{ __('layouts/navigation.action_3') }}</a>
            </div>
        </li>

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link" href="{{ route('messagesIndex') }}" title="{{ __('layouts/navigation.messages') }}">
                <i class="fas fa-envelope fa-fw mt-1"></i>
                <span class="badge badge-danger">{{ $messages_new }}</span>
            </a>
        </li>

        <li class="nav-item dropdown no-arrow">

            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="{{ __('layouts/navigation.choose_language') }}">
                <i class="fas fa-globe-americas"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/locale/en"><img src="{{ asset('img/flags/United-Kingdom.png') }}" alt=""> English</a>
                <a class="dropdown-item" href="/locale/ru"><img src="{{ asset('img/flags/Russia.png') }}" alt=""> Русский</a>
                <a class="dropdown-item" href="/locale/ua"><img src="{{ asset('img/flags/Ukraine.png') }}" alt=""> Український</a>
            </div>
        </li>

        <li class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fas fa-user-circle fa-fw"></i>
                {{ Auth::user()->last_name .' '. Auth::user()->first_name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('accountProfile') }}">{{ __('layouts/navigation.profile') }}</a>
                <a class="dropdown-item" href="{{ route('accountSetting') }}">{{ __('layouts/navigation.settings') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                    {{ __('layouts/navigation.logout') }}
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
                <span>{{ __('layouts/navigation.home') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('news') }}">
                <i class="fas fa-fw fa-newspaper"></i>
                <span>{{ __('layouts/navigation.news') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('events.index') }}">
                <i class="fas fa-fw fa-calendar-alt"></i>
                <span>{{ __('layouts/navigation.calendar') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('phonesIndex') }}">
                <i class="fas fa-fw fa-address-book"></i>
                <span>{{ __('layouts/navigation.phone') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('knowledge') }}">
                <i class="fas fa-fw fa-book"></i>
                <span>{{ __('layouts/navigation.knowledge') }}</span>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-file-alt "></i>
                <span>Документы</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ route('documentsIncoming') }}">Входящие</a>
                <a class="dropdown-item" href="{{ route('documentsOutgoing') }}">Исходящие</a>
                <a class="dropdown-item" href="{{ route('documentsStatistic') }}">Статистика</a>
                <a class="dropdown-item" href="{{ route('documentsReport') }}">Отчеты</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('documents') }}">Мои документы</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-headset"></i>
                <span>{{ __('layouts/navigation.service') }}</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="{{ route('requestsCreate') }}">{{ __('layouts/navigation.new_request') }}</a>
                <a class="dropdown-item" href="{{ route('requestsCreated') }}">{{ __('layouts/navigation.my_requests') }}</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('requestsSearch') }}">{{ __('layouts/navigation.search') }}</a>
                <a class="dropdown-item" href="{{ route('requestsAccepted') }}">{{ __('layouts/navigation.received') }}</a>
                <a class="dropdown-item" href="{{ route('requestsReceived') }}">{{ __('layouts/navigation.accepted') }}</a>
                <a class="dropdown-item" href="{{ route('requestsHistory') }}">{{ __('layouts/navigation.history') }}</a>
                <a class="dropdown-item" href="{{ route('requestsReports') }}">{{ __('layouts/navigation.reports') }}</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('inventoryIndex') }}">
                <i class="fas fa-fw fa-boxes"></i>
                <span>{{ __('layouts/navigation.inventory') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('crypto') }}">
                <i class="fas fa-fw fa-key"></i>
                <span>{{ __('layouts/navigation.mcpi') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('statisticsIndex') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>{{ __('layouts/navigation.statistics') }}</span>
            </a>
        </li>

        @if(\Auth::user() != null && \Auth::user()->isAdmin('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Админ панель</span>
                </a>
            </li>
        @endif

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
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
<script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>
<script src="{{ asset('js/table/bootstrap-table-print.js') }}"></script>
</body>

</html>
