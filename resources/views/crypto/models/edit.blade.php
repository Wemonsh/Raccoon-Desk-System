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
                    <a class="dropdown-item" href="{{ route('cryptoMcpiModelsIndex') }}">Модели СКЗИ</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Отчеты</a>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h1>Редактирование модели СКЗИ</h1>
    <form method="post" action="{{ route('cryptoMcpiModelsEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $mcpi_model->name }}" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label for="reg_number">Регистрационный номер</label>
            <input name="reg_number" type="text" class="form-control" id="reg_number" value="{{ $mcpi_model->reg_number }}" placeholder="Введите регистрационный номер">
        </div>
        <div class="form-group">
            <label for="information">Информация</label>
            <input name="information" type="text" class="form-control" id="information" value="{{ $mcpi_model->information }}" placeholder="Введите информацию">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <input name="comment" type="text" class="form-control" id="comment" value="{{ $mcpi_model->comment }}" placeholder="Введите комментарий">
        </div>
        <div class="form-group">
            <label for="date_from">Дата начала действия</label>
            <input name="date_from" type="date" class="form-control" value="{{ $mcpi_model->date_from }}" id="date_from">
        </div>
        <div class="form-group">
            <label for="date_to">Дата окончания действия</label>
            <input name="date_to" type="date" class="form-control" value="{{ $mcpi_model->date_to }}" id="date_to">
        </div>

        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>
@endsection
