<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMessages extends Model
{
    protected $table = 'user_messages';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id','message','files','id_sender','id_receiver',];

    public function sender(){
        return $this->hasOne('App\User','id','id_sender');
    }

    public function receiver(){
        return $this->hasOne('App\User','id','id_receiver');
    }

    public function room(){
        return $this->hasOne('App\User','id','id_room');
    }
}
