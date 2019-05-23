@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/inventories/show.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/inventories/show.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoriesIndex') }}">{{ __('inventory/inventories/show.property') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $object->device->name }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1 id="deviceName" data-id="{{ $object->id }}">{{ $object->device->name }}</h1>
    <hr>
{{--TODO "Изображение отсутствует" !!!!!!!!!--}}
    <div class="row">
        <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 mb-3">
            <img src="{{ asset('/storage/' . $object->device->photo) }}" class="img-fluid img-thumbnail" alt="Изображение отсутствует">
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('inventory/inventories/show.features') }}</h5>
                    <table class="table table-sm">
                        <tbody>
                        @foreach(json_decode($object->device->specifications) as $key => $specification)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $specification }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-sm-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ __('inventory/inventories/show.main_info') }}</h5>
                    <p><strong>{{ __('inventory/inventories/show.registration_date') }}</strong> {{ $object->date_arrival }} </p>
                    <p><strong>{{ __('inventory/inventories/show.serial_number') }}</strong> {{ $object->serial_number }} </p>
                    <p><strong>{{ __('inventory/inventories/show.inventory_number') }}</strong> {{ $object->inventory_number }} </p>
                    <p><strong>{{ __('inventory/inventories/show.accounting_code') }}</strong> {{ $object->accounting_code }} </p>
                    <p><strong>{{ __('inventory/inventories/show.cost') }}</strong> {{ $object->cost }} </p>
                    <p><strong>{{ __('inventory/inventories/show.current_cost') }}</strong> {{ $object->cost_current }} </p>
                    <p><strong>{{ __('inventory/inventories/show.ip') }}</strong> {{ $object->ip }} </p>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card mt-3 mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ __('inventory/inventories/show.moving_history') }}</h5>
                    <div class="toolbar">
                        <a class="btn btn-secondary text-light" data-toggle="modal" data-target="#movementModal">{{ __('inventory/inventories/show.move') }}</a>
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
                            <th data-sortable="true" data-field="created_at" rowspan="2">{{ __('inventory/inventories/show.date') }}</th>
                            <th rowspan="1" colspan="2">{{ __('inventory/inventories/show.from') }}</th>
                            <th rowspan="1" colspan="2">{{ __('inventory/inventories/show.to') }}</th>
                            <th data-field="comment" rowspan="2">{{ __('inventory/inventories/show.comment') }}</th>
                        </tr>
                        <tr>
                            <th data-sortable="true" data-field="id_placement_from" data-formatter="placementFromFormatter">{{ __('inventory/inventories/show.placement') }}</th>
                            <th data-field="id_responsible_from" data-formatter="responsibleFromFormatter">{{ __('inventory/inventories/show.employee') }}</th>
                            <th data-sortable="true" data-field="id_placement_to" data-formatter="placementToFormatter">{{ __('inventory/inventories/show.placement') }}</th>
                            <th data-field="id_responsible_to" data-formatter="responsibleToFormatter">{{ __('inventory/inventories/show.employee') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <script>
            function dataQueryParams(params) {
                var deviceId = document.getElementById('deviceName');
                params.page = params.pageNumber;
                params.id = deviceId.dataset.id;
                return params;
            }

            function ajaxRequest(params) {
                var url = '/inventory/movement/move-api-response';
                $.get(url + '?' + $.param(params.data)).then(function (res) {
                    params.success(res)
                });
            }

            function placementFromFormatter(value ,rows) {
               if (rows != null) {
                   return rows.placement_from.name;
               }
            }

            function responsibleFromFormatter(value ,rows) {
                if (rows != null) {
                    return rows.responsible_from.last_name + ' ' + rows.responsible_from.first_name + ' ' + rows.responsible_from.middle_name;
                }
            }

            function placementToFormatter(value ,rows) {
                if (rows != null) {
                    return rows.placement_to.name;
                }
            }

            function responsibleToFormatter(value ,rows) {
                if (rows != null) {
                    return rows.responsible_to.last_name + ' ' + rows.responsible_to.first_name + ' ' + rows.responsible_to.middle_name;
                }
            }
        </script>

        <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    {!! Form::open(array('route' => 'movementMove', 'method' => 'POST')) !!}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('inventory/inventories/show.MTM_moving') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('warning'))
                            <div class="alert alert-danger">
                                {{ Session::get('warning') }}
                            </div>
                        @endif

                        {!! Form::hidden('id_inventory', $object->id ) !!}
                         {{--TODO placement c : !!!--}}
                        <div class="form-group">
                            {!! Form::label('id_placement_to', __('inventory/inventories/show.placement')) !!}
                            <div>
                                {!! Form::select('id_placement_to', $placements, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('id_placement_to', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                            {{--TODO responsible c : !!!--}}
                        <div class="form-group">
                            {!! Form::label('id_responsible_to', __('inventory/inventories/show.responsible')) !!}
                            <div>
                                {!! Form::select('id_responsible_to', $users, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('id_responsible_to', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                            {{--TODO comment c : !!!--}}
                        <div class="form-group">
                            {!! Form::label('comment', __('inventory/inventories/show.comment')) !!}
                            <div>
                                {!! Form::textarea('comment', null, ['rows'=> '3', 'class' => 'form-control']) !!}
                                {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('inventory/inventories/show.cancel') }}</button>
                        {!! Form::submit(__('inventory/inventories/show.add'), ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

        {{--<div class="col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">История ремонтов:</h5>--}}

                    {{--<table--}}
                            {{--data-ajax="ajaxRequest"--}}
                            {{--data-side-pagination="server"--}}
                            {{--data-toggle="table"--}}
                            {{--data-pagination="true"--}}
                            {{--data-query-params="dataQueryParams"--}}
                            {{--data-page-number="1"--}}
                            {{--data-search="true"--}}
                            {{--data-query-params-type=""--}}
                            {{--data-show-print="true"--}}
                            {{--data-toolbar=".toolbar1"--}}
                            {{--data-show-columns="true"--}}
                            {{--data-minimum-count-columns="2"--}}
                            {{--data-show-refresh="true">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th data-sortable="true" data-field="id">Id</th>--}}
                            {{--<th data-sortable="true" data-field="name">Название</th>--}}
                            {{--<th data-field="id_manufacture">Производитель</th>--}}
                            {{--<th data-field="id_type">Тип</th>--}}
                            {{--<th data-field="specifications">Особенности</th>--}}
                            {{--<th data-field="photo" data-formatter="imageFormatter">Изображение</th>--}}
                            {{--<th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection