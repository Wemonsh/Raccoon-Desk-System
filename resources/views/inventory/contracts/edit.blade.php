@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('counterpartyContractsIndex') }}">Договора</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование договора</li>
        </ol>
    </nav>
@endsection

@section('content')

    <h1>Редактирование договора</h1>
    <hr>
    {!! Form::open(array('route' => array('counterpartyContractsEdit', $id), 'method' => 'POST', 'files' => 'true', 'enctype' => 'multipart/form-data')) !!}

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
        {!! Form::label('number', 'Номер договора:') !!}
        <div>
            {!! Form::text('number', $contract->number, ['class' => 'form-control']) !!}
            {!! $errors->first('number', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Название договора:') !!}
        <div>
            {!! Form::text('name', $contract->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_from', 'Дата начала действия договора:') !!}
        <div>
            {!! Form::input('date', 'date_from', $contract->date_from, ['class' => 'form-control']) !!}
            {!! $errors->first('date_from', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('date_to', 'Дата окончания действия договора:') !!}
        <div>
            {!! Form::input('date', 'date_to', $contract->date_to, ['class' => 'form-control']) !!}
            {!! $errors->first('date_to', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::checkbox('valid', '1', $contract->valid, ['id' => 'valid']) !!}
        {!! Form::label('valid', 'Действующий:') !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment', 'Комментарий:') !!}
        <div>
            {!! Form::text('comment', $contract->comment, ['class' => 'form-control']) !!}
            {!! $errors->first('comment', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        @if($contract['files'] != null)
            <div class="card mt-3">
                <div class="card-header">Документы</div>
                <div class="card-body">
                    @foreach(json_decode($contract['files']) as $file)
                        <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
                    @endforeach
                    <hr>
                    <div class="form-group">
                        {!! Form::label('files', 'Добавить документы') !!}
                        {!! Form::file('files[]', ['id' => 'files', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                <p>Документы в данном договоре отсутствуют</p>
            </div>
            <div class="form-group">
                {!! Form::label('files', 'Добавить документы') !!}
                {!! Form::file('files[]', ['id' => 'files', 'class' => 'form-control-file', 'multiple' => 'multiple']) !!}
            </div>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('id_counterparty', 'Поставщик:') !!}
        <div>
            {!! Form::select('id_counterparty', $counterparty, $contract->id_counterparty, ['class' => 'form-control']) !!}
            {!! $errors->first('id_counterparty', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection
