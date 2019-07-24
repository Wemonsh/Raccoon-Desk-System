<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocDepartament extends Model
{
    protected $table = 'doc_departaments';
    protected $primaryKey = 'id';

    protected $fillable = ['number', 'name'];
}
