@extends('layouts.crypto')

@section('content')
    <h1>Информационные системы</h1>
    <hr>
    <a href="{{ route('cryptoInfoSystemCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    @if($info_systems->count() != 0)
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
            @foreach($info_systems as $info_system)
                <tr>
                    <td>{{ $info_system->id }}</td>
                    <td>{{ $info_system->name }}</td>
                    <td>{{ $info_system->comment }}</td>
                    <td width="50px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/crypto/info-systems/edit/{{ $info_system->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $info_systems->render() }}

        @else
        <div class="alert alert-info" role="alert">
            <p>Информационные системы отсутсвуют</p>
        </div>
    @endif
@endsection