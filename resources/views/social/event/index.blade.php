@extends('layouts.default')

@section('content')
    <h1>Календарь</h1>
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
                <div class="card-header">Добавить событие</div>
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
                                {!! Form::label('event_name', 'Название события:') !!}
                                <div>
                                    {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('start_date', 'Дата начала:') !!}
                                <div>
                                    {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group">
                                {!! Form::label('end_date', 'Дата окончания:') !!}
                                <div>
                                    {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                                    {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                                </div>
                            </div>

                            {!! Form::submit('Добавить', ['class' => 'btn btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>



@endsection