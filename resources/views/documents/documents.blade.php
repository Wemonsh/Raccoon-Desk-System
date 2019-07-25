@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Документы</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>Документы</h1>
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
            data-show-print="true"
            data-toolbar=".toolbar"
            data-show-columns="true"
            data-minimum-count-columns="2"
            data-show-refresh="true">
        <thead>
        <tr>
            <th data-sortable="true" data-field="id" class="text-center">Номер</th>
            <th data-sortable="true" data-field="id_type" class="text-center">Тип</th>
            <th data-sortable="true" data-formatter="modelFormatter" class="text-center">Отдел</th>
            <th data-sortable="true" data-field="date_of_registration" class="text-center">Дата регистрации</th>
            <th data-sortable="true" data-field="id_korrespondent" class="text-center">Корреспондент</th>
            <th data-sortable="true" data-field="content" class="text-center">Содержание</th>
            <th data-sortable="true" data-field="id_executor" class="text-center">Исполнитель</th>
            <th data-sortable="true" data-field="date_of_execution" class="text-center">Срок исполнения</th>
            <th data-sortable="true" data-field="date_of_end_execution" class="text-center">Фактическое исполнение</th>
            <th data-sortable="true" data-field="performance_mark" class="text-center">Отметка</th>
            <th data-formatter="actionFormatter" class="text-center">Действиее</th>

        </tr>
        </thead>
    </table>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="/documents/share" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Поделится</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputEmail1">Документ</label>
                            <input type="text" name="id_document" id="document" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label for="users">Пользователь</label>
                            <select class="form-control" name="user" id="users">
                            </select>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/documents/myDocuments/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function modelFormatter(value, rows) {
            if (rows != null) {
                return rows.departament.number + ' - ' + rows.departament.name;
            }
        }
        {{--TODO "Basic example"  "Редактировать"  "Удалить" изменить!!!  --}}
        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light" href="/documents/incoming/show/'+ rows['id'] +'" title="Подробнее"><i class="fas fa-eye"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light" onclick="modal('+ rows['id'] +')" title="Поделится"><i class="fas fa-share"></i></a>' +
                '</div>';
        }

        function modal(id) {
            $('#exampleModalCenter').modal('show');
            $.get('/documents/api-share' + '?' + 'id=' + id).then(function (res) {
                $('#document').val(id);
                $('#users').find('option').remove();
                $.each(res.rows, function (i, item) {
                    console.log(item);
                    $('#users').append($('<option>', {
                        value: item.id,
                        text : item.last_name + ' ' + item.first_name + ' ' + item.middle_name
                    }));
                });
            });
        }
    </script>

@endsection