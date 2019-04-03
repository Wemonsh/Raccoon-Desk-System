<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model
{
    protected $table = 'news_category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function news() {
        return $this->hasMany('App\News');
    }
}
