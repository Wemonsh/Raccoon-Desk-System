@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/certificates/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/certificates/edit.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoCertificatesIndex') }}">{{ __('crypto/certificates/edit.key_info') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/certificates/edit.edit_key_info') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/certificates/edit.edit_key_info') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('cryptoCertificatesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('serial_number', __('crypto/certificates/edit.serial_number')) !!}
        <div>
            {!! Form::text('serial_number', $certificate->serial_number, ['class' => 'form-control']) !!}
            {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_organization', __('crypto/certificates/edit.organization')) !!}
        <div>
            {!! Form::select('id_organization', $organizations, $certificate->id_organization, ['class' => 'form-control']) !!}
            {!! $errors->first('id_organization', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_user', __('crypto/certificates/edit.user')) !!}
        <div>
            {!! Form::select('id_user', $users, $certificate->id_user, ['class' => 'form-control']) !!}
            {!! $errors->first('id_user', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_assignment', __('crypto/certificates/edit.key_info_assignment')) !!}
        <div>
            {!! Form::select('id_assignment', $assignments, $certificate->id_assignment, ['class' => 'form-control']) !!}
            {!! $errors->first('id_assignment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        @if($certificate['file'] != null)
            <div class="card mt-3">
                <div class="card-header">{{ __('crypto/certificates/edit.file') }}</div>
                <div class="card-body">
                    {{-- TODO Исправить отображение расширения файла в таблице на index !!! --}}
                    <p><a href="{{ asset('/storage/' . $certificate->file) }}">{{ $certificate->file }}</a></p>
                    <hr>
                    <div class="form-group">
                        {!! Form::label('file', __('crypto/certificates/edit.replace_file')) !!}
                        {!! Form::file('file', ['id' => 'file', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <p>{{ __('crypto/certificates/edit.no_file') }}</p>
            </div>
            <div class="form-group">
                {!! Form::label('file', __('crypto/certificates/edit.add_file')) !!}
                {!! Form::file('file', ['id' => 'file', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
            </div>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('date_from', __('crypto/certificates/edit.date_from')) !!}
        <div>
            {!! Form::input('date', 'date_from', $certificate->date_from, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', __('crypto/certificates/edit.date_to')) !!}
        <div>
            {!! Form::input('date', 'date_to', $certificate->date_to, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/certificates/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection

