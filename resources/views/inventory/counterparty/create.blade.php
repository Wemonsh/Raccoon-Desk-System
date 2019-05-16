@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/counterparty/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/counterparty/create.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('counterpartyIndex') }}">{{ __('inventory/counterparty/create.counter_parties') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/counterparty/create.add_counter_party') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/counterparty/create.add_counter_party') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'counterpartyCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('inventory/counterparty/create.counter_party_name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('tin', __('inventory/counterparty/create.itn')) !!}
        <div>
            {!! Form::text('tin', null, ['class' => 'form-control']) !!}
            {!! $errors->first('tin', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('code', __('inventory/counterparty/create.iec')) !!}
        <div>
            {!! Form::text('code', null, ['class' => 'form-control']) !!}
            {!! $errors->first('code', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::checkbox('purchase', '1', false, ['id' => 'purchase']) !!}
        {!! Form::label('purchase', __('inventory/counterparty/create.we_buy')) !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('sale', '1', false, ['id' => 'sale']) !!}
        {!! Form::label('sale', __('inventory/counterparty/create.we_sell')) !!}
    </div>

    <div class="form-group">
        {!! Form::checkbox('tracking', '1', false, ['id' => 'tracking']) !!}
        {!! Form::label('tracking', __('inventory/counterparty/create.under_control')) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('comment', __('inventory/counterparty/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('inventory/counterparty/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection