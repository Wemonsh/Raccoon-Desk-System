<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestsStatuses extends Model
{
    protected $table = 'requests_statuses';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
