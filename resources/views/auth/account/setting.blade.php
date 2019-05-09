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

@endsection