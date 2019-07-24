<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocKurator extends Model
{
    protected $table = 'doc_kurators';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];
}
