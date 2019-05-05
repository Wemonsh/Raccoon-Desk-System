@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item active" aria-current="page">Производители</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Производители</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('manufacturesCreate') }}">Добавить</a>
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
            <th data-sortable="true" data-field="id">Id</th>
            <th data-sortable="true" data-field="name">Название</th>
            <th data-field="description">Описание</th>
            <th data-field="logotype" data-formatter="imageFormatter">Логотип</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>
        </tr>
        </thead>
    </table>

    <script>

        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        // Вывод изображения в таблице вместо текста! Надо ли это вообще? Ломается при этом колонка "Действия"
        // TODO Решить убрать или оставить!
        function imageFormatter(value, row) {
            if (value != null) {
                return '<img src="/storage/'+value+'" class="card-img-top rounded" style="max-width: 50px; max-height: 50px;"/>';
            }
        }

        function ajaxRequest(params) {
            var url = '/inventory/manufactures/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            })
        }

        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/manufactures/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>

@endsection
