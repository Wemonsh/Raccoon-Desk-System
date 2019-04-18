@extends('layouts.default')

@section('content')
    <h1>Организации</h1>
    <hr>
    <a href="{{ route('cryptoOrganizationsCreate') }}" class="btn btn-primary mb-3">Добавить</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Адрес</th>
                    <th>Телефон</th>
                    <th>E-mail</th>
                    <th>Сайт</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach($organizations as $organization)
                    <tr>
                        <td><a href="/crypto/organizations/show/{{ $organization->id }}">{{ $organization->id }}</a></td>
                        <td>{{ $organization->name }}</td>
                        <td>
                            {{ json_decode($organization->address)[0]->street_house_office.', '.
                               json_decode($organization->address)[0]->sity.', '.
                               json_decode($organization->address)[0]->district.', '.
                               json_decode($organization->address)[0]->region.', '.
                               json_decode($organization->address)[0]->country.', '.
                               json_decode($organization->address)[0]->postcode }}
                        </td>
                        <td>{{ $organization->phone }}</td>
                        <td>{{ $organization->email }}</td>
                        <td><a href="{{ URL::to($organization->site) }}">{{ $organization->site }}</a></td>
                        <td width="50px">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="/crypto/organizations/edit/{{ $organization->id }}" class="btn btn-secondary" title="Редактировать"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-secondary" title="Удалить"><i class="far fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $organizations->render() }}
@endsection