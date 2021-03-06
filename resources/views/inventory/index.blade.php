@extends('layouts.default')

@section('content')
    <h1>{{ __('inventory/index.means_accounting') }}</h1>
    <hr>
    <p>{{ __('inventory/index.welcome_accounting') }}</p>
    <hr>
    <div class="row">
        <div class="col-3">
            <h2>{{ __('inventory/index.instruments') }}</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-wifi fa-fw"></i> {{ __('inventory/index.availability_checking') }}</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-hammer fa-fw"></i> {{ __('inventory/index.service_manager') }}</a>
                <a href="{{ route('counterpartyContractsControl') }}" class="list-group-item list-group-item-action"><i class="fas fa-check-square fa-fw"></i> {{ __('inventory/index.contracts_control') }}</a>
                <a href="{{ route('inventoriesWorkplace') }}" class="list-group-item list-group-item-action"><i class="fas fa-portrait fa-fw"></i> {{ __('inventory/index.goods_materials') }}</a>
            </div>
        </div>
        <div class="col-3">
            <h2>{{ __('inventory/index.journals') }}</h2>
            <div class="list-group">
                <a href="{{ route('inventoriesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-archive fa-fw"></i> {{ __('inventory/index.property') }}</a>
                <a href="{{ route('counterpartyContractsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-file-alt fa-fw"></i> {{ __('inventory/index.contracts') }}</a>
            </div>
        </div>
        <div class="col-3">
            <h2>{{ __('inventory/index.directories') }}</h2>
            <div class="list-group">
                <a href="{{ route('counterpartyIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-warehouse fa-fw"></i> {{ __('inventory/index.counterparties') }}</span>
                    <span class="badge badge-secondary">{{ $counterparty }}</span>
                </a>
                <a href="{{ route('manufacturesIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-industry fa-fw"></i> {{ __('inventory/index.manufacturers') }}</span>
                    <span class="badge badge-secondary">{{ $manufactures }}</span>
                </a>
                <a href="{{ route('typesIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-boxes fa-fw"></i> {{ __('inventory/index.types_of_means') }}</span>
                    <span class="badge badge-secondary">{{ $types }}</span>
                </a>
                <a href="{{ route('devicesIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-cubes fa-fw"></i> {{ __('inventory/index.TMC_groups') }}</span>
                    <span class="badge badge-secondary">{{ $devices }}</span>
                </a>
                <a href="{{ route('placementsIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span><i class="far fa-building fa-fw"></i> {{ __('inventory/index.premises') }}</span>
                    <span class="badge badge-secondary">{{ $placements }}</span>
                </a>
                <a href="{{ route('organizationsIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-building fa-fw"></i> {{ __('inventory/index.organizations') }}</span>
                    <span class="badge badge-secondary">{{ $organizations }}</span>
                </a>
            </div>
        </div>
        <div class="col-3">
            <h2>{{ __('inventory/index.reports') }}</h2>
            <div class="list-group">
                <a href="{{ route('incomingPropertyReport') }}" class="list-group-item list-group-item-action"><i class="fas fa-chart-area fa-fw"></i> {{ __('inventory/index.incoming_property') }}</a>
                <a href="{{ route('writtenOffPropertyReport') }}" class="list-group-item list-group-item-action"><i class="fas fa-chart-area fa-fw"></i> {{ __('inventory/index.writtenoff_property') }}</a>
                <a href="{{ route('movementReport') }}" class="list-group-item list-group-item-action"><i class="fas fa-chart-line fa-fw"></i> {{ __('inventory/index.TMC_movement') }}</a>
            </div>
        </div>
    </div>

@endsection