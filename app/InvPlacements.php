<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvPlacements extends Model
{
    protected $table = 'inv_placements';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'comment', 'id_organization'];

    public function organization(){
        return $this->hasOne('App\InvOrganizations','id','id_organization');
    }
}
