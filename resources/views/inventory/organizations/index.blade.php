@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/organizations/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/organizations/index.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/organizations/index.organizations') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/organizations/index.organizations') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('organizationsCreate') }}">{{ __('inventory/organizations/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('inventory/organizations/index.id') }}</th>
            <th data-sortable="true" data-field="name">{{ __('inventory/organizations/index.name') }}</th>
            <th data-field="address" data-formatter="addressFormatter">{{ __('inventory/organizations/index.address') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">{{ __('inventory/organizations/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/inventory/organizations/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function addressFormatter(value ,rows) {
            if (value != null) {
                var arr = JSON.parse(value);
                return arr[0].street_house_office + ', ' + arr[0].sity + ', ' + arr[0].region + ', ' + arr[0].district + ', ' + arr[0].country + ', ' + arr[0].postcode;
            }
        }
        {{--TODO "Basic example"  "Договора"  "Редактировать"  "Удалить" исправить!!!--}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Договора"><i class="fas fa-file-alt"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="/inventory/organizations/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>

@endsection
