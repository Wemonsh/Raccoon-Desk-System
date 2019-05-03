@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ключевая информация</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Ключевая информация</h1>
    <hr>
    <div class="toolbar">
        <a class="btn btn-secondary text-light" href="{{ route('cryptoCertificatesCreate') }}">Добавить</a>
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
            <th data-sortable="true" data-field="id" class="text-center">Id</th>
            <th data-sortable="true" data-field="serial_number">Серийный номер</th>
            <th data-sortable="true" data-field="id_organization" data-formatter="organizationFormatter">Организация</th>
            <th data-sortable="true" data-field="id_user" data-formatter="userFormatter">Пользователь</th>
            <th data-field="id_assignment" data-formatter="assignmentFormatter">Назначение</th>
            <th data-field="file" data-formatter="fileFormatter" data-width="50px" data-class="align-middle text-center">Файл</th>
            <th data-field="date_from">Дата начала</th>
            <th data-field="date_to">Дата окончания</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>
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

        function fileFormatter(value ,rows) {
            console.log(rows);
            if (rows['file'] !=null) {
                return '<a href="/storage/'+ rows['file'] +'" class="btn btn-secondary btn-sm" title="Скачать"><i class="fas fa-arrow-down"></i></a>';
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

        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/crypto/certificates/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>
@endsection
