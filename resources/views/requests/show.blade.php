@extends('layouts.default')

@section('content')
    <h1>Заявка № {{ $request->id }}</h1>
    <hr>

    <div class="row">
        <div class="col-6">
            <h2>Информация</h2>
            <p>Категория: {{ $request['requestsCategory']->name }}</p>
            <p>Статус:
                @if($request['requestsStatuses']->name == 'В работе')
                    <span class="badge badge-warning">В работе</span>
                @elseif($request['requestsStatuses']->name == 'Открытые')
                    <span class="badge badge-success">Открытые</span>
                @elseif($request['requestsStatuses']->name == 'Завершенные')
                    <span class="badge badge-danger">Завершенные</span>
                @else
                    <span class="badge badge-primary">Замороженные</span>
                @endif
            </p>
            <p>Приоритет:
                @if($request['requestsPriority']->name == 'Низкий')
                    <span class="badge badge-success">Низкий</span>
                @elseif($request['requestsPriority']->name == 'Средний')
                    <span class="badge badge-warning">Средний</span>
                @elseif($request['requestsPriority']->name == 'Высокий')
                    <span class="badge badge-danger">Высокий</span>
                @endif
            </p>
            <p>Тема: {{ $request->title }}</p>
            <p>Описание: {{ $request->description }}</p>
            <p>Дата открытия: {{ $request->date_of_creation }}</p>
            @if($request->date_of_closing == null)
                <p>Дата закрытия: Не назначена</p>
            @else
                <p>Дата закрытия: {{ $request->date_of_closing }}</p>
            @endif

            <p>Загруженные файлы:
                @foreach(json_decode($request['files']) as $file)
                <a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a>
                @endforeach
            </p>
        </div>

        <div class="col-3">
            <h2>Сотрудник</h2>
            <p>ФИО: <a href="/account/profile/{{ $request['user']->id }}">{{ $request['user']->last_name.' '.$request['user']->first_name.' '.$request['user']->middle_name }}</a></p>
            <p>Организация: {{ $request['user']->id }}</p>
            <p>Отдел: {{ $request['user']->id }}</p>
            <p>Должность: {{ $request['user']->id }}</p>
            <p>Телефон: {{ $request['user']->phone }}</p>
            <p>IP адрес: {{ $request->ip }}</p>
        </div>
        <div class="col-3">
            <h2>Оператор</h2>
            <p>ФИО:
                @if($request['operator'] != null)
                    <a href="/account/profile/{{ $request['operator']->id }}">{{ $request['operator']->last_name.' '.$request['operator']->first_name.' '.$request['operator']->middle_name }}</a>
                @else
                    Не назначен
                @endif
            </p>
            <p>Организация:
                @if($request['operator'] != null)
                    {{ $request['operator']->id }}
                    @else
                    -
                @endif
            </p>
            <p>Отдел:
                @if($request['operator'] != null)
                    {{ $request['operator']->id }}
                @else
                    -
                @endif
            </p>
            <p>Должность:
                @if($request['operator'] != null)
                    {{ $request['operator']->id }}
                @else
                    -
                @endif
            </p>
        </div>

        <div class="col-6">

            <h2>Сообщения</h2>
            <ul class="list-unstyled">
                <li class="media border mt-1">
                    <img style="width: 60px" src="/" alt="..." class="d-block mr-3 mt-1 ml-1">
                    <div class="media-body">

                    </div>
                </li>
            </ul>

            <div class="card mt-3">
                <div class="card-body">
                    <form action="/requests/send/" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Действие</label>
                            <select class="form-control" name="action" id="exampleFormControlSelect1">

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Сообщение</label>
                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Файл</label>
                            <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            <h2>История заявки</h2>
            <table class="table table-bordered">
                <tbody>

                <tr>

                    <td style="width: 150px">
                        <a href="#">fd</a>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>

    </div>

    @endsection