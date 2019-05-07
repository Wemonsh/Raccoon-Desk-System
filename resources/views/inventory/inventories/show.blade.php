@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Имущество</a></li>
            <li class="breadcrumb-item active" aria-current="page">...</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ $object->device->name }} + Серийник + инвентарник</h1>
    <hr>

    <div class="row">
        <div class="col-4">
            <img src="{{ asset('/storage/' . $object->device->photo) }}" class="img-fluid" alt="">

            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Характеристики:</h5>
                    <table class="table table-sm">
                        <tbody>
                        @foreach(json_decode($object->device->specifications) as $key => $specification)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $specification }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col-4">

        </div>
        <div class="col-4">

        </div>
    </div>

@endsection