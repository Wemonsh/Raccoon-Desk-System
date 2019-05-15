@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth/account/profile.main') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('auth/account/profile.profile') }}</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>{{ __('auth/account/profile.profile') }}</h1>
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
            <h2>{{ __('auth/account/profile.general_info') }}</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ __('auth/account/profile.full_name') }}</td>
                        <td>{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('auth/account/profile.phone') }}</td>
                        <td>{{ $user->phone }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('auth/account/profile.email') }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('auth/account/profile.date_birth') }}</td>
                        <td>{{ $user->date_birth }}</td>
                    </tr>
                    <tr>
                        <td>{{ __('auth/account/profile.created_at') }}</td>
                        <td>{{ $user->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection