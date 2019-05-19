@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/certificates/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/certificates/index.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/certificates/index.key_info') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/certificates/index.key_info') }}</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('cryptoCertificatesCreate') }}">{{ __('crypto/certificates/index.add') }}</a>
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
            <th data-sortable="true" data-field="id" class="text-center">{{ __('crypto/certificates/index.id') }}</th>
            <th data-sortable="true" data-field="serial_number">{{ __('crypto/certificates/index.serial_number') }}</th>
            <th data-sortable="true" data-field="id_organization" data-formatter="organizationFormatter">{{ __('crypto/certificates/index.organization') }}</th>
            <th data-sortable="true" data-field="id_user" data-formatter="userFormatter">{{ __('crypto/certificates/index.user') }}</th>
            <th data-field="id_assignment" data-formatter="assignmentFormatter">{{ __('crypto/certificates/index.assignment') }}</th>
            <th data-field="file" data-formatter="fileFormatter" data-width="50px" data-class="align-middle text-center">{{ __('crypto/certificates/index.file') }}</th>
            <th data-field="date_from">{{ __('crypto/certificates/index.date_from') }}</th>
            <th data-field="date_to">{{ __('crypto/certificates/index.date_to') }}</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">{{ __('crypto/certificates/index.action') }}</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/crypto/certificates/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        {{--TODO "Скачать"  "Файл отсутствует"  изменить!!!  --}}
        function fileFormatter(value ,rows) {
            if (rows['file'] !=null) {
                return '<a href="/storage/'+ rows['file'] +'" class="btn btn-secondary btn-sm" title="Скачать">Скачать</a>';
                // return '<a href="/storage/'+ rows['file'] +'" class="btn btn-secondary btn-sm" title="Скачать"><i class="fas fa-arrow-down"></i></a>';
            } else {
                return '<i class="fas fa-minus" title="Файл отсутствует"></i>';
            }
        }

        function organizationFormatter(value ,rows) {
            if (rows != null) {
                return rows.organization.name;
            }
        }

        function userFormatter(value ,rows) {
            if (rows != null) {
                return rows.user.last_name + ' ' + rows.user.first_name + ' ' + rows.user.middle_name;
            }
        }

        function assignmentFormatter(value ,rows) {
            if (rows != null) {
                return rows.assignment.name;
            }
        }

        {{--TODO "Basic example"  "Редактировать"  "Удалить" изменить!!!  --}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/crypto/certificates/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection
