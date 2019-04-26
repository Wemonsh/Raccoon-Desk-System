<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialCalendars extends Model
{
    protected $table = 'calendars';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'name', 'users'];
}
