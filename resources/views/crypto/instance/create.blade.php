@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/instance/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/instance/create.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoMcpiInstanceIndex') }}">{{ __('crypto/instance/create.mcpi_instances') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/instance/create.add_mcpi_instance') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/instance/create.add_mcpi_instance') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoMcpiInstanceCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('serial_number', __('crypto/instance/create.serial_number')) !!}
        <div>
            {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_models', __('crypto/instance/create.model_name_mcpi')) !!}
        <div>
            {!! Form::select('id_models', $models, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_models', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('crypto/instance/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit( __('crypto/instance/create.add'), ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection

