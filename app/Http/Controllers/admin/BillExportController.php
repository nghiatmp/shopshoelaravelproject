<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BillExport;
use DB;

class BillExportController extends Controller
{
    public function list(){
    	$data['billexs'] = BillExport::where('status',1)->orderBy('created_at','desc')->paginate(10);
    	// dd($data['billex']);


    	return view('admin.billexport.list',$data);
    }
    public function detailbillex($id){

   		$data['detailbillexs'] = DB::table('detail_bill_export as a')->join('bill_export as b','a.id_bill_export','=','b.id')->join('detail_product as c','a.id_detail_product','=','c.id')->join('product  as d','c.id_product','=','d.id')->select('a.*','b.id as idbill','b.*','d.name')->join('size_product  as e','c.id_size','=','e.id')->select('a.*','b.id as idbill','b.*','d.name','e.size')->where([['a.id_bill_export',$id],['b.status',1]])->paginate(10);
    	return view('admin.billexport.detailbill',$data);
    }


    public function approved(){
    	$data['billexs'] = BillExport::where('status',0)->orderBy('created_at','asc')->paginate(10);	
    	return view('admin.billexport.approved',$data);
    }
}
