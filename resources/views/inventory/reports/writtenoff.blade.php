@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/reports/writtenoff.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/reports/writtenoff.main') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/reports/writtenoff.writtenoff_property') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/reports/writtenoff.writtenoff_property') }}</h1>
    <hr>
    <div class="toolbar">
        <div class="form-group">
            <div class="form-inline mb-3">
                {!! Form::label('date_from', __('inventory/reports/writtenoff.date_from'), ['class' => 'mr-1']) !!}
                {!! Form::date('date_from', $date_from, ['class' => 'form-control mr-1', 'id' => 'date_from', 'name' => 'date_from']) !!}
                {!! Form::label('date_to', __('inventory/reports/writtenoff.date_to'), ['class' => 'mr-1']) !!}
                {!! Form::date('date_to', $date_to, ['class' => 'form-control mr-1', 'id' => 'date_to', 'name' => 'date_to']) !!}
            </div>
            <div class="form-inline">
                {!! Form::select('id_types', $types, null, ['class' => 'form-control mr-1', 'id' => 'id_types', 'name' => 'id_types', 'placeholder' => __('inventory/reports/writtenoff.all_MTM_types')] ) !!}
                {!! Form::button(__('inventory/reports/writtenoff.form'), ['class' => 'btn btn-secondary', 'id' => 'btn_show', 'name' => 'btn_show', 'onClick' => 'formReport();']) !!}
            </div>
        </div>
    </div>
    <table
            data-ajax="writtenOffPropertyReportApiResponse"
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('inventory/reports/writtenoff.id') }}</th>
            <th data-sortable="true" data-field="serial_number">{{ __('inventory/reports/writtenoff.serial_number') }}</th>
            <th data-sortable="true" data-field="id_device" data-formatter="deviceFormatter">{{ __('inventory/reports/writtenoff.device') }}</th>
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter" data-visible="false">{{ __('inventory/reports/writtenoff.counterparty') }}</th>
            <th data-sortable="true" data-field="date_arrival">{{ __('inventory/reports/writtenoff.date_added') }}</th>
            <th data-sortable="true" data-field="id_placement" data-formatter="placementFormatter">{{ __('inventory/reports/writtenoff.placement') }}</th>
            <th data-sortable="true" data-field="id_responsible" data-formatter="responsibleFormatter">{{ __('inventory/reports/writtenoff.responsible') }}</th>
            <th data-sortable="true" data-field="id_status" data-formatter="statusFormatter">{{ __('inventory/reports/writtenoff.status') }}</th>
            <th data-sortable="true" data-field="date_warranty">{{ __('inventory/reports/writtenoff.warranty') }}</th>
            <th data-field="cost" data-visible="false">{{ __('inventory/reports/writtenoff.cost') }}</th>
            <th data-field="cost_current" data-visible="false">{{ __('inventory/reports/writtenoff.current_cost') }}</th>
            <th data-field="inventory_number">{{ __('inventory/reports/writtenoff.inventory_number') }}</th>
            <th data-field="accounting_code" data-visible="false">{{ __('inventory/reports/writtenoff.accounting_code') }}</th>
            <th data-field="ip" data-visible="false">{{ __('inventory/reports/writtenoff.ip') }}</th>
            <th data-sortable="true" data-field="cancelled" data-formatter="checkFormatter">{{ __('inventory/reports/writtenoff.cancelled') }}</th>
            <th data-sortable="true" data-field="id_operator" data-formatter="operatorFormatter" data-visible="false">{{ __('inventory/reports/writtenoff.operator') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            var select  = $('#id_types');
            var date_from = $('#date_from');
            var date_to = $('#date_to');
            params.id_types = select.val();
            params.date_from = date_from.val();
            params.date_to = date_to.val();
            return params;
        }

        function writtenOffPropertyReportApiResponse(params) {
            var url = '/inventory/reports/written-off-property/written-off-property-report-api-response';
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

        function formReport () {
            $('#btable').bootstrapTable('refresh');
        }

    </script>
@endsection
