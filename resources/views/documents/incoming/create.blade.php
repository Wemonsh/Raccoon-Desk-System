@extends('layouts.default')
@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Входящие</a></li>
            <li class="breadcrumb-item active" aria-current="page">Добавить</li>
        </ol>
    </nav>
@endsection
@section('content')
    <h1>Входящие</h1>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('documentsIncomingCreate') }}">Добавить</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('documentsIncoming') }}">Документы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Поиск</a>
        </li>
    </ul>

    <form class="mt-3 mb-3" method="post" action="{{ route('documentsIncomingCreate') }}" enctype="multipart/form-data">
        @csrf

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @elseif(Session::has('warning'))
            <div class="alert alert-danger">
                {{ Session::get('warning') }}
            </div>
        @endif

        <div class="form-group row">
            <label class="col-sm-3" for="departament">Отдел</label>
            <div class="col-sm-9">
                <select name="id_departament" class="form-control" id="departament">
                    @foreach($departaments as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="dateOfRegistration">Дата регистрации</label>
            <div class="col-sm-9">
                <input name="date_of_registration" type="date" class="form-control" id="dateOfRegistration" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="pages">Кол-во листов</label>
            <div class="col-sm-9">
                <input name="pages" type="text" class="form-control" id="pages">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="сorrespondent">Корреспондент</label>
            <div class="col-sm-6">
                <select name="id_korrespondent" class="form-control" id="сorrespondent">
                    @foreach($korrespondents as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <input name="other_korrespondent" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="сorrespondentIndex">Индекс кореспондента</label>
            <div class="col-sm-9">
                <input name="index_korrespondent" type="text" class="form-control" id="сorrespondentIndex">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="date">Дата</label>
            <div class="col-sm-9">
                <input name="date" type="date" class="form-control" id="date">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="documentType">Вид документа</label>
            <div class="col-sm-9">
                <select name="id_type" class="form-control" id="documentType">
                    @foreach($types as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="control">Контроль</label>
            <div class="col-sm-9">
                <select name="idControl" class="form-control" id="control">
                    <option value="1">Особый</option>
                    <option value="2">Внутренний</option>
                    <option value="3">Для сведения</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="content">Содержание</label>
            <div class="col-sm-9">
                <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="curator">Куратор</label>
            <div class="col-sm-9">
                <select name="id_kurator" class="form-control" id="curator">
                    @foreach($kurators as $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="dateOfResolution">Дата резолюции</label>
            <div class="col-sm-9">
                <input name="date_of_resolution" type="date" class="form-control" id="dateOfResolution">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="resolution">Резолюция</label>
            <div class="col-sm-9">
                <textarea name="resolution" class="form-control" id="resolution" rows="3"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-primary" for="executor">Исполнитель</label>
            <div class="col-sm-9">
                <select name="id_executor" class="form-control" id="executor">
                    <option value="0">На резолюции</option>
                    @foreach($executors as $value)
                        <option value="{{ $value->id }}">{{ $value->last_name.' '.$value->first_name.' '.$value->middle_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="dateOfResolution">Срок исполнения</label>
            <div class="col-sm-9">
                <input name="date_of_execution" type="date" class="form-control" id="dateOfResolution">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="dateOfResolution">Фактическое исполнение</label>
            <div class="col-sm-9">
                <input name="date_of_end_execution" type="date" class="form-control" id="dateOfResolution">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 text-primary" for="documentNumber">Отметка об исполнении</label>
            <div class="col-sm-9">
                <input name="performance_mark" type="text" class="form-control" id="documentNumber">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="exampleFormControlFile1">Файл</label>
            <div class="col-sm-9">
                <input name="files" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>
        </div>

    </form>
@endsection