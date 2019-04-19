@extends('layouts.default')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container-fluid">
            <h1 class="display-4">Поиск по новостям</h1>
            <form action="{{ route('searchNews') }}" method="post">
                @csrf
                <div class="input-group">
                    <input type="text" name="value" class="form-control" placeholder="Введите ваш поисковый запрос...">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Поиск</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <p>Поиск по запросу "{{ $value }}"</p>

    @forelse($news as $item)
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $item['title'] }}</p>
                <p><a href="{{ 'post/'.''.$item['id'] }}">Подробнее</a></p>
            </div>
            <div class="card-footer text-muted">
                <small><span class="mr-1" title="Автор статьи"><i class="fas fa-user"></i> {{ $item['user']['last_name'].' '.$item['user']['first_name'].' '.$item['user']['middle_name'] }}</span></small>
                <small><span class="mr-1" title="Дата и время создания"><i class="fas fa-calendar-alt"></i> {{ $item['created_at'] }}</span></small>
                <small><span class="mr-1" title="Количество просмотров"><i class="fas fa-eye"></i> {{ $item['views'] }}</span></small>
            </div>
        </div>
    @empty
        <p>Поик не дал результатов</p>
    @endforelse

    <a href="{{ route('news') }}">Перейти на главную</a>
@endsection