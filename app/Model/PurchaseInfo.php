<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseInfo extends Model
{
    public function purchase_payment()
    {
        return $this->belongsTo(PurchasePayment::class,'id','purchase_info_id');
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class,'purchase_info_id','id');
    }
}
