<?php

namespace App\Http\Controllers\Crypto;

use App\CryptoAssignment;
use App\CryptoCertificate;
use App\CryptoInformationSystem;
use App\CryptoMcpiInstance;
use App\CryptoMcpiModels;
use App\CryptoOrganization;
use App\CryptoStorage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CryptoController extends Controller
{
    public function index() {

        $vars = [
            'assignments' => CryptoAssignment::count(),
            'certificates' => CryptoCertificate::count(),
            'info_systems' => CryptoInformationSystem::count(),
            'instances' => CryptoMcpiInstance::count(),
            'models' => CryptoMcpiModels::count(),
            'organizations' => CryptoOrganization::count(),
            'storages' => CryptoStorage::count(),
        ];

        return view('crypto.index', $vars);
    }
}
