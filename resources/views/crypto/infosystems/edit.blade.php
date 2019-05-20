@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/infosystems/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/infosystems/edit.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoInfoSystemIndex') }}">{{ __('crypto/infosystems/edit.info_systems') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/infosystems/edit.edit_info_system') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/infosystems/edit.edit_info_system') }}</h1>
    <hr>
    {!! Form::open(array('route' => array('cryptoInfoSystemEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name',  __('crypto/infosystems/edit.name')) !!}
        <div>
            {!! Form::text('name', $info_system->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('crypto/infosystems/edit.comment')) !!}
        <div>
            {!! Form::text('comment', $info_system->comment, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/infosystems/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection
