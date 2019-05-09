@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Профиль</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>Профиль</h1>
    <hr>

    <div class="row">
        <div class="col-3">
            @if($user->photo != null)
                <img src="{{ $user->photo }}" alt="{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}">
            @else
                <img src="{{ asset('img/noavatar.png') }}" alt="{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}" class="img-thumbnail">
            @endif
        </div>
        <div class="col-9">
            <h2>Общая информация</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>ФИО</td>
                        <td>{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</td>
                    </tr>
                    <tr>
                        <td>Телефон</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Дата рождения</td>
                        <td>{{ $user->date_birth }}</td>
                    </tr>
                    <tr>
                        <td>Дата регистрации:</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection