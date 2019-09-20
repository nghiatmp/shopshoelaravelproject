<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function test() {
    	return 1;
    }
    public function DetailProduct(){
    	return $this->hasMany('App\DetailProduct','id_product','id');
    }
    // public function DetailBillImport(){
    	
    // }
}
