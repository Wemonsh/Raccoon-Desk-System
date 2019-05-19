@extends('layouts.default')

@section('content')
<h1>{{ __('crypto/index.cryptographic_protection') }}</h1>
<hr>
<p>{{ __('crypto/index.welcome_crypto') }}</p>
<hr>
<div class="row">
    <div class="col-3">
        <h2>{{ __('crypto/index.crypto_keys') }}</h2>
        <div class="list-group">
            <a href="{{ route('keyCreateIndex') }}" class="list-group-item list-group-item-action"><i class="fas fa-file-upload fa-fw"></i> {{ __('crypto/index.creating_key_docs') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-download fa-fw"></i> {{ __('crypto/index.sending_key_docs') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-import fa-fw"></i>  {{ __('crypto/index.commissioning_key_info') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-export fa-fw"></i> {{ __('crypto/index.decommissioning_key_info') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-trash-alt fa-fw"></i> {{ __('crypto/index.destruction_key_docs') }}</a>
        </div>
    </div>
    <div class="col-3">
        <h2>{{ __('crypto/index.mcpi') }}</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-upload fa-fw"></i> {{ __('crypto/index.receipting_mcpi') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-excel fa-fw"></i> {{ __('crypto/index.writing_off_mcpi') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-download fa-fw"></i> {{ __('crypto/index.sending_mcpi') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-import fa-fw"></i> {{ __('crypto/index.commissioning_mcpi') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-file-export fa-fw"></i> {{ __('crypto/index.decommissioning_mcpi') }}</a>
        </div>
    </div>
    <div class="col-3">
        <h2>{{ __('crypto/index.directories') }}</h2>
        <div class="list-group">
            <a href="{{ route('cryptoCertificatesIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-info-circle fa-fw"></i> {{ __('crypto/index.key_info') }}
                </span>
                <span class="badge badge-secondary">{{ $certificates }}</span>
            </a>
            <a href="{{ route('cryptoStoragesIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-sd-card fa-fw"></i> {{ __('crypto/index.key_info_carriers') }}
                </span>
                <span class="badge badge-secondary">{{ $storages }}</span>
            </a>
            <a href="{{ route('cryptoAssignmentsIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-copy fa-fw"></i> {{ __('crypto/index.key_info_assignment') }}
                </span>
                <span class="badge badge-secondary">{{ $assignments }}</span>
            </a>
            <a href="{{ route('cryptoInfoSystemIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-sitemap fa-fw"></i> {{ __('crypto/index.information_systems') }}
                </span>
                <span class="badge badge-secondary">{{ $info_systems }}</span>
            </a>
            <a href="{{ route('cryptoOrganizationsIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-building fa-fw"></i> {{ __('crypto/index.organizations') }}
                </span>
                <span class="badge badge-secondary">{{ $organizations }}</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-object-group fa-fw"></i> {{ __('crypto/index.objects_info_infrastructure') }}
                </span>
                <span class="badge badge-secondary">{{ 0 }}</span>
            </a>
            <a href="{{ route('cryptoMcpiInstanceIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-window-maximize fa-fw"></i> {{ __('crypto/index.mcpi_instances') }}
                </span>
                <span class="badge badge-secondary">{{ $instances }}</span>
            </a>
            <a href="{{ route('cryptoMcpiModelsIndex') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <span>
                    <i class="fas fa-window-restore fa-fw"></i> {{ __('crypto/index.mcpi_models') }}
                </span>
                <span class="badge badge-secondary">{{ $models }}</span>
            </a>
        </div>
    </div>
    <div class="col-3">
        <h2>{{ __('crypto/index.reports') }}</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-poll fa-fw"></i> {{ __('crypto/index.report_1') }}</a>
            <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-poll fa-fw"></i> {{ __('crypto/index.report_2') }}</a>
        </div>
    </div>
</div>

@endsection