<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;

class AjaxController extends Controller
{
    public function gettype($id){
    	$type =Categories::where('id_parent',$id)->get(); 
    	foreach ($type as $ty) {
    		echo "<option value='".$ty->id."'>".$ty->name."</option>";
    	}
    }
}
