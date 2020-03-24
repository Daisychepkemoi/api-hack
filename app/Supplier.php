<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
     protected $fillable = [
        'name', 'deleted_at',
    ];
    
    public function supplier_products(){
        return $this->hasMany('App\Order_Detail');
    }

}
