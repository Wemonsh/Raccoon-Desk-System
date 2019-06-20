@extends('layouts.admin')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/manufactures/index.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Панель администратора</a></li>
            <li class="breadcrumb-item active" aria-current="page">Пользователи сервиса</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Пользователи сервиса</h1>
    <hr>

@endsection
