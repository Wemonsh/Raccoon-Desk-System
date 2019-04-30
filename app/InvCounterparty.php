<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvCounterparty extends Model
{
    protected $table = 'inv_counterparty';
    protected $primaryKey = 'id';

    protected $fillable = ['name', 'tin', 'code', 'tracking', 'comment', 'purchase', 'sale'];
}
