@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('typesIndex') }}">Типы МТС</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать тип МТС</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактировать тип МТС</h1>
    <hr>
    {!! Form::open(array('route' => array('typesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('name', 'Название') !!}
        <div>
            {!! Form::text('name', $type->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Описание') !!}
        <div>
            {!! Form::textarea('description', $type->description, ['class'=>'form-control']) !!}
            {!! $errors->first('description', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('properties', 'Параметры:') !!}
        <div>
            {!! Form::text('properties', $type->properties, ['class' => 'form-control']) !!}
            {!! $errors->first('properties', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="image">Изображение</label>
        <br>
        @if($type->image != null)
            <img src="{{ asset('/storage/' . $type->image) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
        @else
            <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
        @endif
        <hr>
    </div>

    <div class="form-group">
        {!! Form::label('image', 'Изменить изображение') !!}
        {!! Form::file('image', ['id' => 'image', 'class' => 'form-control-file']) !!}
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection