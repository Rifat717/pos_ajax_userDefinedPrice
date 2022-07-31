<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchasePayment extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function purchaseInfo()
    {
        return $this->belongsTo(PurchaseInfo::class,'purchase_info_id','id');
    }
}
