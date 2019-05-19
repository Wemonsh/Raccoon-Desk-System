@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/certificates/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/certificates/create.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoCertificatesIndex') }}">{{ __('crypto/certificates/create.key_info') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/certificates/create.add_key_info') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/certificates/create.add_key_info') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoCertificatesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('serial_number', __('crypto/certificates/create.serial_number')) !!}
        <div>
            {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_organization', __('crypto/certificates/create.organization')) !!}
        <div>
            {!! Form::select('id_organization', $organizations, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_organization', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_user', __('crypto/certificates/create.user')) !!}
        <div>
            {!! Form::select('id_user', $users, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_user', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_assignment', __('crypto/certificates/create.key_info_assignment')) !!}
        <div>
            {!! Form::select('id_assignment', $assignments, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_assignment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('file', __('crypto/certificates/create.file')) !!}
        {!! Form::file('file', ['id' => 'file', 'class' => 'form-control-file']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('date_from', __('crypto/certificates/create.date_from')) !!}
        <div>
            {!! Form::input('date', 'date_from', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', __('crypto/certificates/create.date_to')) !!}
        <div>
            {!! Form::input('date', 'date_to', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/certificates/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
