<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon;
use DB;

class ThongKeController extends Controller
{
    public function BillYear(){
    	$range = Carbon\Carbon::now()->subYears(5);
    	$data['billyear'] = DB::table('bill_export')
    					->select(DB::raw('YEAR(created_at) as Nam'),DB::raw('Count(*) as SoHd'))
    					->where('created_at','>=',$range)
    					->groupBy('Nam')
    					->get();
	 	$data['product']= DB::table('detail_bill_export as a')
                        ->leftjoin('detail_product as b','a.id_detail_product','=','b.id')
                        ->select(DB::raw('SUM(a.quanlity) as SL'),DB::raw('YEAR(a.created_at) as Nam'))
                        ->groupBy('Nam')     
                        ->get();

        $data['cateproduct']= DB::table('detail_bill_export as a')
                        ->leftjoin('detail_product as b','a.id_detail_product','=','b.id')
                        ->leftjoin('product as c','b.id_product','=','c.id')
                        ->leftjoin('categories_product as d','c.id_cate','=','d.id')
                        ->select(DB::raw('SUM(a.quanlity) as SL'),'d.name as namecate')
                        ->groupBy('namecate')     
                        ->get();
      
    	return view('admin.statistic.bill-in-years',$data);

    }

    public function categoryProduct()
    {
        $data['money'] = DB::table('bill_export as a')
                        ->select(DB::raw('SUM(totalmoney) as TotalMoney'),DB::raw('Month(created_at) as month'))
                        ->where('a.status',1)
                        ->whereYear('a.created_at','2019')
                        ->groupBy('month')
                        ->get();
        // dd($data['money']);
      
        return view('admin.statistic.category-product',$data);
    }
}
