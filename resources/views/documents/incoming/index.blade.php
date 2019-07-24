@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Входящие</a></li>
            <li class="breadcrumb-item active" aria-current="page">Документы</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>Входящие</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('documentsIncomingCreate') }}">Добавить</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('documentsIncoming') }}">Документы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Поиск</a>
        </li>
    </ul>

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
            <th data-sortable="true" data-field="id" class="text-center">Номер</th>
            <th data-sortable="true" data-field="id_type" class="text-center">Тип</th>
            <th data-sortable="true" data-field="id_departament" class="text-center">Отдел</th>
            <th data-sortable="true" data-field="date_of_registration" class="text-center">Дата регистрации</th>
            <th data-sortable="true" data-field="id_korrespondent" class="text-center">Корреспондент</th>
            <th data-sortable="true" data-field="content" class="text-center">Содержание</th>
            <th data-sortable="true" data-field="id_executor" class="text-center">Исполнитель</th>
            <th data-sortable="true" data-field="date_of_execution" class="text-center">Срок исполнения</th>
            <th data-sortable="true" data-field="date_of_end_execution" class="text-center">Фактическое исполнение</th>
            <th data-sortable="true" data-field="performance_mark" class="text-center">Отметка</th>
            <th data-formatter="actionFormatter" data-sortable="true" class="text-center">Действиее</th>

        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/documents/incoming/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function modelFormatter(value, rows) {
            if (rows != null) {
                return rows.model.name;
            }
        }
        {{--TODO "Basic example"  "Редактировать"  "Удалить" изменить!!!  --}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/documents/incoming/show/'+ rows['id'] +'" title="Подробнее"><i class="fas fa-eye"></i></a>' +
                '</div>';
        }
    </script>
@endsection