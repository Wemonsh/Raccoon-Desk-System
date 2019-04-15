<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoCertificate extends Model
{
    protected $table = 'crypto_certificates';
    protected $primaryKey = 'id';

    protected $fillable = ['serial_number', 'id_organization','id_user', 'id_assignment', 'file', 'date_from', 'date_to'];
}
