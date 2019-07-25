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
    <h1>#{{ $document->id }}</h1>
    <hr>
    <div class="row">
        <div class="col-6">
            <h2>Основная информация:</h2>
            <table class="table table-bordered table-sm">
                <tbody>
                <tr>
                    <td>Отдел</td>
                    <td>{{ $document->id_departament }}</td>
                </tr>
                <tr>
                    <td>Дата регистрации</td>
                    <td>{{ $document->date_of_registration }}</td>
                </tr>
                <tr>
                    <td>Кол-во листов</td>
                    <td>{{ $document->pages }}</td>
                </tr>
                <tr>
                    <td>Кореспондент</td>
                    <td>{{ $document->id_korrespondent }}</td>
                </tr>
                <tr>
                    <td>Индекс кореспондента</td>
                    <td>{{ $document->other_korrespondent.' '.$document->index_korrespondent }}</td>
                </tr>
                <tr>
                    <td>Дата</td>
                    <td>{{ $document->date }}</td>
                </tr>
                <tr>
                    <td>Вид документа</td>
                    <td>{{ $document->id_type }}</td>
                </tr>
                <tr>
                    <td>Содержание</td>
                    <td>{{ $document->content }}</td>
                </tr>
                <tr>
                    <td>Куратор</td>
                    <td>{{ $document->id_kurator }}</td>
                </tr>
                <tr>
                    <td>Дата резолюции</td>
                    <td>{{ $document->date_of_resolution }}</td>
                </tr>
                <tr>
                    <td>Резолюция</td>
                    <td>{{ $document->resolution }}</td>
                </tr>
                <tr>
                    <td>Исполнитель</td>
                    <td>{{ $document->id_executor }}</td>
                </tr>
                <tr>
                    <td>Срок исполнения</td>
                    <td>{{ $document->date_of_execution }}</td>
                </tr>
                <tr>
                    <td>Фактическое исполнение</td>
                    <td>{{ $document->date_of_end_execution }}</td>
                </tr>
                <tr>
                    <td>Отметка об исполнении</td>
                    <td>{{ $document->performance_mark }}</td>
                </tr>
                <tr>
                    <td>Файл</td>
                    <td>
                        @if(!empty($document['files']))
                            @foreach(json_decode($document['files']) as $file)
                                <p><a href="{{ asset('/storage/' . $file->path) }}">{{ $file->name }}</a></p>
                            @endforeach
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <h2>Дополнительная информация:</h2>
            <hr>
            <p><strong>Создан:</strong> <a href="#">{{ $document->user->last_name.' '.$document->user->first_name.' '.$document->user->middle_name }}</a></p>
            <p><strong>Предоставлен доступ:</strong>
                @foreach($users as $user)
                    <a href="#">{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</a>
                @endforeach
            </p>
        </div>
    </div>
@endsection