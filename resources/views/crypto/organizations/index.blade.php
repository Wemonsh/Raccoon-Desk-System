@extends('layouts.app')

@section('content')
    <a href="#" class="btn btn-primary">Добавить</a>
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Адрес</th>
            <th>Телефон</th>
            <th>Сайт</th>
            <th>E-mail</th>
            <th>Действие</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="#" class="btn btn-secondary">Редактировать</a>
                    <a href="#" class="btn btn-secondary">Удалить</a>
                </div>
            </td>
        </tr>
    </tbody>
    </table>
@endsection