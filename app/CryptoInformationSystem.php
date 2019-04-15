<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoInformationSystem extends Model
{
    protected $table = 'crypto_information_system';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'comment'];
}
