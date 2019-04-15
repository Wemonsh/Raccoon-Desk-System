<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoAssignment extends Model
{
    protected $table = 'crypto_assignment';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'comment'];
}
