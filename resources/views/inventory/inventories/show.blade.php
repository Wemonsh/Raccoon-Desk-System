@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Имущество</a></li>
            <li class="breadcrumb-item active" aria-current="page">...</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ $object->device->name }} + Серийник + инвентарник</h1>
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
                            <th rowspan="2">Дата</th>
                            <th rowspan="1" colspan="2">Откуда</th>
                            <th rowspan="1" colspan="2">Куда</th>
                            <th rowspan="2">Комментарий</th>
                        </tr>
                        <tr>
                            <th>Помещение</th>
                            <th>Сотрудник</th>
                            <th>Помещение</th>
                            <th>Сотрудник</th>
                        </tr>

                        {{--<tr>--}}
                            {{--<th data-sortable="true" data-field="id">Id</th>--}}
                            {{--<th data-sortable="true" data-field="name">Название</th>--}}
                            {{--<th data-field="id_manufacture">Производитель</th>--}}
                            {{--<th data-field="id_type">Тип</th>--}}
                            {{--<th data-field="specifications">Особенности</th>--}}
                            {{--<th data-field="photo" data-formatter="imageFormatter">Изображение</th>--}}
                            {{--<th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>--}}
                        {{--</tr>--}}
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">История ремонтов:</h5>

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
                            <th data-sortable="true" data-field="id">Id</th>
                            <th data-sortable="true" data-field="name">Название</th>
                            <th data-field="id_manufacture">Производитель</th>
                            <th data-field="id_type">Тип</th>
                            <th data-field="specifications">Особенности</th>
                            <th data-field="photo" data-formatter="imageFormatter">Изображение</th>
                            <th data-formatter="actionFormatter" class="text-center" data-print-ignore="true" data-width="50px">Действие</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection