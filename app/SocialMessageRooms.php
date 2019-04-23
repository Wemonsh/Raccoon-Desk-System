<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialMessageRooms extends Model
{
    protected $table = 'user_message_rooms';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id','users'];
}
