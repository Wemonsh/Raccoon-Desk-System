@extends('layouts.default')

@section('content')
    <ol class="breadcrumb mt-3">
        <li class="breadcrumb-item">
            <a href="index.html">Главная</a>
        </li>
        <li class="breadcrumb-item">
            <a href="index.html">Активы предприятия</a>
        </li>
        <li class="breadcrumb-item active">Контрагенты</li>
    </ol>

    <h1>Контрагенты</h1>
    <hr>



    <div class="toolbar">
        <a class="btn btn-secondary text-light" data-toggle="modal" data-target="#exampleModalCenter">Добавить</a>
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
            <th data-sortable="true" data-field="name">Имя</th>
            <th data-field="tin">ИНН</th>
            <th data-field="code">КПП</th>
            <th data-sortable="true" data-field="purchase" data-formatter="checkFormatter" class="text-center">Покупка</th>
            <th data-sortable="true" data-field="sale" data-formatter="checkFormatter" class="text-center">Продажа</th>
            <th data-sortable="true" data-field="tracking" data-formatter="checkFormatter" class="text-center">Контроль</th>
            <th data-field="comment">Комментарий</th>
            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true">Действие</th>
        </tr>
        </thead>
    </table>

    <script>
        function dataQueryParams(params) {
            params.page = params.pageNumber;
            return params;
        }

        function ajaxRequest(params) {
            var url = '/inventory/counterparty/api-response';
            $.get(url + '?' + $.param(params.data)).then(function (res) {
                params.success(res)
            });
        }

        function checkFormatter(value ,rows) {
            if (value != null) {
                return '<i class="fas fa-check"></i>';
            }
        }

        function actionFormatter(value ,rows) {
            return '<div class="btn-group" role="group" aria-label="Basic example">' +
                '<a class="btn btn-secondary btn-sm text-light"><i class="fas fa-file-alt"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light"><i class="fas fa-pen"></i></a>' +
                '<a class="btn btn-secondary btn-sm text-light"><i class="fas fa-trash-alt"></i></a>' +
                '</div>';
        }
    </script>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                {!! Form::open(array('route' => 'counterpartyCreate', 'method' => 'POST', 'files' => 'true')) !!}
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Добавить</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('warning'))
                        <div class="alert alert-danger">
                            {{ Session::get('warning') }}
                        </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('name', 'Название контрагента:') !!}
                        <div>
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('tin', 'ИНН:') !!}
                        <div>
                            {!! Form::text('tin', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('tin', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('code', 'КПП:') !!}
                        <div>
                            {!! Form::text('code', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('code', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::checkbox('purchase', '1', false, ['id' => 'purchase']) !!}
                        {!! Form::label('purchase', 'Покупаем:') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::checkbox('sale', '1', false, ['id' => 'sale']) !!}
                        {!! Form::label('sale', 'Продаем:') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::checkbox('tracking', '1', false, ['id' => 'tracking']) !!}
                        {!! Form::label('tracking', 'На контроле:') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('comment', 'Комментарий:') !!}
                        <div>
                            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection