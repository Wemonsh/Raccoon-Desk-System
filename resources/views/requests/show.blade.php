@extends('layouts.default')

@section('content')
    <h1>Заявка #</h1>
    <hr>

            <div class="row">
                <div class="col-6">
                    <h2>Информация</h2>
                    <p>Категория: </p>
                    <p>Статус:
                        <span class="badge badge-success">Открыта</span>
                    </p>
                    <p>Приоритет:

                        <span class="badge badge-danger">Высокий</span>

                    </p>
                    <p>Тема: </p>
                    <p>Описание: </p>
                    <p>Дата открытия: </p>
                    <p>Дата закрытия: </p>

                    <p>Загруженный файл:
                        <a download href="/">
                            файл
                        </a>
                    </p>


                </div>

                <div class="col-3">
                    <h2>Сотрудник</h2>
                    <p>ФИО: <a href="/account/profile/"></a></p>
                    <p>Организация: </p>
                    <p>Отдел: </p>
                    <p>Должность: </p>
                    <p>Телефон: </p>
                    <p>IP адрес: </p>
                </div>
                <div class="col-3">
                    <h2>Оператор</h2>
                    <p>ФИО: <a href="/ac">ter</a></p>
                    <p>Организация: </p>
                    <p>Отдел: </p>
                    <p>Должность:</p>
                </div>










                <div class="col-6">

                    <h2>Сообщения</h2>
                    <ul class="list-unstyled">

                        <li class="media border mt-1">

                            <img style="width: 60px" src="/" alt="..." class="d-block mr-3 mt-1 ml-1"">


                            <div class="media-body">


                            </div>
                        </li>

                    </ul>




                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="/requests/send/" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Действие</label>
                                    <select class="form-control" name="action" id="exampleFormControlSelect1">

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Сообщение</label>
                                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Файл</label>
                                    <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <h2>История заявки</h2>

                    <table class="table table-bordered">
                        <tbody>

                        <tr>

                            <td style="width: 150px">
                                <a href="#">fd</a>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>




    @endsection