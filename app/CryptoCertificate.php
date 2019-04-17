<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoCertificate extends Model
{
    protected $table = 'crypto_certificates';
    protected $primaryKey = 'id';

    protected $fillable = ['serial_number', 'id_organization','id_user', 'id_assignment', 'file', 'date_from', 'date_to'];

    public function organization(){
        return $this->hasOne('App\CryptoOrganization','id','id_organization');
    }

    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }

    public function assignment(){
        return $this->hasOne('App\CryptoAssignment','id','id_assignment');
    }
}


