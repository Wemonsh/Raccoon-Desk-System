<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocType extends Model
{
    protected $table = 'doc_types';
    protected $primaryKey = 'id';

    protected $fillable = ['number', 'name'];
}
