<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoMcpiInstance extends Model
{
    protected $table = 'crypto_mcpi_instance';
    protected $primaryKey = 'id';

    protected $fillable = ['serial_number', 'id_models', 'comment'];

    public function model(){
        return $this->hasOne('App\CryptoMcpiModels','id','id_models');
    }
}
