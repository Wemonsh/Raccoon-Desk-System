<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestsPriority extends Model
{
    protected $table = 'requests_priority';
    protected $primaryKey = 'id';
    public $timestamps = false;

    // TODO доделать связи
}
