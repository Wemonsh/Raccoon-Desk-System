<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'text', 'image','id_category', 'id_user'];

    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }

    public function newsCategory(){
        return $this->hasOne('App\NewsCategory','id','id_category');
    }
}
