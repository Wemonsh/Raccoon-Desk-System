@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/storages/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/storages/edit.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoStoragesIndex') }}">{{ __('crypto/storages/edit.key_info_carriers') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/storages/edit.edit_key_info_carrier') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/storages/edit.edit_key_info_carrier') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('cryptoStoragesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('serial_number', __('crypto/storages/edit.serial_number')) !!}
        <div>
            {!! Form::text('serial_number', $storage->serial_number, ['class' => 'form-control']) !!}
            {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
    {!! Form::label('comment', __('crypto/storages/edit.comment')) !!}
    <div>
        {!! Form::text('comment', $storage->comment, ['class' => 'form-control']) !!}
        {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
    </div>
    </div>

    {!! Form::submit(__('crypto/storages/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection