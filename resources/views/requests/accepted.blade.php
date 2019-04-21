@extends('layouts.default')

@section('content')
    <h1>Поступившие заявки</h1>
    <hr>

    {{-- TODO: Доработать постраничную навигацию, убрать или сократить кол-во if --}}

    <ul class="nav nav-tabs">



        @if($id == null)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsAccepted') }}">Все заявки <span class="badge badge-secondary"></span></a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsAccepted') }}">Все заявки <span class="badge badge-secondary"></span></a>
            </li>
        @endif

        @if($id == 1)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsAccepted', 1) }}">Открытые</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsAccepted', 1) }}">Открытые</a>
            </li>
        @endif



        @if($id == 2)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsAccepted', 2) }}">В работе</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsAccepted', 2) }}">В работе</a>
            </li>
        @endif

        @if($id == 3)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsAccepted', 3) }}">Замороженные</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsAccepted', 3) }}">Замороженные</a>
            </li>
        @endif

        @if($id == 4)
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('requestsAccepted', 4) }}">Завершенные</a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('requestsAccepted', 4) }}">Завершенные</a>
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
            @if($id == 1)
            <th class="align-middle text-center" scope="col">Действие</th>
            @endif
        </tr>
        </thead>
        <tbody>
        
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                <td><a href="{{ route('requestsShow', $request->id ) }}">{{ $request->title }}</a><p>{{ $request->description }}</p></td>
                <td></td>
                <td><p>{{ $request->date_of_creation }}</p><p>{{ $request->date_of_closing }}</p></td>
                <td></td>
                <td></td>
                <td></td>
                @if($id == 1)
                <td><a href="#" class="btn btn-primary btn-sm">В работу</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $requests->render() }}

@endsection