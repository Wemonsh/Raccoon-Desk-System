@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('counterpartyContractsIndex') }}">Договора</a></li>
            <li class="breadcrumb-item active" aria-current="page">Контроль договоров</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Контроль договоров</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('counterpartyContractsCreate') }}">Добавить</a>
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
            <th data-sortable="true" data-field="number">Номер</th>
            <th data-sortable="true" data-field="name">Название</th>
            <th data-sortable="true" data-field="date_from">Дата начала</th>
            <th data-sortable="true" data-field="date_to">Дата окончания</th>
            <th data-sortable="true" data-field="valid" data-formatter="checkFormatter">Действующий</th>
            <th data-field="comment">Комментарий</th>
            <th data-sortable="true" data-field="files" data-formatter="docsFormatter">Документы</th>
            {{-- TODO Оставляем вывод названия организации так??? --}}
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter">Название поставщика</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">Действие</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/inventory/counterparty-contracts/control-api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function checkFormatter(value ,rows) {
            if (value != "0") {
                return '<i class="fas fa-check"></i>';
            }
        }

        function counterpartyFormatter(value ,rows) {
            if (rows != null) {
                return rows.counterparty.name;
            }
        }

        function docsFormatter(value ,rows) {
            if (rows != null) {
                // TODO Доработать вывод документов в таблице!
                return rows.files;

            }
        }

        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/counterparty-contracts/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>

@endsection

