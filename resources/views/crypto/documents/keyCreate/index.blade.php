@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Информационные системы</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Акт создания ключевых документов</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('keyCreateCreate') }}">Добавить</a>
    </div>
    <table
            data-ajax="ajaxRequest"
            data-side-pagination="server"
            data-toggle="table"
            data-pagination="true"
            data-query-params="dataQueryParams"
            data-page-number="1"
            data-search="true"
            data-query-params-type=""
            data-show-print="true"
            data-toolbar=".toolbar"
            data-show-columns="true"
            data-minimum-count-columns="2"
            data-show-refresh="true">
        <thead>
        <tr>
            <th data-sortable="true" data-field="id" class="text-center">Id</th>
            <th data-sortable="true" data-field="name">Дата</th>
            <th data-sortable="true" data-field="name">Лицо, создающее ключевой документ</th>
            <th data-sortable="true" data-field="name">Ключевая информация</th>
            <th data-sortable="true" data-field="name">Файл</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>
        </tr>
        </thead>
    </table>

@endsection