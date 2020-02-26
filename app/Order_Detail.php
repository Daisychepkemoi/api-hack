<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    protected $fillable = [
        'order_id', 'deleted_at','product_id',
    ];
    
    public function order(){
        return $this->belongsTo('App\Order');
    }
   
}
