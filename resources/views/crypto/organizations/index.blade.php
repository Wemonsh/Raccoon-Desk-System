@extends('layouts.crypto')

@section('content')
    <h1>Организации</h1>
    <hr>
    <a href="#" class="btn btn-primary mb-3">Добавить</a>
    <div class="table-responsive">
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
                    <td width="50px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-secondary"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-secondary"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td width="50px">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="#" class="btn btn-secondary"><i class="far fa-edit"></i></a>
                            <a href="#" class="btn btn-secondary"><i class="far fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection