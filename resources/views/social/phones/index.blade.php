@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Телефонный справочник</li>
        </ol>
    </nav>
@endsection

@section('content')
<h1>Телефонный справочник</h1>
<hr>

<div class="card mt-3">
    <div class="card-header">
        Телефонный справочник
    </div>
    <div class="card-body">
        {!! Form::open(array('route' => 'phonesIndex', 'method' => 'POST')) !!}

            <div class="row">
                <div class="col-10 autoComplete">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    <ul class="search_result list-group"></ul>
                </div>

                <div class="col-2">
                    {!! Form::submit('Поиск', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

    @if(isset($users) && count($users) != 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Телефон</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="#">{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</a></td>
                        <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($users))
        <div class="alert alert-info mt-3" role="alert">
            По вашему запросу в телефонном справочнике не найден не один сотрудник, можете выбрать поиск по отделу или ввести ФИО другого сотрудника,
            либо пользователь еще не прошел регистрацию на внутреннем портале.
        </div>
    @endif

@endsection