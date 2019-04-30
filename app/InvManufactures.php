<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvManufactures extends Model
{
    protected $table = 'inv_manufactures';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'logotype'];
}
