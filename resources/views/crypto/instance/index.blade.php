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
    <h1>Экземпляры СКЗИ</h1>
    <hr>
    <a href="{{ route('cryptoMcpiInstanceCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    @if($mcpi_instances->count() != 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Серийный номер</th>
                    <th>Название модели</th>
                    <th>Комментарий</th>
                    <th>Дата создания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mcpi_instances as $mcpi_instance)
                    <tr>
                        <td>{{ $mcpi_instance->id }}</td>
                        <td>{{ $mcpi_instance->serial_number }}</td>
                        <td>{{ $mcpi_instance->model->name }}</td>
                        <td>{{ $mcpi_instance->comment }}</td>
                        <td>{{ $mcpi_instance->created_at }}</td>
                        <td width="50px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/crypto/mcpi-instances/edit/{{ $mcpi_instance->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $mcpi_instances->render() }}

    @else
        <div class="alert alert-info" role="alert">
            <p>Экземпляры СКЗИ отсутсвуют</p>
        </div>
    @endif
@endsection