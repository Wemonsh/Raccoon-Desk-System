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
    <h1>Модели СКЗИ</h1>
    <hr>
    <a href="{{ route('cryptoMcpiModelsCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    @if($mcpi_models->count() != 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Регистрационный номер</th>
                    <th>Информация</th>
                    <th>Комментарий</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mcpi_models as $mcpi_model)
                    <tr>
                        <td>{{ $mcpi_model->id }}</td>
                        <td>{{ $mcpi_model->name }}</td>
                        <td>{{ $mcpi_model->reg_number }}</td>
                        <td>{{ $mcpi_model->information }}</td>
                        <td>{{ $mcpi_model->comment }}</td>
                        <td>{{ $mcpi_model->date_from }}</td>
                        <td>{{ $mcpi_model->date_to }}</td>
                        <td width="50px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/crypto/mcpi-models/edit/{{ $mcpi_model->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $mcpi_models->render() }}

    @else
        <div class="alert alert-info" role="alert">
            <p>Модели СКЗИ отсутсвуют</p>
        </div>
    @endif
@endsection