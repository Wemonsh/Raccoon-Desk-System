<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocKorrespondent extends Model
{
    protected $table = 'doc_korrespondents';
    protected $primaryKey = 'id';

    protected $fillable = ['number', 'name'];
}
