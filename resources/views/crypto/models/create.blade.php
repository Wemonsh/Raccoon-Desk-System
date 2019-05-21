@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/models/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/models/create.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoMcpiModelsIndex') }}">{{ __('crypto/models/create.mcpi_models') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/models/create.add_mcpi_model') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/models/create.add_mcpi_model') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoMcpiModelsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('crypto/models/create.name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('reg_number', __('crypto/models/create.reg_number')) !!}
        <div>
            {!! Form::text('reg_number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('reg_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('information', __('crypto/models/create.information')) !!}
        <div>
            {!! Form::text('information', null, ['class' => 'form-control']) !!}
            {!! $errors->first('information', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('crypto/models/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_from', __('crypto/models/create.date_from')) !!}
        <div>
            {!! Form::date('date_from', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', __('crypto/models/create.date_to')) !!}
        <div>
            {!! Form::date('date_to', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/models/create.add'), ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection
