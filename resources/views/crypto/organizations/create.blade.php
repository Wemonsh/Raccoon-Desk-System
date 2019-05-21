@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/organizations/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/organizations/create.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoOrganizationsIndex') }}">{{ __('crypto/organizations/create.organizations') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/organizations/create.add_organization') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/organizations/create.add_organization') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoOrganizationsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('crypto/organizations/create.organization_name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    {!! Form::label('address_label', __('crypto/organizations/create.address')) !!}
    <div class="form-group">
        <!-- TODO Испрвить id -->
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/create.street_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/create.settlement_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street',  __('crypto/organizations/create.district_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/create.region_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/create.country_name')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div><div class="form-group">
            {!! Form::label('address_street', __('crypto/organizations/create.postcode')) !!}
            <div>
                {!! Form::text('address[]', null, ['class' => 'form-control']) !!}
                {!! $errors->first('address[]', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
    </div>
    <hr>

    <div class="form-group">
        {!! Form::label('phone', __('crypto/organizations/create.phone')) !!}
        <div>
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            {!! $errors->first('phone', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', __('crypto/organizations/create.email')) !!}
        <div>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            {!! $errors->first('email', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('site', __('crypto/organizations/create.site')) !!}
        <div>
            {!! Form::text('site', null, ['class' => 'form-control']) !!}
            {!! $errors->first('site', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit( __('crypto/organizations/create.add'), ['class' => 'btn btn-primary mb-3']) !!}

    {!! Form::close() !!}
@endsection