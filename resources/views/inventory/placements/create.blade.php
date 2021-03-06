@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/placements/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/placements/create.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('placementsIndex') }}">{{ __('inventory/placements/create.placements') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/placements/create.adding_placement') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/placements/create.adding_placement') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'placementsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('inventory/placements/create.placement_name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('inventory/placements/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_organization', __('inventory/placements/create.organization')) !!}
        <div>
            {!! Form::select('id_organization', $organizations, null, ['class' => 'form-control']) !!}
            {!! $errors->first('id_organization', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit( __('inventory/placements/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
