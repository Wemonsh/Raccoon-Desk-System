@extends('layouts.default')

@section('content')
    <h1>Сообщения</h1>
    <hr>

    <a href="{{ route('messageSend') }}">Новое сообщение</a>

@endsection