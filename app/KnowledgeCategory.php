<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnowledgeCategory extends Model
{
    protected $table = 'knowledge_category';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function knowledge() {
        return $this->hasMany('App\Knowledge','id_category','id');
    }
}
