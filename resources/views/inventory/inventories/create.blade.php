@extends('layouts.default')

@section('content')
    <h1>Имущество</h1>
    <hr>

    {!! Form::open(array('route' => 'inventoriesCreate', 'method' => 'POST')) !!}

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('warning'))
        <div class="alert alert-danger">
            {{ Session::get('warning') }}
        </div>
    @endif

    <div class="row">
        <div class="col-4">
            <h2>Когда/Куда/Кому:</h2>

            <div class="form-group">
                {!! Form::label('date_arrival', 'Дата добавления') !!}
                <div>
                    {!! Form::date('date_arrival', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_arrival', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_placement', 'Помещение') !!}
                <div>
                    {!! Form::select('id_placement', $placements, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_responsible', 'Ответственный') !!}
                <div>
                    {!! Form::select('id_responsible', $users, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_status', 'Статус') !!}
                <div>
                    {!! Form::select('id_status', $statuses, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>
        </div>
        <div class="col-4">
            <h2>От кого/Что:</h2>

            <div class="form-group">
                {!! Form::label('id_counterparty', 'Поставщик') !!}
                <div>
                    {!! Form::select('id_counterparty', $counterparty, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_device', 'Устройство') !!}
                <div>
                    {!! Form::select('id_device', $devices, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('serial_number', 'Серийный номер') !!}
                <div>
                    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="col-4">
            <h2>Дополнительно:</h2>

            <div class="form-group">
                {!! Form::label('date_warranty', 'Гарантия') !!}
                <div>
                    {!! Form::date('date_warranty', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_warranty', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('cost', 'Стоимость') !!}
                        <div>
                            {!! Form::text('cost', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('cost', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('cost_current', 'Текущая стоимость') !!}
                        <div>
                            {!! Form::text('cost_current', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('cost_current', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('inventory_number', 'Инвентарный номер') !!}
                        <div>
                            {!! Form::text('inventory_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('inventory_number', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('accounting_code', 'Бухгалтерский код') !!}
                        <div>
                            {!! Form::text('accounting_code', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('accounting_code', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ip', 'IP адрес') !!}
                <div>
                    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ip', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

        </div>
    </div>

    <hr>

    <div class="form-group">
        {!! Form::checkbox('cancelled', '1', false, ['id' => 'sale']) !!}
        {!! Form::label('cancelled', 'Списано:') !!}
    </div>

    {!! Form::submit(__('social/event/index.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection