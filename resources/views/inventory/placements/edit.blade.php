@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('placementsIndex') }}">Помещения</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование помещения</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактирование помещения</h1>
    <hr>
    {!! Form::open(array('route' => array('placementsEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название помещения:') !!}
        <div>
            {!! Form::text('name', $placement->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', $placement->comment, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_organization', 'Организация:') !!}
        <div>
            {!! Form::select('id_organization', $organizations, $placement->id_organization, ['class' => 'form-control']) !!}
            {!! $errors->first('id_organization', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
@endsection

