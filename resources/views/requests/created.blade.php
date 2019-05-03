@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Мои заявки</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Мои заявки</h1>
    <hr>
    <p>Добро пожаловать на страницу ваших зявок, на этой странице вы можете увидеть все свои открытые заявки на данный момент,
        что бы создать заявку передите на страницу <a href="{{ route('requestsCreate') }}">создания заявки</a>.</p>

    @forelse($my_requests as $my_request)
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <p>{{ $my_request->title }}</p>
                        <p><a href="/requests/show/{{ $my_request->id }}">Подробнее</a></p>
                    </div>
                    <div class="col-6">
                        <p>Категория: {{ $my_request['requestsCategory']->name }}</p>
                        <p>Приоритет:
                            @if($my_request['requestsPriority']->id == 1)
                                <span class="badge badge-success">Низкий</span>
                            @elseif($my_request['requestsPriority']->id == 2)
                                <span class="badge badge-warning">Обычный</span>
                            @elseif($my_request['requestsPriority']->id == 3)
                                <span class="badge badge-danger">Высокий</span>
                            @endif
                        </p>
                        @if($my_request['id_operator'] != null)
                            <p>Оператор: {{ $my_request['operator']->last_name.' '.$my_request['operator']->first_name.' '.$my_request['operator']->middle_name }}</p>
                        @else
                            <p>Оператор: не назначен</p>
                        @endif
                            <p>Статус:
                            @if($my_request['requestsStatuses']->id == 1)
                                <span class="badge badge-success">Открыта</span>
                            @elseif($my_request['requestsStatuses']->id == 2)
                                <span class="badge badge-warning">В работе</span>
                            @elseif($my_request['requestsStatuses']->id == 3)
                                <span class="badge badge-primary">Заморожена</span>
                            @else
                                <span class="badge badge-danger">Закрыта</span>
                            @endif
                            </p>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <span class="mr-1" title="Автор заявки"><i class="fas fa-user"></i> {{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</span>
                <span class="mr-1" title="Дата и время создания"><i class="fas fa-calendar-alt"></i> {{ $my_request->date_of_creation }}</span>
            </div>
        </div>
    @empty
        <p>Заявки отсутствуют</p>
    @endforelse

    {{ $my_requests->render() }}

@endsection
