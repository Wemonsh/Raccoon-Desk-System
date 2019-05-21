@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/models/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/models/edit.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoMcpiModelsIndex') }}">{{ __('crypto/models/edit.mcpi_models') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/models/edit.edit_mcpi_model') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/models/edit.edit_mcpi_model') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('cryptoMcpiModelsEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('crypto/models/edit.name')) !!}
        <div>
            {!! Form::text('name', $mcpi_model->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('reg_number', __('crypto/models/edit.reg_number')) !!}
        <div>
            {!! Form::text('reg_number', $mcpi_model->reg_number, ['class' => 'form-control']) !!}
            {!! $errors->first('reg_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('information', __('crypto/models/edit.information')) !!}
        <div>
            {!! Form::text('information', $mcpi_model->information, ['class' => 'form-control']) !!}
            {!! $errors->first('information', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('crypto/models/edit.comment')) !!}
        <div>
            {!! Form::text('comment', $mcpi_model->comment, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_from', __('crypto/models/edit.date_from')) !!}
        <div>
            {!! Form::date('date_from', $mcpi_model->date_from, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', __('crypto/models/edit.date_to')) !!}
        <div>
            {!! Form::date('date_to', $mcpi_model->date_to, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/models/edit.change'), ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection
