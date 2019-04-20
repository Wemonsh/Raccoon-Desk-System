@extends('layouts.default')

@section('content')
    <h1>Создание заявки</h1>
    <hr>
    <p>Добро пожаловать на страницу создания заявки, тут вы можете создать заявку отделу информационных технологий,
        для решения следующих категорий вопросов указанных в информации о сервисе. Так же перед созданием заявки рекомендуем вам
        посмотреть раздел <a href="{{ route('knowledge') }}">база знаний</a>, где описаны решения частых проблем.</p>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-8">
                <div class="form-group">
                    <label for="inputEmail4">Тема</label>
                    <input type="text" name="title" class="form-control" id="inputEmail4">
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleFormControlSelect1">Категория</label>
                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="exampleFormControlSelect1">Приоритет</label>
                        <select class="form-control" name="priority" id="exampleFormControlSelect1">
                            <option value="1">Высокий</option>
                            <option value="2" selected="selected">Обычный</option>
                            <option value="3">Низкий</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Описание</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Добавить файл</label>
                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <button type="submit" id="submit" class="btn btn-primary">Создать</button>
                    </div>
                </div>
            </div>


            <div class="col-4">
                <div class="form-group">
                    <label for="inputEmail4">ID</label>
                    <input type="text" name="user" class="form-control"  id="inputEmail4" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Телефон</label>
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Организация</label>
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Отдел</label>
                    <input type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Должность</label>
                    <input type="text" class="form-control" disabled>
                </div>
            </div>
        </div>
    </form>
@endsection