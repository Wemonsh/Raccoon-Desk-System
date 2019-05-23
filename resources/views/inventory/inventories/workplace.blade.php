@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/inventories/workplace.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/inventories/workplace.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoriesIndex') }}">{{ __('inventory/inventories/workplace.property') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/inventories/workplace.MTM_workplace') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/inventories/workplace.MTM_workplace') }}</h1>
    <hr>
    <div class="toolbar">
        <div class="form-group">
            <div class="form-inline">
                {!! Form::select('id_responsible', $responsible, null, ['class' => 'form-control mr-1'] ) !!}
                {!! Form::button(__('inventory/inventories/workplace.display'), ['class' => 'btn btn-secondary', 'id' => 'btn_show', 'name' => 'btn_show', 'onClick' => 'showResponsible()']) !!}
            </div>
        </div>
    </div>
    <table
            data-ajax="workplaceApiResponse"
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
            data-show-refresh="true"
            id="btable">
        <thead>
        <tr>
            <th data-sortable="true" data-field="id" class="text-center">{{ __('inventory/inventories/workplace.id') }}</th>
            <th data-sortable="true" data-field="serial_number">{{ __('inventory/inventories/workplace.serial_number') }}</th>
            <th data-sortable="true" data-field="id_device" data-formatter="deviceFormatter">{{ __('inventory/inventories/workplace.device') }}</th>
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter">{{ __('inventory/inventories/workplace.counterparty') }}</th>
            <th data-sortable="true" data-field="date_arrival">{{ __('inventory/inventories/workplace.date_added') }}</th>
            <th data-sortable="true" data-field="id_placement" data-formatter="placementFormatter">{{ __('inventory/inventories/workplace.placement') }}</th>
            <th data-sortable="true" data-field="id_responsible" data-formatter="responsibleFormatter">{{ __('inventory/inventories/workplace.responsible') }}</th>
            <th data-sortable="true" data-field="id_status" data-formatter="statusFormatter">{{ __('inventory/inventories/workplace.status') }}</th>
            <th data-sortable="true" data-field="date_warranty">{{ __('inventory/inventories/workplace.warranty') }}</th>
            <th data-field="cost">{{ __('inventory/inventories/workplace.cost') }}</th>
            <th data-field="cost_current">{{ __('inventory/inventories/workplace.current_cost') }}</th>
            <th data-field="inventory_number">{{ __('inventory/inventories/workplace.inventory_number') }}</th>
            <th data-field="accounting_code">{{ __('inventory/inventories/workplace.accounting_code') }}</th>
            <th data-field="ip">{{ __('inventory/inventories/workplace.ip') }}</th>
            <th data-sortable="true" data-field="cancelled" data-formatter="checkFormatter">{{ __('inventory/inventories/workplace.cancelled') }}</th>
            <th data-sortable="true" data-field="id_operator" data-formatter="operatorFormatter">{{ __('inventory/inventories/workplace.operator') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">{{ __('inventory/inventories/workplace.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            var select  = $('#id_responsible');
            params.id_responsible = select.val();
            return params;
        }

        function workplaceApiResponse(params) {
            var url = '/inventory/inventories/workplace-api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function checkFormatter(value ,rows) {
            if (value == "0") {
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

        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/inventories/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }

        function showResponsible () {
            $('#btable').bootstrapTable('refresh');
        }

    </script>
@endsection