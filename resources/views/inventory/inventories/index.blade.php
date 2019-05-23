@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/inventories/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/inventories/index.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/inventories/index.property') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/inventories/index.property') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('inventoriesCreate') }}">{{ __('inventory/inventories/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('inventory/inventories/index.id') }}</th>
            <th data-sortable="true" data-field="serial_number">{{ __('inventory/inventories/index.serial_number') }}</th>
            <th data-sortable="true" data-field="id_device" data-formatter="deviceFormatter">{{ __('inventory/inventories/index.device') }}</th>
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter" data-visible="false">{{ __('inventory/inventories/index.counterparty') }}</th>
            <th data-sortable="true" data-field="date_arrival">{{ __('inventory/inventories/index.date_added') }}</th>
            <th data-sortable="true" data-field="id_placement" data-formatter="placementFormatter">{{ __('inventory/inventories/index.placement') }}</th>
            <th data-sortable="true" data-field="id_responsible" data-formatter="responsibleFormatter">{{ __('inventory/inventories/index.responsible') }}</th>
            <th data-sortable="true" data-field="id_status" data-formatter="statusFormatter">{{ __('inventory/inventories/index.status') }}</th>
            <th data-sortable="true" data-field="date_warranty">{{ __('inventory/inventories/index.warranty') }}</th>
            <th data-field="cost" data-visible="false">{{ __('inventory/inventories/index.cost') }}</th>
            <th data-field="cost_current" data-visible="false">{{ __('inventory/inventories/index.current_cost') }}</th>
            <th data-field="inventory_number">{{ __('inventory/inventories/index.inventory_number') }}</th>
            <th data-field="accounting_code" data-visible="false">{{ __('inventory/inventories/index.accounting_code') }}</th>
            <th data-field="ip" data-visible="false">{{ __('inventory/inventories/index.ip') }}</th>
            <th data-sortable="true" data-field="cancelled" data-formatter="checkFormatter">{{ __('inventory/inventories/index.cancelled') }}</th>
            <th data-sortable="true" data-field="id_operator" data-formatter="operatorFormatter" data-visible="false">{{ __('inventory/inventories/index.operator') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">{{ __('inventory/inventories/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/inventory/inventories/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function checkFormatter(value ,rows) {
            if (value == "1") {
                return '<i class="fas fa-check"></i>';
            }
        }

        function deviceFormatter(value ,rows) {
            if (rows != null) {
                return rows.device.name;
            }
        }

        function counterpartyFormatter(value ,rows) {
            if (rows != null) {
                return rows.counterparty.name;
            }
        }

        function placementFormatter(value ,rows) {
            if (rows != null) {
                return rows.placement.name;
            }
        }

        function responsibleFormatter(value ,rows) {
            if (rows != null) {
                return rows.responsible.last_name;
            }
        }

        function statusFormatter(value ,rows) {
            if (rows != null) {
                return rows.status.name;
            }
        }

        function operatorFormatter(value ,rows) {
            if (rows != null) {
                return rows.operator.last_name;
            }
        }
        {{--TODO "Basic example"  "Подробнее"  "Редактировать"  "Удалить"--}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/inventories/show/'+ rows['id'] +'" title="Подробнее"><i class="fas fa-eye"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/inventories/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection