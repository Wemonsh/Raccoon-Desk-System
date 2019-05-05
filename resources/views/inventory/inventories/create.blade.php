@extends('layouts.default')

@section('content')
    <h1>Имущество</h1>
    <hr>

    {!! Form::open(array('route' => 'devicesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
        {!! Form::label('date_arrival', 'Дата добавления') !!}
        <div>
            {!! Form::date('date_arrival', null, ['class' => 'form-control']) !!}
            {!! $errors->first('date_arrival', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>

    {{--<div class="form-group">--}}
        {{--{!! Form::label('manufactures', 'Производитель') !!}--}}
        {{--<div>--}}
            {{--{!! Form::select('manufactures', null, ['class' => 'form-control'] ) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('types', 'Тип') !!}--}}
        {{--<div>--}}
            {{--{!! Form::select('types', null, ['class' => 'form-control', 'id' => 'types'] ) !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('name', 'Название') !!}--}}
        {{--<div>--}}
            {{--{!! Form::text('name', null, ['class' => 'form-control']) !!}--}}
            {{--{!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<hr>--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('name', 'Характеристики') !!}--}}
        {{--<div id="specifications">--}}

        {{--</div>--}}
    {{--</div>--}}



    {{--<div class="form-group">--}}
        {{--{!! Form::label('photo', 'Фото') !!}--}}
        {{--{!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control-file']) !!}--}}
    {{--</div>--}}

    {!! Form::submit(__('social/event/index.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection