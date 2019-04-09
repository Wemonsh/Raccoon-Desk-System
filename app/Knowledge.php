<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledge extends Model
{
    protected $table = 'knowledge';
    protected $primaryKey = 'id';

    protected $fillable = ['title', 'text','id_category', 'id_user', 'files', 'pinned'];

    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }

    public function knowledgeCategory(){
        return $this->hasOne('App\KnowledgeCategory','id','id_category');
    }
}
