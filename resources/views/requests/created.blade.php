@extends('layouts.default')

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
                        <p><a href="/requests/{{ $my_request->id }}">Подробнее</a></p>
                    </div>
                    <div class="col-6">
                        <p>Категория: {{ $my_request['requestsCategory']->name }}</p>
                        <p>Приоритет: {{ $my_request['requestsPriority']->name }}</p>
                        @if($my_request['id_operator'] != null)
                            <p>Оператор: {{ $my_request['operator']->last_name.''.$my_request['operator']->first_name.''.$my_request['operator']->middle_name }}</p>
                        @else
                            <p>Оператор: не назначен</p>
                        @endif
                        <p>Статус: {{ $my_request['requestsStatuses']->name }}</p>
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
