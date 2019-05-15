@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/contracts/control.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/contracts/control.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('counterpartyContractsIndex') }}">{{ __('inventory/contracts/control.contracts') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/contracts/control.contracts_control') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/contracts/control.contracts_control') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('counterpartyContractsCreate') }}">{{ __('inventory/contracts/control.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('inventory/contracts/control.id') }}</th>
            <th data-sortable="true" data-field="number">{{ __('inventory/contracts/control.number') }}</th>
            <th data-sortable="true" data-field="name">{{ __('inventory/contracts/control.name') }}</th>
            <th data-sortable="true" data-field="date_from">{{ __('inventory/contracts/control.start_date') }}</th>
            <th data-sortable="true" data-field="date_to">{{ __('inventory/contracts/control.end_date') }}</th>
            <th data-sortable="true" data-field="valid" data-formatter="checkFormatter">{{ __('inventory/contracts/control.valid') }}</th>
            <th data-field="comment">{{ __('inventory/contracts/control.comment') }}</th>
            <th data-sortable="true" data-field="files" data-formatter="docsFormatter">{{ __('inventory/contracts/control.documents') }}</th>
            {{-- TODO Оставляем вывод названия организации так??? --}}
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter">{{ __('inventory/contracts/control.supplier_name') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">{{ __('inventory/contracts/control.action') }}</th>
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
            // TODO изменить title у обоих кнопок - редактировать и удалить согласно переводу!!!
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/counterparty-contracts/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>

@endsection

