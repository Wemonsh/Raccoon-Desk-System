<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['title', 'description', 'ip','files', 'id_priority', 'id_category', 'id_user', 'id_operator', 'id_status', 'date_of_creation', 'date_of_planned', 'date_of_closing'];

    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }

    public function operator(){
        return $this->hasOne('App\User','id','id_operator');
    }

    public function requestsCategory(){
        return $this->hasOne('App\RequestsCategory','id','id_category');
    }

    public function requestsPriority(){
        return $this->hasOne('App\RequestsPriority','id','id_priority');
    }

    public function requestsStatuses(){
        return $this->hasOne('App\RequestsStatuses','id','id_status');
    }
}
