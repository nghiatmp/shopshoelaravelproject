<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillExportController extends Controller
{
    public function list(){
    	return view('admin.billexport.list');
    }
    public function detailbillex($id){
    	return view('admin.billexport.detailbill');
    }
}
