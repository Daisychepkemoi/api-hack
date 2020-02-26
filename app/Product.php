<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','description','quantity', 'deleted_at',
    ];
    
    public function order_details(){
        return $this->hasMany('App\Order_Detail');
    }
   public function supplier_products(){
        return $this->hasMany('App\Supplier_Product'); // To be confirmed
    }
   
}
