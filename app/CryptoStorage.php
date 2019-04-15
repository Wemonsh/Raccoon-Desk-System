<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoStorage extends Model
{
    protected $table = 'crypto_storages';
    protected $primaryKey = 'id';

    protected $fillable = ['serial_number', 'comment'];
}
