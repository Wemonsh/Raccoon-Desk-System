<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CryptoOrganization extends Model
{
    protected $table = 'crypto_organizations';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'address','phone', 'email', 'site'];
}
