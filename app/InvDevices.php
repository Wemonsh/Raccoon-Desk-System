<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvDevices extends Model
{
    protected $table = 'inv_devices';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'id_type', 'id_manufacture', 'specifications', 'photo'];

    public function manufacturer(){
        return $this->hasOne('App\InvManufactures','id','id_manufacture');
    }

    public function type(){
        return $this->hasOne('App\InvTypes','id','id_type');
    }
}
