@extends('layouts.default')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4">Поиск по заявкам</h1>
            <form action="{{ route('requestsSearch') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="value" class="form-control" placeholder="Введите ваш поисковый запрос...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <p>Поиск по запросу "{{ $value }}"</p>

    @if(count($requests) != 0)
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
        </tr>
        </thead>
        <tbody>
        @forelse($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td><a href="{{ route('requestsShow', $request->id ) }}">{{ $request->title }}</a><p>{{ $request->description }}</p></td>
                <td>{{ $request['user']->last_name.' '.$request['user']->first_name.' '.$request['user']->middle_name }}</td>
                <td><p>{{ $request->date_of_creation }}</p><p>{{ $request->date_of_closing }}</p></td>
                <td class="align-middle text-center">
                    @if($request['requestsStatuses']->name == 'В работе')
                        <span class="badge badge-warning">В работе</span>
                    @elseif($request['requestsStatuses']->name == 'Открытые')
                        <span class="badge badge-success">Открытые</span>
                    @elseif($request['requestsStatuses']->name == 'Завершенные')
                        <span class="badge badge-danger">Завершенные</span>
                    @else
                        <span class="badge badge-primary">Замороженные</span>
                    @endif
                </td>
                <td class="align-middle text-center">
                    @if($request['requestsPriority']->name == 'Низкий')
                        <span class="badge badge-success">Низкий</span>
                    @elseif($request['requestsPriority']->name == 'Средний')
                        <span class="badge badge-warning">Средний</span>
                    @elseif($request['requestsPriority']->name == 'Высокий')
                        <span class="badge badge-danger">Высокий</span>
                    @endif
                </td>
                <td>
                    @if($request['operator'] != null)
                        {{ $request['operator']->last_name.' '.$request['operator']->first_name.' '.$request['operator']->middle_name }}
                    @else
                        Не назначен
                    @endif
                </td>
            </tr>
            @empty
                <p>Поик не дал результатов</p>
        @endforelse
        </tbody>
    </table>
    @endif
    <p>Поик не дал результатов</p>
    {{ $requests->render() }}

@endsection