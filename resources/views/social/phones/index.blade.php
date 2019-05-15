@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('social/phones/index.main') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('social/phones/index.phone_book') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
<h1>{{ __('social/phones/index.phone_book') }}</h1>
<hr>

<div class="card mt-3">
    <div class="card-header">
        {{ __('social/phones/index.phone_book') }}
    </div>
    <div class="card-body">
        {!! Form::open(array('route' => 'phonesIndex', 'method' => 'POST')) !!}

            <div class="row">
                <div class="col-10 autoComplete">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    <ul class="search_result list-group"></ul>
                </div>

                <div class="col-2">
                    {!! Form::submit(__('social/phones/index.search'), ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

    @if(isset($users) && count($users) != 0)
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>{{ __('social/phones/index.id') }}</th>
                    <th>{{ __('social/phones/index.full_name') }}</th>
                    <th>{{ __('social/phones/index.phone') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="#">{{ $user->last_name.' '.$user->first_name.' '.$user->middle_name }}</a></td>
                        <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($users))
        <div class="alert alert-info mt-3" role="alert">
            {{ __('social/phones/index.no_employee') }}
        </div>
    @endif

@endsection