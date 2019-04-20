<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestsCategory extends Model
{
    protected $table = 'requests_category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function news() {
        return $this->hasMany('App\Requests');
    }
}
