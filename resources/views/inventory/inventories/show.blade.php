@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoriesIndex') }}">Имущество</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $object->device->name }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ $object->device->name }}</h1>
    <hr>

    <div class="row">
        <div class="col-4">
            <img src="{{ asset('/storage/' . $object->device->photo) }}" class="img-fluid img-thumbnail" alt="">



        </div>
        <div class="col-4">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Характеристики:</h5>
                    <table class="table table-sm">
                        <tbody>
                        @foreach(json_decode($object->device->specifications) as $key => $specification)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $specification }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Основная информация:</h5>
                    <p><strong>Дата регистрации:</strong> {{ $object->date_arrival }} </p>
                    <p><strong>Серийный номер:</strong> {{ $object->serial_number }} </p>
                    <p><strong>Инвентарный номер:</strong> {{ $object->inventory_number }} </p>
                    <p><strong>Бухгалтерский код:</strong> {{ $object->accounting_code }} </p>
                    <p><strong>Стоимость:</strong> {{ $object->cost }} </p>
                    <p><strong>Текущая стоимость:</strong> {{ $object->cost_current }} </p>
                    <p><strong>IP адрес:</strong> {{ $object->ip }} </p>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">История перемещений:</h5>
                    <div class="toolbar">
                        <a class="btn btn-secondary text-light" data-toggle="modal" data-target="#movementModal">Переместить</a>
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
                            <th data-field="created_at" rowspan="2">Дата</th>
                            <th rowspan="1" colspan="2">Откуда</th>
                            <th rowspan="1" colspan="2">Куда</th>
                            <th data-field="comment" rowspan="2">Комментарий</th>
                        </tr>
                        <tr>
                            <th data-field="id_placement_from">Помещение</th>
                            <th data-field="id_responsible_from">Сотрудник</th>
                            <th data-field="id_placement_to">Помещение</th>
                            <th data-field="id_responsible_to">Сотрудник</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <script>
            function dataQueryParams(params) {
                params.page = params.pageNumber;
                return params;
            }

            function ajaxRequest(params) {
                var url = '/inventory/movement/move-api-response';
                $.get(url + '?' + $.param(params.data)).then(function (res) {
                    params.success(res)
                });
            }

//            function organizationFormatter(value ,rows) {
//                if (rows != null) {
//                    return rows.organization.name;
//                }
//            }

//            function actionFormatter(value ,rows) {
//                return '<div class="btn-group" role="group" aria-label="Basic example">' +
//                    '<a class="btn btn-secondary btn-sm text-light" href="/inventory/placements/edit/'+ rows['id'] +'" title="Редактировать"><i class="fas fa-pen"></i></a>' +
//                    '<a class="btn btn-secondary btn-sm text-light" href="" title="Удалить"><i class="fas fa-trash-alt"></i></a>' +
//                    '</div>';
//            }
        </script>

        <div class="modal fade" id="movementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {!! Form::open(array('route' => 'movementMove', 'method' => 'POST')) !!}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

                        {!! Form::hidden('id_inventory', $object->id ) !!}

                        <div class="form-group">
                            {!! Form::label('id_placement_to', 'Помещение:') !!}
                            <div>
                                {!! Form::select('id_placement_to', $placements, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('id_placement_to', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('id_responsible_to', 'Ответственный:') !!}
                            <div>
                                {!! Form::select('id_responsible_to', $users, null, ['class' => 'form-control']) !!}
                                {!! $errors->first('id_responsible_to', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('comment', 'Комментарий:') !!}
                            <div>
                                {!! Form::textarea('comment', null, ['rows'=> '3', 'class' => 'form-control']) !!}
                                {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>


        {{--<div class="col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h5 class="card-title">История ремонтов:</h5>--}}

                    {{--<table--}}
                            {{--data-ajax="ajaxRequest"--}}
                            {{--data-side-pagination="server"--}}
                            {{--data-toggle="table"--}}
                            {{--data-pagination="true"--}}
                            {{--data-query-params="dataQueryParams"--}}
                            {{--data-page-number="1"--}}
                            {{--data-search="true"--}}
                            {{--data-query-params-type=""--}}
                            {{--data-show-print="true"--}}
                            {{--data-toolbar=".toolbar1"--}}
                            {{--data-show-columns="true"--}}
                            {{--data-minimum-count-columns="2"--}}
                            {{--data-show-refresh="true">--}}
                        {{--<thead>--}}
                        {{--<tr>--}}
                            {{--<th data-sortable="true" data-field="id">Id</th>--}}
                            {{--<th data-sortable="true" data-field="name">Название</th>--}}
                            {{--<th data-field="id_manufacture">Производитель</th>--}}
                            {{--<th data-field="id_type">Тип</th>--}}
                            {{--<th data-field="specifications">Особенности</th>--}}
                            {{--<th data-field="photo" data-formatter="imageFormatter">Изображение</th>--}}
                            {{--<th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>--}}
                        {{--</tr>--}}
                        {{--</thead>--}}
                    {{--</table>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection