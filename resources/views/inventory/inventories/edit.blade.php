@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/inventories/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/inventories/edit.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoriesIndex') }}">{{ __('inventory/inventories/edit.property') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/inventories/edit.edit_property') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/inventories/edit.edit_property') }}</h1>
    <hr>

    {!! Form::open(array('route' => array('inventoriesEdit', $id), 'method' => 'POST')) !!}

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
                {!! Form::label('date_arrival', __('inventory/inventories/edit.date_added')) !!}
                <div>
                    {!! Form::date('date_arrival', $inventory->date_arrival, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_arrival', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_placement', __('inventory/inventories/edit.placement')) !!}
                <div>
                    {!! Form::select('id_placement', $placements, $inventory->id_placement, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_responsible', __('inventory/inventories/edit.responsible')) !!}
                <div>
                    {!! Form::select('id_responsible', $responsible, $inventory->id_responsible, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_status', __('inventory/inventories/edit.status')) !!}
                <div>
                    {!! Form::select('id_status', $statuses, $inventory->id_status, ['class' => 'form-control'] ) !!}
                </div>
            </div>
        </div>
        <div class="col-4">
            <h2>От кого/Что:</h2>

            <div class="form-group">
                {!! Form::label('id_counterparty', __('inventory/inventories/edit.counterparty')) !!}
                <div>
                    {!! Form::select('id_counterparty', $counterparty, $inventory->id_counterparty, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('id_device', __('inventory/inventories/edit.device')) !!}
                <div>
                    {!! Form::select('id_device', $devices, $inventory->id_device, ['class' => 'form-control'] ) !!}
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('serial_number', __('inventory/inventories/edit.serial_number')) !!}
                <div>
                    {!! Form::text('serial_number', $inventory->serial_number, ['class' => 'form-control']) !!}
                    {!! $errors->first('serial_number', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

        </div>
        <div class="col-4">
            <h2>{{ __('inventory/inventories/edit.additionally') }}</h2>

            <div class="form-group">
                {!! Form::label('date_warranty', __('inventory/inventories/edit.warranty')) !!}
                <div>
                    {!! Form::date('date_warranty', $inventory->date_warranty, ['class' => 'form-control']) !!}
                    {!! $errors->first('date_warranty', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('cost', __('inventory/inventories/edit.cost')) !!}
                        <div>
                            {!! Form::text('cost', $inventory->cost, ['class' => 'form-control']) !!}
                            {!! $errors->first('cost', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('cost_current', __('inventory/inventories/edit.current_cost')) !!}
                        <div>
                            {!! Form::text('cost_current', $inventory->cost_current, ['class' => 'form-control']) !!}
                            {!! $errors->first('cost_current', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('inventory_number', __('inventory/inventories/edit.inventory_number')) !!}
                        <div>
                            {!! Form::text('inventory_number', $inventory->inventory_number, ['class' => 'form-control']) !!}
                            {!! $errors->first('inventory_number', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('accounting_code', __('inventory/inventories/edit.accounting_code')) !!}
                        <div>
                            {!! Form::text('accounting_code', $inventory->accounting_code, ['class' => 'form-control']) !!}
                            {!! $errors->first('accounting_code', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                {!! Form::label('ip', __('inventory/inventories/edit.ip')) !!}
                <div>
                    {!! Form::text('ip', $inventory->ip, ['class' => 'form-control']) !!}
                    {!! $errors->first('ip', '<p class="alert alert-danger">:message</p>') !!}
                </div>
            </div>

        </div>
    </div>

    <hr>

    <div class="form-group">
        {!! Form::checkbox('cancelled', '1', $inventory->cancelled, ['id' => 'cancelled', 'onchange' => 'fun1();']) !!}
        {!! Form::label('cancelled', __('inventory/inventories/edit.cancelled')) !!}
    </div>

    @if($inventory->cancelled == "1")
    <div id="date_cancelled_div" class="form-group">
        {!! Form::label('date_cancelled', __('inventory/inventories/edit.date_cancelled')) !!}
        <div>
            {!! Form::date('date_cancelled', $inventory->date_cancelled, ['class' => 'form-control', 'id' => 'date_cancelled']) !!}
            {!! $errors->first('date_cancelled', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>
        @else
        <div id="date_cancelled_div" class="form-group d-none">
            {!! Form::label('date_cancelled', __('inventory/inventories/edit.date_cancelled')) !!}
            <div>
                {!! Form::date('date_cancelled', $inventory->date_cancelled, ['class' => 'form-control', 'id' => 'date_cancelled']) !!}
                {!! $errors->first('date_cancelled', '<p class="alert alert-danger">:message</p>') !!}
            </div>
        </div>
    @endif

    {!! Form::submit(__('inventory/inventories/edit.change'), ['class' => 'btn btn-primary']) !!}

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