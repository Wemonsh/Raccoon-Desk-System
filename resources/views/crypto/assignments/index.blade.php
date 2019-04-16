@extends('layouts.crypto')

@section('content')
    <h1>Назначение ключевой информации</h1>
    <hr>
    <a href="{{ route('cryptoAssignmentsCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    @if($assignments->count() != 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Комментарий</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->id }}</td>
                        <td>{{ $assignment->name }}</td>
                        <td>{{ $assignment->comment }}</td>
                        <td width="50px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/crypto/assignments/edit/{{ $assignment->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $assignments->render() }}

    @else
        <div class="alert alert-info" role="alert">
            <p>Назначения ключевой информации отсутсвуют</p>
        </div>
    @endif
@endsection
