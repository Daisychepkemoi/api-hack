<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_Product extends Model
{
    //
     protected $fillable = [
        'suppliers_id','products_id', 'deleted_at',
    ];
    
    public function order_details(){
        return $this->belongsTo('App\Order_Detail');
    }
   public function supplier_products(){
        return $this->belongsTo('App\Supplier_Product'); // To be confirmed
    }
}
