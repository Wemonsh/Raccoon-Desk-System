<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvMovement extends Model
{
    protected $table = 'inv_movement_history';
    protected $primaryKey = 'id';

    protected $fillable = ['id_inventory', 'id_placement_from', 'id_responsible_from',
        'id_placement_to', 'id_responsible_to', 'id_operator', 'comment'];

    public function placementFrom(){
        return $this->hasOne('App\InvPlacements','id','id_placement_from');
    }

    public function placementTo(){
        return $this->hasOne('App\InvPlacements','id','id_placement_to');
    }

    public function inventory(){
        return $this->hasOne('App\InvInventories','id','id_inventory');
    }

    public function responsibleFrom(){
        return $this->hasOne('App\User','id','id_responsible_from');
    }

    public function responsibleTo(){
        return $this->hasOne('App\User','id','id_responsible_to');
    }

    public function operator(){
        return $this->hasOne('App\User','id','id_operator');
    }
}
