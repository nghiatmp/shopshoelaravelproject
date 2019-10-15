<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\BillExport;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function gettype($id){
    	$type =Categories::where('id_parent',$id)->get(); 
    	foreach ($type as $ty) {
    		echo "<option value='".$ty->id."'>".$ty->name."</option>";
    	}
    }

    public function approved($id){
    	$data = BillExport::find($id);
    	$data->id_usermakebill = Auth::user()->id;
    	$data->status = 1 ;
    	$data ->save();
    	echo 'ok';
    }
}
