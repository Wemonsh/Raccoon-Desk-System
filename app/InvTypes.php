<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvTypes extends Model
{
    protected $table = 'inv_types';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'description', 'properties', 'image'];
}
