@extends('layouts.default')

@section('content')
    <h1>Производители</h1>
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
            <th data-sortable="true" data-field="name">Название</th>
            <th data-field="description">Описание</th>
            <th data-field="logotype" data-formatter="imageFormatter">Логотип</th>
            <th>Действие</th>
        </tr>
        </thead>
    </table>

    <script>
        // your custom ajax request here

        window.icons = {

        };

        function dataQueryParams(params) {
            // console.log(params);
            params.page = params.pageNumber;
            // params.page = (params.offset + 10) / 10;
            return params;
        }


        // Вывод изображения в таблице вместо текста! Надо ли это вообще? Ломается при этом колонка "Действия"
        // TODO Решить убрать или оставить!
        function imageFormatter(value, row) {
            return '<img src="/storage/'+value+'" class="card-img-top rounded" style="max-width: 50px;"/>';
        }




        function ajaxRequest(params) {
            var url = '/inventory/manufactures/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            })
        }
    </script>

@endsection
