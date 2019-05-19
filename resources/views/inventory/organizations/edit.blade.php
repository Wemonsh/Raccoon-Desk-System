@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/organizations/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/organizations/edit.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('organizationsIndex') }}">{{ __('inventory/organizations/edit.organizations') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/organizations/edit.edit_organization') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/organizations/edit.edit_organization') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('organizationsEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('inventory/organizations/edit.organization_name')) !!}
        <div>
            {!! Form::text('name', $organization->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    {!! Form::label('address_label', __('inventory/organizations/edit.address')) !!}
    <div class="form-group">
        <!-- TODO Испрвить id -->
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/edit.street_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->street_house_office, ['class' => 'form-control']) !!}
                {!! $errors->first('address*0', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/edit.settlement_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->sity, ['class' => 'form-control']) !!}
                {!! $errors->first('address*1', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/edit.district_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->district, ['class' => 'form-control']) !!}
                {!! $errors->first('address*2', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/edit.region_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->region, ['class' => 'form-control']) !!}
                {!! $errors->first('address*3', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/edit.country_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->country, ['class' => 'form-control']) !!}
                {!! $errors->first('address*4', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('inventory/organizations/edit.postcode')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->postcode, ['class' => 'form-control']) !!}
                {!! $errors->first('address*5', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>

    </div>
    <hr>

    {!! Form::submit(__('inventory/organizations/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
