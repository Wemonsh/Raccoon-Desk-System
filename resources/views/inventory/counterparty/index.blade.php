@extends('layouts.default')

@section('content')
    <h1>Контрагенты</h1>
    <hr>

    <table
            data-ajax="ajaxRequest"
            data-side-pagination="server"
            data-toggle="table"
            data-pagination="true"
            data-query-params="dataQueryParams"
            data-page-number="1"
            data-search="true"
            data-query-params-type=""
            data-show-print="true">
        <thead>
        <tr>
            <th data-sortable="true" data-field="id">Id</th>
            <th data-sortable="true" data-field="name">Имя</th>
            <th data-field="tin">ИНН</th>
            <th data-field="code">КПП</th>
            <th data-sortable="true" data-field="purchase">Покупка</th>
            <th data-sortable="true" data-field="sale">Продажа</th>
            <th data-sortable="true" data-field="tracking">Контроль</th>
            <th data-field="comment">Комментарий</th>
            <th>Действие</th>
        </tr>
        </thead>
    </table>

    <script>
        // your custom ajax request here

        window.icons = {

        };


        function dataQueryParams(params) {




//            console.log(params);
            params.page = params.pageNumber;
//            params.page = (params.offset + 10) / 10;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/inventory/counterparty/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            })
        }
    </script>


@endsection