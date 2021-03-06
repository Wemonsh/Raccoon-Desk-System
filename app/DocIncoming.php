<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocIncoming extends Model
{
    protected $table = 'doc_incoming';
    protected $primaryKey = 'id';

    protected $fillable = ['date_of_registration', 'pages', 'other_korrespondent', 'index_korrespondent',
        'date', 'content', 'date_of_resolution', 'resolution', 'date_of_execution', 'date_of_end_execution',
        'performance_mark', 'files', 'users', 'id_departament', 'id_korrespondent', 'id_type',
        'id_kurator', 'id_executor', 'id_user'];

    public function departament(){
        return $this->hasOne('App\DocDepartament','id','id_departament');
    }

    public function executor(){
        return $this->hasOne('App\User','id','id_executor');
    }

    public function user(){
        return $this->hasOne('App\User','id','id_user');
    }
}
