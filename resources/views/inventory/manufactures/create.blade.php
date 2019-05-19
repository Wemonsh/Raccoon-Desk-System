@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/manufactures/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/manufactures/create.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('manufacturesIndex') }}">{{ __('inventory/manufactures/create.manufacturers') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/manufactures/create.adding_manufacturer') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/manufactures/create.adding_manufacturer') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'manufacturesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('inventory/manufactures/create.manufacturer_name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', __('inventory/manufactures/create.description')) !!}
        <div>
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('logotype', __('inventory/manufactures/create.logotype')) !!}
        {!! Form::file('logotype', ['id' => 'logotype', 'class' => 'form-control-file']) !!}
        {!! $errors->first('logotype', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    {!! Form::submit(__('inventory/manufactures/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
