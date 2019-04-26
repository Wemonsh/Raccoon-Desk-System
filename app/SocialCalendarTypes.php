<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialCalendarTypes extends Model
{
    protected $table = 'calendar_types';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'name'];
}
