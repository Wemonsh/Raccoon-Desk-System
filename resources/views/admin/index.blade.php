@extends('layouts.admin')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/manufactures/index.main') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Панель администратора</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Панель администратора</h1>
    <hr>

@endsection
