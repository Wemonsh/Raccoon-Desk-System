@extends('layouts.default')

@section('content')
    <h1>Учет материально-технических средств</h1>
    <hr>

    <div class="row">
        <div class="col-3">
            <h2>Инструменты</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bolt fa-fw"></i> Проверка доступности ТМЦ</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bug fa-fw"></i> Менеджер по обслуживанию</a>
                <a href="{{ route('counterpartyContractsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-check fa-fw"></i> Контроль договоров</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-clone fa-fw"></i> ТМЦ на рабочем месте</a>
            </div>
        </div>
        <div class="col-3">
            <h2>Журналы</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-box-open fa-fw"></i> Имущество</a>
            </div>
        </div>
        <div class="col-3">
            <h2>Справочники</h2>
            <div class="list-group">
                <a href="{{ route('counterpartyIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-cogs fa-fw"></i> Контрагенты</a>
                <a href="{{ route('manufacturesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-cubes fa-fw"></i> Производители</a>
                <a href="{{ route('typesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-location-arrow fa-fw"></i>Типы средств</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-object-group fa-fw"></i> Группы ТМЦ</a>
                <a href="{{ route('placementsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-location-arrow fa-fw"></i> Помещения</a>
                <a href="{{ route('organizationsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-sitemap fa-fw"></i> Организации</a>
            </div>
        </div>
        <div class="col-3">
            <h2>Отчеты</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-box-open fa-fw"></i> Имущество</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-chart-line fa-fw"></i> Движение ТМЦ</a>
            </div>
        </div>
    </div>

@endsection