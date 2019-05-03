@extends('layouts.default')

@section('content')
    <h1>{{ __('inventory/index.means_accounting') }}</h1>
    <hr>
    <p>{{ __('inventory/index.welcome_accounting') }}</p>

    <div class="row">
        <div class="col-3">
            <h2>{{ __('inventory/index.instruments') }}</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bolt fa-fw"></i> {{ __('inventory/index.availability_checking') }}</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-bug fa-fw"></i> {{ __('inventory/index.service_manager') }}</a>
                <a href="{{ route('counterpartyContractsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-check fa-fw"></i> {{ __('inventory/index.contracts_control') }}</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-clone fa-fw"></i> {{ __('inventory/index.goods_materials') }}</a>
            </div>
        </div>
        <div class="col-3">
            <h2>{{ __('inventory/index.journals') }}</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-box-open fa-fw"></i> {{ __('inventory/index.property') }}</a>
            </div>
        </div>
        <div class="col-3">
            <h2>{{ __('inventory/index.directories') }}</h2>
            <div class="list-group">
                <a href="{{ route('counterpartyIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-cogs fa-fw"></i> {{ __('inventory/index.counterparties') }}</a>
                <a href="{{ route('manufacturesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-cubes fa-fw"></i> {{ __('inventory/index.manufacturers') }}</a>
                <a href="{{ route('typesIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-location-arrow fa-fw"></i>{{ __('inventory/index.types_of_means') }}</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-object-group fa-fw"></i> {{ __('inventory/index.TMC_groups') }}</a>
                <a href="{{ route('placementsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-location-arrow fa-fw"></i> {{ __('inventory/index.premises') }}</a>
                <a href="{{ route('organizationsIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-sitemap fa-fw"></i> {{ __('inventory/index.organizations') }}</a>
            </div>
        </div>
        <div class="col-3">
            <h2>{{ __('inventory/index.reports') }}</h2>
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-box-open fa-fw"></i> {{ __('inventory/index.property') }}</a>
                <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-chart-line fa-fw"></i> {{ __('inventory/index.TMC_movement') }}</a>
            </div>
        </div>
    </div>

@endsection