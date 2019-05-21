@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/organizations/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/organizations/index.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/organizations/index.organizations') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/organizations/index.organizations') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('cryptoOrganizationsCreate') }}">{{ __('crypto/organizations/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('crypto/organizations/index.id') }}</th>
            <th data-sortable="true" data-field="name">{{ __('crypto/organizations/index.name') }}</th>
            <th data-field="address" data-formatter="addressFormatter">{{ __('crypto/organizations/index.address') }}</th>
            <th data-field="phone">{{ __('crypto/organizations/index.phone') }}</th>
            <th data-field="email">{{ __('crypto/organizations/index.email') }}</th>
            <th data-field="site" data-formatter="siteFormatter">{{ __('crypto/organizations/index.site') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">{{ __('crypto/organizations/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/crypto/organizations/api-response';
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

        function siteFormatter(value ,rows) {
            if (rows != null) {
                return '<a href="//'+rows.site+'">'+rows.site+'</a>';
            }
        }
        {{--TODO "Basic example"  "Подробнее"  "Редактировать"  "Удалить"--}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/crypto/organizations/show/'+ rows['id'] +'" title="Подробнее"><i class="fas fa-info-circle"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="/crypto/organizations/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection