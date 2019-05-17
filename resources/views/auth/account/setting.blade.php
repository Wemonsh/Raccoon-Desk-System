@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Настройки</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>Настройки</h1>
    <hr>
    <form method="post" action="{{ route('accountSetting') }}" enctype="multipart/form-data">
        @csrf

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-danger">
                {{ Session::get('warning') }}
            </div>
        @endif

        <div class="row">
            <div class="col-3">
                @if($user->photo != null)
                    <img src="{{ asset('/storage/' . $user->photo) }}" class="w-100" alt="{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}">
                    <hr>
                    <div class="form-group">
                        <p>Изменить фотографию</p>
                        <input name="photo" type="file" class="form-control-file mt-3" id="photo">
                        {!! $errors->first('photo', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                @else
                    <img src="{{ asset('/img/noavatar.png') }}" alt="{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}" class="img-thumbnail">
                    <hr>
                    <div class="form-group">
                        <p>Добавить фотографию</p>
                        <input name="photo" type="file" class="form-control-file mt-3" id="photo">
                        {!! $errors->first('photo', '<p class="alert alert-danger">:message</p>') !!}
                    </div>
                @endif
            </div>
            <div class="col-9">
                <h2>{{ __('auth/account/profile.general_info') }}</h2>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="align-middle">{{ __('auth/account/profile.full_name') }}</td>
                        <td><input class="form-control" disabled type="text" value="{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}" title="Для изменения ФИО обратитесь к администратору"></td>
                    </tr>
                    <tr>
                        <td class="align-middle">{{ __('auth/account/profile.phone') }}</td>
                        <td><input id="phone" name="phone" class="form-control" type="text" value="{{ $user->phone }}">
                            {!! $errors->first('phone', '<p class="alert alert-danger">:message</p>') !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">{{ __('auth/account/profile.email') }}</td>
                        <td><input id="email" name="email" class="form-control" type="text" value="{{ $user->email }}">
                            {!! $errors->first('email', '<p class="alert alert-danger">:message</p>') !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">{{ __('auth/account/profile.date_birth') }}</td>
                        <td><input id="date_birth" name="date_birth" class="form-control" type="date" value="{{ $user->date_birth }}">
                            {!! $errors->first('date_birth', '<p class="alert alert-danger">:message</p>') !!}
                        </td>
                    </tr>
                    <tr>
                        <td class="align-middle">{{ __('auth/account/profile.created_at') }}</td>
                        <td><input class="form-control" disabled type="datetime" value="{{ $user->created_at }}" title="Для изменения даты обратитесь к администратору"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Изменить</button>
    </form>
@endsection