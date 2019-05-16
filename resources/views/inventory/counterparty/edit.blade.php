@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/counterparty/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/counterparty/edit.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('counterpartyIndex') }}">{{ __('inventory/counterparty/edit.counter_parties') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/counterparty/edit.edit_counter_party') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/counterparty/edit.edit_counter_party') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('counterpartyEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('inventory/counterparty/edit.counter_party_name')) !!}
        <div>
            {!! Form::text('name', $counterparty->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('tin',  __('inventory/counterparty/edit.itn')) !!}
        <div>
            {!! Form::text('tin', $counterparty->tin, ['class' => 'form-control']) !!}
            {!! $errors->first('tin', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('code', __('inventory/counterparty/edit.iec')) !!}
        <div>
            {!! Form::text('code', $counterparty->code, ['class' => 'form-control']) !!}
            {!! $errors->first('code', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::checkbox('purchase', $counterparty->purchase, $counterparty->purchase, ['id' => 'purchase']) !!}
        {!! Form::label('purchase', __('inventory/counterparty/edit.we_buy')) !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('sale', $counterparty->sale, $counterparty->sale, ['id' => 'sale']) !!}
        {!! Form::label('sale', __('inventory/counterparty/edit.we_sell')) !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('tracking', $counterparty->tracking, $counterparty->tracking, ['id' => 'tracking']) !!}
        {!! Form::label('tracking', __('inventory/counterparty/edit.under_control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('inventory/counterparty/edit.comment')) !!}
        <div>
            {!! Form::text('comment', $counterparty->comment, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('inventory/counterparty/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
