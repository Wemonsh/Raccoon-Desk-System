@extends('layouts.default')

@section('content')
    <h1>Создание заявки</h1>
    <hr>
    <p>Добро пожаловать на страницу создания заявки, тут вы можете создать заявку отделу информационных технологий,
        для решения следующих категорий вопросов указанных в информации о сервисе. Так же перед созданием заявки рекомендуем вам
        посмотреть раздел <a href="{{ route('knowledge') }}">база знаний</a>, где описаны решения частых проблем.</p>

    <form method="post" action="{{ route('requestsCreate') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="title">Тема</label>
                    <input type="text" name="title" class="form-control" id="title">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="id_category">Категория</label>
                        <select name="id_category" class="form-control" id="id_category">
                            @foreach($category as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="id_priority">Приоритет</label>
                        <select name="id_priority" class="form-control" id="id_priority">
                            @foreach($priority as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="files">Добавить файлы</label>
                            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="id_user">ID</label>
                    <input type="text" name="id_user" class="form-control"  id="id_user" value="{{ $user->id }}" disabled>
                </div>
                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="text" class="form-control" value="{{ $user->phone }}" id="phone" disabled>
                </div>
                <div class="form-group">
                    <label for="organization">Организация</label>
                    <input type="text" class="form-control" value="{{ $user->organization }}" id="organization" disabled>
                </div>
                <div class="form-group">
                    <label for="department">Отдел</label>
                    <input type="text" class="form-control" value="{{ $user->department }}" id="department" disabled>
                </div>
                <div class="form-group">
                    <label for="position">Должность</label>
                    <input type="text" class="form-control" value="{{ $user->position }}" id="position" disabled>
                </div>
            </div>
        </div>
    </form>
@endsection