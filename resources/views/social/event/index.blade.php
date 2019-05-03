@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('news/post.main') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Календарь</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('social/event/index.calendar') }}</h1>
    <hr>

    <div class="row mb-3">

        <div class="col-md-12 col-sm-12 col-lg-9">
            <div class="card">
                <div class="card-body">
                    {!! $calendar_details->calendar() !!}
                    {!! $calendar_details->script() !!}
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-lg-3">
            <div class="card">
                <div class="card-header">{{ __('social/event/index.add_event') }}</div>
                <div class="card-body">

                    {!! Form::open(array('route' => 'events.add', 'method' => 'POST', 'files' => 'true')) !!}

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @elseif(Session::has('warning'))
                                <div class="alert alert-danger">
                                    {{ Session::get('warning') }}
                                </div>
                            @endif

                            <div class="form-group">
                                {!! Form::label('event_name', __('social/event/index.add_event')) !!}
                                <div>
                                    {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('start_date', __('social/event/index.start_date')) !!}
                                <div>
                                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('end_date', __('social/event/index.end_date')) !!}
                                <div>
                                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>

                            {!! Form::submit(__('social/event/index.add'), ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">Сегодняшние события: {{ \Carbon\Carbon::now()->format('Y-m-d') }}</div>
                <div class="card-body">
                    @if(count($today_events) != 0)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Начало</th>
                                <th>Конец</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($today_events as $today_event)
                                <tr>
                                    <td>{{ $today_event['event_name'] }}</td>
                                    <td>{{ $today_event['start_date'] }}</td>
                                    <td>{{ $today_event['end_date'] }}</td>
                                </tr>
                            @empty
                                <p>События отсутствуют</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                        @else
                            <p>События отсутствуют</p>
                        @endif
                </div>
            </div>
        </div>
    </div>

@endsection