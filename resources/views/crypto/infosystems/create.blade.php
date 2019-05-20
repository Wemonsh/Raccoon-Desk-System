@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/infosystems/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/infosystems/create.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoInfoSystemIndex') }}">{{ __('crypto/infosystems/create.info_systems') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/infosystems/create.add_info_system') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/infosystems/create.add_info_system') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoInfoSystemCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('crypto/infosystems/create.name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('crypto/infosystems/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/infosystems/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection