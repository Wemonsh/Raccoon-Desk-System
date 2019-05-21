@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item active" aria-current="page">Списанное имущество</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Списанное имущество</h1>
    <hr>
    <div class="toolbar">
        <div class="form-group">
            <div class="form-inline mb-3">
                {!! Form::label('date_from', 'Дата от', ['class' => 'mr-1']) !!}
                {!! Form::date('date_from', $date_from, ['class' => 'form-control mr-1', 'id' => 'date_from', 'name' => 'date_from']) !!}
                {!! Form::label('date_to', 'Дата до', ['class' => 'mr-1']) !!}
                {!! Form::date('date_to', $date_to, ['class' => 'form-control mr-1', 'id' => 'date_to', 'name' => 'date_to']) !!}
            </div>
            <div class="form-inline">
                {!! Form::select('id_types', $types, null, ['class' => 'form-control mr-1', 'id' => 'id_types', 'name' => 'id_types', 'placeholder' => 'Все типы МТС'] ) !!}
                {!! Form::button('Сформировать', ['class' => 'btn btn-secondary', 'id' => 'btn_show', 'name' => 'btn_show', 'onClick' => 'formReport();']) !!}
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
            <th data-sortable="true" data-field="id" class="text-center">Id</th>
            <th data-sortable="true" data-field="serial_number">Серийный номер</th>
            <th data-sortable="true" data-field="id_device" data-formatter="deviceFormatter">Устройство</th>
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter" data-visible="false">Поставщик</th>
            <th data-sortable="true" data-field="date_arrival">Дата добавления</th>
            <th data-sortable="true" data-field="id_placement" data-formatter="placementFormatter">Помещение</th>
            <th data-sortable="true" data-field="id_responsible" data-formatter="responsibleFormatter">Ответственный</th>
            <th data-sortable="true" data-field="id_status" data-formatter="statusFormatter">Статус</th>
            <th data-sortable="true" data-field="date_warranty">Гарантия</th>
            <th data-field="cost" data-visible="false">Стоимость</th>
            <th data-field="cost_current" data-visible="false">Текущая стоимость</th>
            <th data-field="inventory_number">Инвентарный номер</th>
            <th data-field="accounting_code" data-visible="false">Бухгалтерский код</th>
            <th data-field="ip" data-visible="false">IP адрес</th>
            <th data-sortable="true" data-field="cancelled" data-formatter="checkFormatter">Списано</th>
            <th data-sortable="true" data-field="id_operator" data-formatter="operatorFormatter" data-visible="false">Оператор</th>
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
