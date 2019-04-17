@extends('layouts.crypto')

@section('content')
    <h1>Носители ключевой информации</h1>
    <hr>
    <a href="{{ route('cryptoStoragesCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    @if($storages->count() != 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Серийный номер</th>
                    <th>Комментарий</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @foreach($storages as $storage)
                    <tr>
                        <td>{{ $storage->id }}</td>
                        <td>{{ $storage->serial_number }}</td>
                        <td>{{ $storage->comment }}</td>
                        <td width="50px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/crypto/storages/edit/{{ $storage->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{ $storages->render() }}

    @else
        <div class="alert alert-info" role="alert">
            <p>Носители ключевой информации отсутсвуют</p>
        </div>
    @endif
@endsection
