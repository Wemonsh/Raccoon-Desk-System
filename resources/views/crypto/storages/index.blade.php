@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/storages/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/storages/index.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/storages/index.key_info_carriers') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/storages/index.key_info_carriers') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('cryptoStoragesCreate') }}">{{ __('crypto/storages/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('crypto/storages/index.id') }}</th>
            <th data-sortable="true" data-field="serial_number">{{ __('crypto/storages/index.serial_number') }}</th>
            <th data-field="comment">{{ __('crypto/storages/index.comment') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">{{ __('crypto/storages/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/crypto/storages/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }
        {{--TODO "Basic example"  "Редактировать"  "Удалить" !!!--}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/crypto/storages/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection
