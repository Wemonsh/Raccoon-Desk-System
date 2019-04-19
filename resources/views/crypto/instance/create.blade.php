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
                    <a class="dropdown-item" href="{{ route('cryptoMcpiInstanceIndex') }}">Экземпляры СКЗИ</a>
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
    <h1>Добавление экземпляра СКЗИ</h1>

    <form method="post" action="{{ route('cryptoMcpiInstanceCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Введите название">
        </div>
        <div class="form-group">
            <label for="serial_number">Серийный номер</label>
            <input name="serial_number" type="text" class="form-control" id="serial_number" placeholder="Введите серийный номер">
        </div>
        <div class="form-group">
            <label for="id_models">Название модели СКЗИ</label>
            <select name="id_models" class="form-control" id="id_models">
                @foreach($models as $model)
                    <option value="{{ $model->id }}">{{ $model->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <input name="comment" type="text" class="form-control" id="comment" placeholder="Введите комментарий">
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection

