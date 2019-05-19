@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/manufactures/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/manufactures/edit.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manufacturesIndex') }}">{{ __('inventory/manufactures/edit.manufacturers') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/manufactures/edit.edit_manufacturer') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/manufactures/edit.edit_manufacturer') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('manufacturesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('warning'))
        <div class="alert alert-danger">
            {{ Session::get('warning') }}
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('name',  __('inventory/manufactures/edit.manufacturer_name')) !!}
        <div>
            {!! Form::text('name', $manufacture->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', __('inventory/manufactures/edit.description')) !!}
        <div>
            {!! Form::text('description', $manufacture->description, ['class' => 'form-control']) !!}
            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {{--TODO "Изображение отсутствует" 52 строка исменить!!!  --}}
    <div class="form-group">
        <label for="image">{{ __('inventory/manufactures/edit.logotype') }}</label>
        <br>
        @if($manufacture->logotype != null)
            <img src="{{ asset('/storage/' . $manufacture->logotype) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
            @else
            <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
        @endif
        <hr>
    </div>

    <div class="form-group">
        {!! Form::label('logotype', __('inventory/manufactures/edit.change_logotype')) !!}
        {!! Form::file('logotype', ['id' => 'logotype', 'class' => 'form-control-file']) !!}
        {!! $errors->first('logotype', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    {!! Form::submit(__('inventory/manufactures/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection

