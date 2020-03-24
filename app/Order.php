<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
 
	// use SoftDeletes;
	
	protected $fillable = [
        'order_number',
    ];
    
    public function order_details(){
        return $this->hasMany('App\Order_Detail');
    }
   
}
