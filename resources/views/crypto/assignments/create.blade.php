    @extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('crypto/assignments/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('crypto') }}">{{ __('crypto/assignments/create.mcpi_accounting') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('cryptoAssignmentsIndex') }}">{{ __('crypto/assignments/create.key_info_assignment') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('crypto/assignments/create.add_key_info_assignment') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('crypto/assignments/create.add_key_info_assignment') }}</h1>
    <hr>
    {!! Form::open(array('route' => 'cryptoAssignmentsCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', __('crypto/assignments/create.name')) !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', __('crypto/assignments/create.comment')) !!}
        <div>
            {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('crypto/assignments/create.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection