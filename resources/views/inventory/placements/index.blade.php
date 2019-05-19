@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/placements/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/placements/index.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/placements/index.placements') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/placements/index.placements') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('placementsCreate') }}">{{ __('inventory/placements/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('inventory/placements/index.id') }}</th>
            <th data-sortable="true" data-field="name">{{ __('inventory/placements/index.name') }}</th>
            <th data-field="comment">{{ __('inventory/placements/index.comment') }}</th>
            {{-- TODO Оставляем вывод названия организации так??? --}}
            <th data-sortable="true" data-field="id_organization" data-formatter="organizationFormatter">{{ __('inventory/placements/index.organization_name') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">{{ __('inventory/placements/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/inventory/placements/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function organizationFormatter(value ,rows) {
            if (rows != null) {
                return rows.organization.name;
            }
        }
        {{--TODO "Basic example"  "Редактировать"  "Удалить" изменить!!! --}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/placements/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>

@endsection

