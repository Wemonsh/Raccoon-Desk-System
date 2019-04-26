<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialCalendarEvents extends Model
{
    protected $table = 'calendar_events';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'title', 'description', 'date_time', 'address', 'id_calendar', 'id_type', 'id_user'];
}
