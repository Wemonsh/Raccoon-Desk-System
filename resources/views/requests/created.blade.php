@extends('layouts.default')

@section('content')
    <h1>Мои заявки</h1>
    <hr>
    <p>Добро пожаловать на страницу ваших зявок, на этой странице вы можете увидеть все свои открытые заявки на данный момент,
        что бы создать заявку передите на страницу <a href="{{ route('requestsCreate') }}">создания заявки</a>.</p>

@endsection