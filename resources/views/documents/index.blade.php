@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Документы</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>Документы</h1>
    <hr>
    <p>Раздел находится в разработке!</p>
@endsection