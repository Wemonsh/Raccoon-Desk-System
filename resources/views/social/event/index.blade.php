@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">FullCalendar</div>
        <div class="card-body">

            {!! Form::open(array('route' => 'events.add', 'method' => 'POST', 'files' => 'true')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('warning'))
                        <div class="alert alert-danger">
                            {{ Session::get('warning') }}
                        </div>
                    @endif
                </div>

                <div class="col-xs-4 col-sm-4 col-mf-4">
                    <div class="form-group">
                        {!! Form::label('event_name', 'Event Name:') !!}
                        <div>
                            {!! Form::text('event_name', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('event_name', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-mf-3">
                    <div class="form-group">
                        {!! Form::label('start_date', 'Start Date:') !!}
                        <div>
                            {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('start_date', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-3 col-sm-3 col-mf-3">
                    <div class="form-group">
                        {!! Form::label('end_date', 'End Date:') !!}
                        <div>
                            {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('end_date', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>

                <div class="col-xs-1 col-sm-1 col-md-1 text-center"><br/>
                    {!! Form::submit('Add Event', ['class' => 'btn btn-primary']) !!}
                </div>

            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            {!! $calendar_details->calendar() !!}
            {!! $calendar_details->script() !!}
        </div>
    </div>
@endsection