@extends('layouts.default')

@section('sub-navigation')
<div class="navbar-light bg-light">
    <ul class="nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Криптоключи
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Акт создания ключевых документов</a>
                <a class="dropdown-item" href="#">Акт передачи ключевых документов</a>
                <a class="dropdown-item" href="#">Акт ввода в эксплуатацию ключевой информации</a>
                <a class="dropdown-item" href="#">Акт вывода из эксплуатации ключевой информации</a>
                <a class="dropdown-item" href="#">Акт уничтожения ключевых документов</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                СКЗИ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Акт поступления СКЗИ</a>
                <a class="dropdown-item" href="#">Акт списания СКЗИ</a>
                <a class="dropdown-item" href="#">Акт передачи СКЗИ</a>
                <a class="dropdown-item" href="#">Акт ввода СКЗИ в эксплуатацию</a>
                <a class="dropdown-item" href="#">Акт вывода СКЗИ в эксплуатацию</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Справочники
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('cryptoCertificatesIndex') }}">Ключевая информация</a>
                <a class="dropdown-item" href="{{ route('cryptoStoragesIndex') }}">Носители ключевой информации</a>
                <a class="dropdown-item" href="{{ route('cryptoAssignmentsIndex') }}">Назначение ключевой информации</a>
                <a class="dropdown-item" href="{{ route('cryptoInfoSystemIndex') }}">Информационные системы</a>
                <a class="dropdown-item" href="{{ route('cryptoOrganizationsIndex') }}">Организации</a>
                <a class="dropdown-item" href="#">Объекты информационной инфраструктуры</a>
                <a class="dropdown-item" href="#">Экземпляры СКЗИ</a>
                <a class="dropdown-item" href="#">Модели СКЗИ</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Отчеты</a>
        </li>
    </ul>
</div>
@endsection

@section('content')
123
@endsection