@extends('layouts.crypto')

@section('content')
    <h1>Добавление организации</h1>

    <form method="post" action="{{ route('cryptoOrganizationsCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input name="name" type="text" class="form-control" id="name" placeholder="Введите название">
        </div>
        <hr>
        <label>Адрес:</label>
        <div class="form-group">
            <label for="address">Название улицы, номер дома, номер офиса/помещения</label>
            <input name="address[]" type="text" class="form-control" id="address" placeholder="Введите название улицы, номер дома, номер офиса/помещения">
            <label for="address">Название населенного пункта (города, послека и т.п.)</label>
            <input name="address[]" type="text" class="form-control" id="address" placeholder="Введите название населенного пункта (города, послека и т.п.)">
            <label for="address">Название района</label>
            <input name="address[]" type="text" class="form-control" id="address" placeholder="Введите название района">
            <label for="address">Название республики, края, области, автономного округа (области)</label>
            <input name="address[]" type="text" class="form-control" id="address" placeholder="Введите название республики, края, области, автономного округа (области)">
            <label for="address">Название страны</label>
            <input name="address[]" type="text" class="form-control" id="address" placeholder="Введите название страны">
            <label for="address">Почтовый индекс</label>
            <input name="address[]" type="text" class="form-control" id="address" placeholder="Введите почтовый индекс">
        </div>
        <hr>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input name="phone" type="text" class="form-control" id="phone" placeholder="Введите телефон">
        </div>
        <div class="form-group">
            <label for="email">E-Mail адрес</label>
            <input name="email" type="email" class="form-control" id="email" placeholder="Введите E-Mail адрес">
        </div>
        <div class="form-group">
            <label for="site">Сайт</label>
            <input name="site" type="text" class="form-control" id="site" placeholder="Введите сайт">
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

@endsection