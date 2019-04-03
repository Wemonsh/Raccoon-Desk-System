@extends('layouts.app')

@section('content')
    <h1>Новости</h1>
    <div class="card-columns">
        @forelse($news as $value)
            <div class="card">
                @if($value['image'] != null)
                    <img src="{{ asset('/storage/' . $value['image']) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $value['title'] }}</h5>
                    <p class="card-text">{{ $value['text'] }}</p>
                </div>
            </div>
        @empty
            <p>Массив пустой</p>
        @endforelse
    </div>


    {{ $news->render() }}
@endsection