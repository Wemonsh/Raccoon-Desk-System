@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/models/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/models/index.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/models/index.mcpi_models') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/models/index.mcpi_models') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('cryptoMcpiModelsCreate') }}">{{ __('crypto/models/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('crypto/models/index.id') }}</th>
            <th data-sortable="true" data-field="name">{{ __('crypto/models/index.name') }}</th>
            <th data-field="reg_number">{{ __('crypto/models/index.reg_number') }}</th>
            <th data-field="information">{{ __('crypto/models/index.information') }}</th>
            <th data-field="comment">{{ __('crypto/models/index.comment') }}</th>
            <th data-field="date_from">{{ __('crypto/models/index.date_from') }}</th>
            <th data-field="date_to">{{ __('crypto/models/index.date_to') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">{{ __('crypto/models/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/crypto/mcpi-models/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        {{--TODO "Basic example"  "Редактировать"  "Удалить"  изменить!!!  --}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/crypto/mcpi-models/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection