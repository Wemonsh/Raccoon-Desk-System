<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoInformationSystem extends Model
{
    protected $table = 'crypto_information_systems';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'comment'];
}
