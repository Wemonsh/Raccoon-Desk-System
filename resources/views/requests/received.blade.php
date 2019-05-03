@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Принятые заявки</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Принятые заявки</h1>
    <hr>

    {{-- TODO: Доработать постраничную навигацию, убрать или сократить кол-во if --}}

    <ul class="nav nav-tabs">

        @if($id == 2 || $id == null)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsReceived', 2) }}">В работе</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsReceived', 2) }}">В работе</a>
            </li>
        @endif

        @if($id == 3)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsReceived', 3) }}">Замороженные</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsReceived', 3) }}">Замороженные</a>
            </li>
        @endif

        @if($id == 4)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsReceived', 4) }}">Завершенные</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsReceived', 4) }}">Завершенные</a>
            </li>
        @endif

    </ul>

    <table class="table table-bordered table-sm mt-3">
        <thead>
        <tr>
            <th class="align-middle text-center" scope="col">#</th>
            <th class="align-middle text-center" scope="col">Обращение</th>
            <th class="align-middle text-center" scope="col">Пользователь</th>
            <th class="align-middle text-center" scope="col">Дата открытия /<br> закрытия заявки</th>
            <th class="align-middle text-center" scope="col">Статус</th>
            <th class="align-middle text-center" scope="col">Приоритет</th>
            <th class="align-middle text-center" scope="col">Ответственный</th>
            <th class="align-middle text-center" scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td class="align-middle text-center">{{ $request->id }}</td>
                <td class="align-middle text-center"><a href="{{ route('requestsShow', $request->id ) }}">{{ $request->title }}</a><p>{{ $request->description }}</p></td>
                <td class="align-middle text-center">{{ $request['user']->last_name.' '.$request['user']->first_name.' '.$request['user']->middle_name }}</td>
                <td class="align-middle text-center"><p>{{ $request->date_of_creation }}</p><p>{{ $request->date_of_closing }}</p></td>
                <td class="align-middle text-center">
                    @if($request['requestsStatuses']->id == 1)
                        <span class="badge badge-success">Открыта</span>
                    @elseif($request['requestsStatuses']->id == 2)
                        <span class="badge badge-warning">В работе</span>
                    @elseif($request['requestsStatuses']->id == 3)
                        <span class="badge badge-primary">Заморожена</span>
                    @else
                        <span class="badge badge-danger">Закрыта</span>
                    @endif
                </td>
                <td class="align-middle text-center">
                    @if($request['requestsPriority']->id == 1)
                        <span class="badge badge-success">Низкий</span>
                    @elseif($request['requestsPriority']->id == 2)
                        <span class="badge badge-warning">Обычный</span>
                    @elseif($request['requestsPriority']->id == 3)
                        <span class="badge badge-danger">Высокий</span>
                    @endif
                </td>
                <td class="align-middle text-center">
                    @if($request['operator'] != null)
                        {{ $request['operator']->last_name.' '.$request['operator']->first_name.' '.$request['operator']->middle_name }}
                    @else
                        Не назначен
                    @endif
                </td>
                <td class="align-middle text-center" width="50px">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="#" class="btn btn-secondary btn-sm" title="Редактировать"><i class="far fa-edit"></i></a>
                        <a href="#" class="btn btn-secondary btn-sm" title="Удалить"><i class="far fa-trash-alt"></i></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $requests->render() }}

@endsection