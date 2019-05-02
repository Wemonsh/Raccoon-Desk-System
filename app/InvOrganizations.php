<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvOrganizations extends Model
{
    protected $table = 'inv_organizations';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'address'];
}
