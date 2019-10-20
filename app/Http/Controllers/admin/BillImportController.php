<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\StoreAddBillImport;
use App\Http\Requests\admin\StoreAddDetailBill;
use DB;
use App\BillImport;
use App\DetailBillImport;
use App\Supplier;
use App\Categories;
use App\DetailProduct;
use App\Size;
use Illuminate\Support\Facades\Auth;
class BillImportController extends Controller
{
    public function list(){
    	$data['billimports'] = DB::table('bill_import as a')->join('supplier as b','a.id_supplier','=','b.id')->join('users as c','a.id_user','=','c.id')->select('a.*','b.name as namesupplier','c.fullname as namestaff')->orderBy('created_at','desc')->paginate(10);
    	return view('admin.billimport.list',$data);
    }

    public function detailimport($id){
    	$data['details'] = DB::table('detail_bill_import as a')->join('detail_product as b','a.id_detail_product','=','b.id')->join('size_product as c','b.id_size','=','c.id')->join('product as d','b.id_product','=','d.id')->select('a.*','b.id as id_detail','c.size','d.name as nameproduct','d.id as idproduct')->where('a.id_bill_import',$id)->paginate(10);

    	return view('admin.billimport.detail-import',$data);
    }

    public function add(){
    	$data['suppliers'] = Supplier::where('status',1)->get();
    	

    	return view('admin.billimport.addbill',$data);
    }
    public function postaddbill(StoreAddBillImport $request){
    	
        $billim = new BillImport;
        $billim ->id_supplier = $request->supplier;
        $billim ->id_user     = Auth::user()->id;
        $billim ->totalmoney  = 0;
        $billim ->payment     = $request ->rdoStatus;
        $billim ->note        = $request->note;

        $billim->save();

        return redirect()->route('billim-list')->with('thongbao','Bạn đã thêm Bill thành công hãy thêm chi tiết');

    }

    public function adddetail($id){
        $data['categories'] = Categories::where([['status',1],['id_parent',0]])->get();
        $data['idbill']     =$id;
        return view('admin.billimport.add-detail-Bill',$data);
    }

    public function postdetailaddbill(StoreAddDetailBill $request){
       
        $detailpro=DetailProduct::where([['id_product',$request->product],['id_size',$request->size]])->first();

        $countBill = DB::table('detail_bill_import as dt')
                    ->select(DB::raw('count(id) as sl'))
                    ->where([['id_bill_import',$request->idbill],['id_detail_product',$detailpro->id]])
                    ->first();
       

       
        if($countBill->sl > 0){
                // $detailBill = DB::table('detail_bill_import')
                //     ->where([['id_bill_import',$request->idbill],['id_detail_product',$detailpro->id]])
                //     ->first();
                $detailBill =DetailBillImport::where([['id_bill_import',$request->idbill],['id_detail_product',$detailpro->id]])->first();
                

                // DB::table('detail_bill_import')
                // ->where([['id_bill_import',$request->idbill],['id_detail_product',$detailpro->id]])
                // ->update(
                //     [
                //         'quanlity' => $detailBill->quanlity +  $request->quantity,
                //         'price'    => $detailBill->price  + $request->price
                //     ]);
                $detailBill->quanlity = $detailBill->quanlity +  $request->quantity;
                $detailBill->price    = $detailBill->price  + $request->price;

                $detailBill->save();

        }else{

            $detailbill = new DetailBillImport;

            $detailbill->id_bill_import =$request->idbill;
            $detailbill->id_detail_product =$detailpro->id;
            $detailbill->quanlity = $request->quantity;
            $detailbill->price    = $request->price;

            $detailbill->save();
        }
            $detailpro->quanlity = $detailpro->quanlity + $request->quantity;
            $detailpro->save();

            $total = DB::table('detail_bill_import')
                    ->select(DB::raw('SUM(price*quanlity) as Total'))
                    ->where('id_bill_import',$request->idbill)
                    ->first();
            // dd($total);
            $bill_import = BillImport::find($request->idbill);
            $bill_import->totalmoney = $total->Total;
            $bill_import->save();

        return redirect()->route('billim-list')->with('thongbao','Bạn đã thêm chi tiết thành công');

    }


}
