@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/contracts/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/contracts/create.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('counterpartyContractsIndex') }}">{{ __('inventory/contracts/create.contracts') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/contracts/create.add_contract') }}</li>
        </ol>
    </nav>
@endsection

@section('content')

    <h1>{{ __('inventory/contracts/create.add_contract') }}</h1>
    <hr>

    {!! Form::open(array('route' => 'counterpartyContractsCreate', 'method' => 'POST', 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}

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
        {!! Form::label('number',  __('inventory/contracts/create.contract_number')) !!}
        <div>
            {!! Form::text('number', null, ['class' => 'form-control']) !!}
            {!! $errors->first('number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', __('inventory/contracts/create.contract_name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_from', __('inventory/contracts/create.date_from')) !!}
        <div>
            {!! Form::input('date', 'date_from', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', __('inventory/contracts/create.date_to')) !!}
        <div>
            {!! Form::input('date', 'date_to', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::checkbox('valid', '1', false, ['id' => 'valid']) !!}
        {!! Form::label('valid', __('inventory/contracts/create.valid')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('inventory/contracts/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('files', __('inventory/contracts/create.documents')) !!}
        {!! Form::file('files[]', ['id' => 'files', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('id_counterparty', __('inventory/contracts/create.supplier')) !!}
        <div>
            {!! Form::select('id_counterparty', $counterparty, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_counterparty', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('inventory/contracts/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
