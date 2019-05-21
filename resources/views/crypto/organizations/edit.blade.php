@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/organizations/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/organizations/edit.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoOrganizationsIndex') }}">{{ __('crypto/organizations/edit.organizations') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/organizations/edit.edit_organization') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/organizations/edit.edit_organization') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('cryptoOrganizationsEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('crypto/organizations/edit.organization_name')) !!}
        <div>
            {!! Form::text('name', $organization->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    {!! Form::label('address_label', __('crypto/organizations/edit.address')) !!}
    <div class="form-group">
        <!-- TODO Испрвить id -->
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/edit.street_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->street_house_office, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/edit.settlement_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->sity, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/edit.district_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->district, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/edit.region_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->region, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/edit.country_name')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->country, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/edit.postcode')) !!}
            <div>
                {!! Form::text('address[]', $organization['address'][0]->postcode, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <hr>

    <div class="form-group">
        {!! Form::label('phone', __('crypto/organizations/edit.phone')) !!}
        <div>
            {!! Form::text('phone', $organization->phone, ['class' => 'form-control']) !!}
            {!! $errors->first('phone', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', __('crypto/organizations/edit.email')) !!}
        <div>
            {!! Form::text('email', $organization->email, ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('site', __('crypto/organizations/edit.site')) !!}
        <div>
            {!! Form::text('site', $organization->site, ['class' => 'form-control']) !!}
            {!! $errors->first('site', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/organizations/edit.change'), ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection
