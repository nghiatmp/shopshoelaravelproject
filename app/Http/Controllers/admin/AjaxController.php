<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\BillExport;
use Illuminate\Support\Facades\Auth;
use DB;
use App\DetailProduct;
use App\Size;

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


    public function addbill($id){
        $products= DB::table('product')->leftjoin('categories_product','product.id_cate','=','categories_product.id')->select('product.*')->where([['product.status',1],['categories_product.id_parent',$id]])->orWhere('product.id_cate',$id)->get();
        // dd($products);
        foreach ($products as $product) {
            echo "<option value='".$product->id."'>".$product->name.' ------ Mã Sản Phẩm : '.$product->id."</option>";
        }
    }

    public function addbillSize($id){
       $detail_products= DB::table('detail_product')->leftjoin('product','detail_product.id_product','=','product.id')->select('detail_product.*')->leftjoin('size_product as c','detail_product.id_size','=','c.id')->select('detail_product.*','c.size')->where([['product.status',1],['detail_product.id_product',$id]])->get();
        foreach ($detail_products as $detail_product) {
            echo "<option value='".$detail_product->id_size."'>".$detail_product->size."</option>";
        }

    }
}
