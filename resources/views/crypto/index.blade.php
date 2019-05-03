@extends('layouts.default')

@section('content')
<h1>Учет средств криптографической защиты информации</h1>
<hr>
<p>Добро пожаловать на страницу сервиса учета средств криптографической защиты информации, тут вы можете осуществлять
ведение и учет СКЗИ а так же создавать типовые отчеты согласно ФЗ №66 "О разработке, производстве,
    реализации и эксплуатациишифровальных (криптографических) средств  защиты информации" от 9 февраля 2005 г.</p>
<hr>
<div class="row">
    <div class="col-3">
        <h2>Криптоключи</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-upload fa-fw"></i> Акт создания ключевых документов</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-download fa-fw"></i> Акт передачи ключевых документов</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-import fa-fw"></i> Акт ввода в эксплуатацию ключевой информации</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-export fa-fw"></i> Акт вывода из эксплуатации ключевой информации</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-trash-alt fa-fw"></i> Акт уничтожения ключевых документов</a>
        </div>
    </div>
    <div class="col-3">
        <h2>СКЗИ</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-upload fa-fw"></i> Акт поступления СКЗИ</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-excel fa-fw"></i> Акт списания СКЗИ</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-download fa-fw"></i> Акт передачи СКЗИ</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-import fa-fw"></i> Акт ввода СКЗИ в эксплуатацию</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-export fa-fw"></i> Акт вывода СКЗИ в эксплуатацию</a>
        </div>
    </div>
    <div class="col-3">
        <h2>Справочники</h2>
        <div class="list-group">
            <a href="{{ route('cryptoCertificatesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-info-circle fa-fw"></i> Ключевая информация</a>
            <a href="{{ route('cryptoStoragesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-sd-card fa-fw"></i> Носители ключевой информации</a>
            <a href="{{ route('cryptoAssignmentsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-copy fa-fw"></i> Назначение ключевой информации</a>
            <a href="{{ route('cryptoInfoSystemIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-sitemap fa-fw"></i> Информационные системы</a>
            <a href="{{ route('cryptoOrganizationsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-building fa-fw"></i> Организации</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-object-group fa-fw"></i> Объекты информационной инфраструктуры</a>
            <a href="{{ route('cryptoMcpiInstanceIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-window-maximize fa-fw"></i> Экземпляры СКЗИ</a>
            <a href="{{ route('cryptoMcpiModelsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-window-restore fa-fw"></i> Модели СКЗИ</a>
        </div>
    </div>
    <div class="col-3">
        <h2>Отчеты</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-poll fa-fw"></i> Тест 1</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-poll fa-fw"></i> Тест 2</a>
        </div>
    </div>
</div>

@endsection