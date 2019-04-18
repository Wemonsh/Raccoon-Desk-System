<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoMcpiModels extends Model
{
    protected $table = 'crypto_mcpi_models';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'reg_number', 'information', 'comment', 'date_from', 'date_to'];

    public function instances() {
        return $this->hasMany('App\CryptoMcpiInstance');
    }
}
