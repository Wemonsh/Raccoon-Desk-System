<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvDevices extends Model
{
    protected $table = 'inv_devices';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'id_type', 'id_manufacture', 'specifications', 'photo'];
}
