@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Имущество</a></li>
            <li class="breadcrumb-item active" aria-current="page">МТС на рабочем месте</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>МТС на рабочем месте</h1>
    <hr>
    <div class="toolbar">
        <div class="form-group">
            {!! Form::label('id_responsible', 'Ответственный:') !!}
            <div class="form-inline">
                {!! Form::select('id_responsible', $responsible, null, ['class' => 'form-control mr-1'] ) !!}
                {!! Form::button('Отобразить', ['class' => 'btn btn-secondary', 'id' => 'btn_show', 'name' => 'btn_show', 'onClick' => 'showResponsible()']) !!}
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
            <th data-sortable="true" data-field="id" class="text-center">Id</th>
            <th data-sortable="true" data-field="serial_number">Серийный номер</th>
            <th data-sortable="true" data-field="id_device" data-formatter="deviceFormatter">Устройство</th>
            <th data-sortable="true" data-field="id_counterparty" data-formatter="counterpartyFormatter">Поставщик</th>
            <th data-sortable="true" data-field="date_arrival">Дата добавления</th>
            <th data-sortable="true" data-field="id_placement" data-formatter="placementFormatter">Помещение</th>
            <th data-sortable="true" data-field="id_responsible" data-formatter="responsibleFormatter">Ответственный</th>
            <th data-sortable="true" data-field="id_status" data-formatter="statusFormatter">Статус</th>
            <th data-sortable="true" data-field="date_warranty">Гарантия</th>
            <th data-field="cost">Стоимость</th>
            <th data-field="cost_current">Текущая стоимость</th>
            <th data-field="inventory_number">Инвентарный номер</th>
            <th data-field="accounting_code">Бухгалтерский код</th>
            <th data-field="ip">IP адрес</th>
            <th data-sortable="true" data-field="cancelled" data-formatter="checkFormatter">Списано</th>
            <th data-sortable="true" data-field="id_operator" data-formatter="operatorFormatter">Оператор</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">Действие</th>
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