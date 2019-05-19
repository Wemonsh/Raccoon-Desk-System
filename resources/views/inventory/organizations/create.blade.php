@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/organizations/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/organizations/create.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('organizationsIndex') }}">{{ __('inventory/organizations/create.organizations') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/organizations/create.add_organization') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/organizations/create.add_organization') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'organizationsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('inventory/organizations/create.organization_name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    {!! Form::label('address_label', __('inventory/organizations/create.address')) !!}
    <div class="form-group">
        <!-- TODO Испрвить id -->
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/create.street_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address*0', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/create.settlement_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address*1', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/create.district_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address*2', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/create.region_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address*3', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/create.country_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address*4', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/create.postcode')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address*5', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>

    </div>
    <hr>

    {!! Form::submit(__('inventory/organizations/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection