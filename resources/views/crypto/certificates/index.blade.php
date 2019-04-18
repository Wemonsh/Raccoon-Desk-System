@extends('layouts.crypto')

@section('content')
    <h1>Ключевая информация</h1>
    <hr>
    <a href="{{ route('cryptoCertificatesCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    @if($certificates->count() != 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Серийный номер</th>
                    <th>Организация</th>
                    <th>Пользователь</th>
                    <th>Назначение</th>
                    <th>Файл</th>
                    <th>Дата начала</th>
                    <th>Дата окончания</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($certificates as $certificate)
                    <tr>
                        <td>{{ $certificate->id }}</td>
                        <td>{{ $certificate->serial_number }}</td>
                        <td>{{ $certificate['organization']->name }}</td>
                        <td>{{ $certificate['user']->last_name.' '.$certificate['user']->first_name.' '.$certificate['user']->middle_name }}</td>
                        <td>{{ $certificate['assignment']->name }}</td>
                            @if($certificate->file != null)
                                <td width="50px"><a href="{{ asset('/storage/' . $certificate->file) }}" class="btn btn-secondary" title="Скачать"><i class="fas fa-arrow-down"></i></a></td>
                            @else
                                <td width="50px" class="align-middle text-center"><i class="fas fa-minus" title="Файл отсутствует"></i></td>
                            @endif
                        <td>{{ $certificate->date_from }}</td>
                        <td>{{ $certificate->date_to }}</td>
                        <td width="50px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/crypto/certificates/edit/{{ $certificate->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $certificates->render() }}

    @else
        <div class="alert alert-info" role="alert">
            <p>Ключевая информация отсутсвуют</p>
        </div>
    @endif
@endsection
