@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/inventories/create.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/inventories/create.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoriesIndex') }}">{{ __('inventory/inventories/create.property') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/inventories/create.adding_property') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/inventories/create.adding_property') }}</h1>
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
            <h2>{{ __('inventory/inventories/create.when_to_to') }}</h2>

            <div class="form-group">
                {!! Form::label('date_arrival', __('inventory/inventories/create.date_added')) !!}
                <div>
                    {!! Form::date('date_arrival', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_arrival', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_placement', __('inventory/inventories/create.placement')) !!}
                <div>
                    {!! Form::select('id_placement', $placements, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_responsible', __('inventory/inventories/create.responsible')) !!}
                <div>
                    {!! Form::select('id_responsible', $users, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_status', __('inventory/inventories/create.status')) !!}
                <div>
                    {!! Form::select('id_status', $statuses, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>
        </div>
        <div class="col-4">
            <h2>{{__('inventory/inventories/create.from_what')}}</h2>

            <div class="form-group">
                {!! Form::label('id_counterparty', __('inventory/inventories/create.counterparty')) !!}
                <div>
                    {!! Form::select('id_counterparty', $counterparty, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_device', __('inventory/inventories/create.device')) !!}
                <div>
                    {!! Form::select('id_device', $devices, null, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('serial_number', __('inventory/inventories/create.serial_number')) !!}
                <div>
                    {!! Form::text('serial_number', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="col-4">
            <h2>{{ __('inventory/inventories/create.additionally') }}</h2>

            <div class="form-group">
                {!! Form::label('date_warranty', __('inventory/inventories/create.warranty')) !!}
                <div>
                    {!! Form::date('date_warranty', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_warranty', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('cost', __('inventory/inventories/create.cost')) !!}
                        <div>
                            {!! Form::text('cost', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('cost', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('cost_current', __('inventory/inventories/create.current_cost')) !!}
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
                        {!! Form::label('inventory_number', __('inventory/inventories/create.inventory_number')) !!}
                        <div>
                            {!! Form::text('inventory_number', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('inventory_number', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('accounting_code', __('inventory/inventories/create.accounting_code')) !!}
                        <div>
                            {!! Form::text('accounting_code', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('accounting_code', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ip', __('inventory/inventories/create.ip')) !!}
                <div>
                    {!! Form::text('ip', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ip', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

        </div>
    </div>

    <hr>

    <div class="form-group">
        {!! Form::checkbox('cancelled', '1', false, ['id' => 'cancelled', 'onchange' => 'fun1();']) !!}
        {!! Form::label('cancelled', __('inventory/inventories/create.cancelled')) !!}
    </div>

    <div id="date_cancelled_div" class="form-group d-none">
        {!! Form::label('date_cancelled', 'Дата списания') !!}
        <div>
            {!! Form::date('date_cancelled', null, ['class' => 'form-control', 'id' => 'date_cancelled']) !!}
            {!! $errors->first('date_cancelled', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    {!! Form::submit(__('social/event/index.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

    <script>

        function fun1() {
            var chbox;
            chbox=document.getElementById('cancelled');
            if (chbox.checked) {
                $('#date_cancelled_div').removeClass('d-none');
            }
            else {
                $('#date_cancelled_div').addClass('d-none');
            }
        }

    </script>
@endsection