@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">Учет СКЗИ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoOrganizationsIndex') }}">Организации</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $organization->name }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card mt-3">
        <div class="card-body">
            <h1>{{ $organization->name }}</h1>
            <p><b>Адрес: </b>{{ $organization->address[0]->street_house_office.', '.$organization->address[0]->sity.', '.$organization->address[0]->district
             .', '.$organization->address[0]->region.', '.$organization->address[0]->country.', '.$organization->address[0]->postcode}}</p>
            <p><b>Телефон: </b>{{ $organization->phone }}</p>
            <p><b>E-Mail адрес: </b>{{ $organization->email }}</p>
            <p><b>Сайт: </b> <a href="{{ URL::to($organization->site) }}">{{ $organization->site }}</a></p>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
@endsection
