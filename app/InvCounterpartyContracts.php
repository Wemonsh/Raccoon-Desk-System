<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvCounterpartyContracts extends Model
{
    protected $table = 'inv_counterparty_contracts';
    protected $primaryKey = 'id';

    protected $fillable = ['number', 'name', 'date_from', 'date_to', 'valid', 'comment', 'files', 'id_counterparty'];

    public function counterparty(){
        return $this->hasOne('App\InvCounterparty','id','id_counterparty');
    }
}
