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


}
