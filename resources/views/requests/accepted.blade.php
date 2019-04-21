@extends('layouts.default')

@section('content')
    <h1>Поступившие заявки</h1>
    <hr>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requestsAccepted') }}">Все заявки <span class="badge badge-secondary"></span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requestsAccepted', 1) }}">Открытые</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requestsAccepted', 2) }}">В работе</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requestsAccepted', 3) }}">Замороженные</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('requestsAccepted', 4) }}">Завершенные</a>
        </li>
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
        </tr>
        </thead>
        <tbody>
        
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td><p>{{ $request->title }}</p><p>{{ $request->description }}</p></td>
                <td></td>
                <td><p>{{ $request->date_of_creation }}</p><p>{{ $request->date_of_closing }}</p></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $requests->render() }}

@endsection