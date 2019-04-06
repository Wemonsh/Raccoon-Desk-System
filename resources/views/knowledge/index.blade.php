@extends('layouts.knowledge')

@section('jumbotron')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">База знаний</h1>
            <p class="lead">Чем мы Вам можем помочь сегодня?</p>
            <form action="#">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Введите ваш поисковый запрос...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </div>
                </div>
            </form>
            <hr>
            <p class="lead">Не нашли ответа на свой вопрос?</p>
            <p class="lead">
                <a class="btn btn-primary" href="#" role="button">Создать новую заявку</a>
                <a class="btn btn-primary" href="#" role="button">Просмотр моих заявок</a>
            </p>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2>Категория</h2>
            <ul>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Категория</h2>
            <ul>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h2>Категория</h2>
            <ul>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
                <li><a href="#">Название статьи</a></li>
            </ul>
        </div>
    </div>
@endsection