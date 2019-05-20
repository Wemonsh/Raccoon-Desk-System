@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item active" aria-current="page">Движение МТС</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Движение материально-технических средств</h1>
    <hr>
    <div class="toolbar">
        <div class="form-group">
            <div class="form-inline mb-3">
                {!! Form::label('date_from', 'Дата от', ['class' => 'mr-1']) !!}
                {!! Form::date('date_from', $date_from, ['class' => 'form-control mr-1', 'id' => 'date_from', 'name' => 'date_from']) !!}
                {!! Form::label('date_to', 'Дата до', ['class' => 'mr-1']) !!}
                {!! Form::date('date_to', $date_to, ['class' => 'form-control mr-1', 'id' => 'date_to', 'name' => 'date_to']) !!}
            </div>
            <div class="form-inline mb-3">
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="movements" id="exampleRadios1" value="1">
                    <label class="form-check-label" for="exampleRadios1">
                        Перемещено
                    </label>
                </div>
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="movements" id="exampleRadios2" value="2">
                    <label class="form-check-label" for="exampleRadios2">
                        Поступило
                    </label>
                </div>
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="movements" id="exampleRadios3" value="3" checked>
                    <label class="form-check-label" for="exampleRadios3">
                        Перемещено и поступило
                    </label>
                </div>
            </div>
            <div class="form-inline">
                {!! Form::select('idPlacementFrom', $placements, null, ['class' => 'form-control mr-1', 'id' => 'idPlacementFrom', 'name' => 'idPlacementFrom', 'placeholder' => 'Все помещения'] ) !!}
                {!! Form::button('Сформировать', ['class' => 'btn btn-secondary', 'id' => 'btn_show', 'name' => 'btn_show', 'onClick' => 'showResponsible()']) !!}
            </div>
        </div>
    </div>
    <table
            data-ajax="movementReportApiResponse"
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
            <th data-sortable="true" data-field="created_at">Дата</th>
            <th data-field="id_inventory" data-formatter="inventoryFormatter">Имущество / Серийный номер</th>
            <th data-field="id_placement_from" data-formatter="placementFromFormatter">Откуда</th>
            <th data-field="id_placement_to" data-formatter="placementToFormatter">Куда</th>
            <th data-field="comment">Комментарий</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            var select  = $('#idPlacementFrom');
            var date_from = $('#date_from');
            var date_to = $('#date_to');
            var radio =  $('input[name=movements]:checked').val();

            params.idPlacementFrom = select.val();
            params.date_from = date_from.val();
            params.date_to = date_to.val();
            params.radio = radio;
            console.log(params);
            return params;
        }

        function movementReportApiResponse(params) {
            var url = '/inventory/reports/movement/movement-report-api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function inventoryFormatter(value ,rows) {
            if (rows != null) {
                console.log(rows);
                return '<a href="/inventory/inventories/show/'+ rows.inventory.device.id +'" title="Перейти к имуществу">' +
                    ''+rows.inventory.device.name+ ' / ' + rows.inventory.inventory_number+'' +
                    '</a>';

                //return rows.device_name;
            }
        }

        function placementFromFormatter(value ,rows) {
            if (rows != null) {
                return rows.placement_from.name;
                //return rows.placement_name;
            }
        }

        function placementToFormatter(value ,rows) {
            if (rows != null) {
                return rows.placement_to.name;
                //return rows.placement_name;
            }
        }

        function showResponsible () {
            $('#btable').bootstrapTable('refresh');
        }

    </script>
@endsection
