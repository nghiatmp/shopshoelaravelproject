<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Size;

class TestController extends Controller
{
    //
    public function test(){
    	$data = Product::take(6)->get();
    	dd($data);
    }
}
