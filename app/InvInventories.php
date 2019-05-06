<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvInventories extends Model
{
    protected $table = 'inv_inventories';
    protected $primaryKey = 'id';

    protected $fillable = ['date_arrival', 'id_counterparty', 'id_device', 'inventory_number',
        'id_placement', 'id_responsible', 'id_status', 'cost', 'cost_current', 'date_warranty',
        'accounting_code', 'barcode', 'serial_number', 'ip', 'qr_code', 'cancelled', 'id_operator',];

    public function counterparty(){
        return $this->hasOne('App\InvCounterparty','id','id_counterparty');
    }

    public function device(){
        return $this->hasOne('App\InvDevices','id','id_device');
    }

    public function placement(){
        return $this->hasOne('App\InvPlacements','id','id_placement');
    }

    public function responsible(){
        return $this->hasOne('App\User','id','id_responsible');
    }

    public function status(){
        return $this->hasOne('App\InvStatuses','id','id_status');
    }

    public function operator(){
        return $this->hasOne('App\User','id','id_operator');
    }
}
