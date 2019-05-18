@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/devices/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/devices/index.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/devices/index.mtm_groups') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/devices/index.mtm_groups') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('devicesCreate') }}">{{ __('inventory/devices/index.add') }}</a>
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
            <th data-sortable="true" data-field="id">Id</th>
            <th data-sortable="true" data-field="name">{{ __('inventory/devices/index.name') }}</th>
            <th data-field="id_manufacture">{{ __('inventory/devices/index.manufacturer') }}</th>
            <th data-field="id_type">{{ __('inventory/devices/index.type') }}</th>
            <th data-field="specifications">{{ __('inventory/devices/index.specifications') }}</th>
            <th data-field="photo" data-formatter="imageFormatter">{{ __('inventory/devices/index.image') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">{{ __('inventory/devices/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>

        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        // Вывод изображения в таблице вместо текста! Надо ли это вообще? Ломается при этом колонка "Действия"
        // TODO Решить убрать или оставить!
        function imageFormatter(value, row) {
            if (value != null) {
                return '<img src="/storage/'+value+'" class="card-img-top rounded" style="max-width: 50px; max-height: 50px;"/>';
            }
        }

        function ajaxRequest(params) {
            var url = '/inventory/devices/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            })
        }

        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/devices/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection