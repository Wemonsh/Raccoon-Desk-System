@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/reports/movement.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/reports/movement.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/reports/movement.MTM_movement') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/reports/movement.MTM_movement') }}</h1>
    <hr>
    <div class="toolbar">
        <div class="form-group">
            <div class="form-inline mb-3">
                {!! Form::label('date_from', __('inventory/reports/movement.date_from'), ['class' => 'mr-1']) !!}
                {!! Form::date('date_from', $date_from, ['class' => 'form-control mr-1', 'id' => 'date_from', 'name' => 'date_from']) !!}
                {!! Form::label('date_to', __('inventory/reports/movement.date_to'), ['class' => 'mr-1']) !!}
                {!! Form::date('date_to', $date_to, ['class' => 'form-control mr-1', 'id' => 'date_to', 'name' => 'date_to']) !!}
            </div>
            <div class="form-inline mb-3">
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="movements" id="exampleRadios1" value="1">
                    <label class="form-check-label" for="exampleRadios1">
                        {{ __('inventory/reports/movement.moved') }}
                    </label>
                </div>
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="movements" id="exampleRadios2" value="2">
                    <label class="form-check-label" for="exampleRadios2">
                        {{ __('inventory/reports/movement.received') }}
                    </label>
                </div>
                <div class="form-check mr-2">
                    <input class="form-check-input" type="radio" name="movements" id="exampleRadios3" value="3" checked>
                    <label class="form-check-label" for="exampleRadios3">
                        {{ __('inventory/reports/movement.moved_and_received') }}
                    </label>
                </div>
            </div>
            <div class="form-inline">
                {!! Form::select('idPlacementFrom', $placements, null, ['class' => 'form-control mr-1', 'id' => 'idPlacementFrom', 'name' => 'idPlacementFrom', 'placeholder' => __('inventory/reports/movement.all_placements')] ) !!}
                {!! Form::button(__('inventory/reports/movement.form'), ['class' => 'btn btn-secondary', 'id' => 'btn_show', 'name' => 'btn_show', 'onClick' => 'formReport();']) !!}
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
            <th data-sortable="true" data-field="id" class="text-center"> {{ __('inventory/reports/movement.id') }}</th>
            <th data-sortable="true" data-field="created_at"> {{ __('inventory/reports/movement.date') }}</th>
            <th data-field="id_inventory" data-formatter="inventoryFormatter"> {{ __('inventory/reports/movement.property_serial_number') }}</th>
            <th data-field="id_placement_from" data-formatter="placementFromFormatter"> {{ __('inventory/reports/movement.from') }}</th>
            <th data-field="id_placement_to" data-formatter="placementToFormatter"> {{ __('inventory/reports/movement.to') }}</th>
            <th data-field="comment"> {{ __('inventory/reports/movement.comment') }}</th>
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
            return params;
        }

        function movementReportApiResponse(params) {
            var url = '/inventory/reports/movement/movement-report-api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }
        {{--TODO "Перейти к имуществу" !!!!--}}
        function inventoryFormatter(value ,rows) {
            if (rows != null) {
                console.log(rows);
                return '<a href="/inventory/inventories/show/'+ rows.inventory.device.id +'" title="Перейти к имуществу">' +
                    ''+rows.inventory.device.name+ ' / ' + rows.inventory.inventory_number+'' +
                    '</a>';
            }
        }

        function placementFromFormatter(value ,rows) {
            if (rows != null) {
                return rows.placement_from.name;
            }
        }

        function placementToFormatter(value ,rows) {
            if (rows != null) {
                return rows.placement_to.name;
            }
        }

        function formReport () {
            $('#btable').bootstrapTable('refresh');
        }

    </script>
@endsection
