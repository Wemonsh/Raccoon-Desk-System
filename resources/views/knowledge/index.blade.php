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
                <a class="btn btn-outline-success" href="#" role="button">Создать новую заявку</a>
                <a class="btn btn-outline-info" href="#" role="button">Просмотр моих заявок</a>
            </p>
        </div>
    </div>
@endsection

@section('content')

    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                <h2><i class="fas fa-newspaper"></i> Новые</h2>
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
                <h2><i class="fas fa-star"></i> Популярные</h2>
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
                <h2><i class="fas fa-thumbtack"></i> Закрепленные</h2>
                <ul>
                    <li><a href="#">Название статьи</a></li>
                    <li><a href="#">Название статьи</a></li>
                    <li><a href="#">Название статьи</a></li>
                    <li><a href="#">Название статьи</a></li>
                    <li><a href="#">Название статьи</a></li>
                </ul>
            </div>
        </div>
    </div>

    <hr>

    <div class="card-columns">

        @forelse ($knowledge as $value)
            <div class="card">
                <div class="card-body">
                    <h2>{{ $value['title'] }} <span class="badge badge-secondary">{{ count($value['knowledge']) }}</span></h2>
                    <ul>

                        @forelse($value['knowledge'] as $value)

                            <li><a href="{{ route('knowledgeShow', $value['id']) }}">{{ $value['title'] }}</a> <small>{{ $value['created_at'] }}</small></li>
                        @empty
                            <div class="alert alert-info" role="alert">
                                <p>Статьи в данной категории отсутсвуют</p>
                            </div>
                        @endforelse

                    </ul>
                </div>
            </div>
        @empty
            123
        @endforelse

    </div>

@endsection