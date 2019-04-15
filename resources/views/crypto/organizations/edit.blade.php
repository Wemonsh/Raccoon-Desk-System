@extends('layouts.crypto')

@section('content')
    <h1>Редактирование организации</h1>
    <form method="post" action="{{ route('cryptoOrganizationsEdit', $id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" value="{{ $organization->name }}" placeholder="Введите название">
        </div>
        <hr>
        <label>Адрес:</label>
        <div class="form-group">
            <label for="address">Название улицы, номер дома, номер офиса/помещения</label>
            <input name="address[]" type="text" class="form-control" id="address_street" value="{{ $organization['address'][0]->street_house_office }}" placeholder="Введите название улицы, номер дома, номер офиса/помещения">
        </div>
        <div class="form-group">
            <label for="address">Название населенного пункта (города, послека и т.п.)</label>
            <input name="address[]" type="text" class="form-control" id="address_sity" value="{{ $organization['address'][0]->sity }}" placeholder="Введите название населенного пункта (города, послека и т.п.)">
        </div>
        <div class="form-group">
            <label for="address">Название района</label>
            <input name="address[]" type="text" class="form-control" id="address_district" value="{{ $organization['address'][0]->district }}" placeholder="Введите название района">
        </div>
        <div class="form-group">
            <label for="address">Название республики, края, области, автономного округа (области)</label>
            <input name="address[]" type="text" class="form-control" id="address_region" value="{{ $organization['address'][0]->region }}" placeholder="Введите название республики, края, области, автономного округа (области)">
        </div>
        <div class="form-group">
            <label for="address">Название страны</label>
            <input name="address[]" type="text" class="form-control" id="address_country" value="{{ $organization['address'][0]->country }}" placeholder="Введите название страны">
        </div>
        <div class="form-group">
            <label for="address">Почтовый индекс</label>
            <input name="address[]" type="text" class="form-control" id="address_postcode" value="{{ $organization['address'][0]->postcode }}" placeholder="Введите почтовый индекс">
        </div>
        <hr>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input name="phone" type="text" class="form-control" id="phone" value="{{ $organization->phone }}" placeholder="Введите телефон">
        </div>
        <div class="form-group">
            <label for="email">E-Mail адрес</label>
            <input name="email" type="email" class="form-control" id="email" value="{{ $organization->email }}" placeholder="Введите E-Mail адрес">
        </div>
        <div class="form-group">
            <label for="site">Сайт</label>
            <input name="site" type="text" class="form-control" id="site" value="{{ $organization->site }}" placeholder="Введите сайт">
        </div>

        <button type="submit" class="btn btn-primary mb-3">Изменить</button>
    </form>

@endsection
