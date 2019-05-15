<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvMovement extends Model
{
    protected $table = 'inv_movement_history';
    protected $primaryKey = 'id';

    protected $fillable = ['id_inventory', 'id_placement_from', 'id_responsible_from',
        'id_placement_to', 'id_responsible_to', 'id_operator', 'comment'];
}
