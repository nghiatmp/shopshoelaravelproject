<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\AddProduct;
use App\Http\Requests\admin\EditProduct;
use App\Traits\UploadTrait;

class ProductController extends Controller
{
    public function listproduct(){
    	$data['product']= DB::table('product as a')
                        ->leftjoin('categories_product as b','a.id_cate','=','b.id')
                        ->select('a.*','b.id as idcate','b.name as catename','b.id_parent')
                        ->where('a.status',1)->get();
    	$data['cate'] = DB::table('categories_product')
                            ->select('id','name')
                            ->where('id_parent',0)
                            ->get();
   	
    	return view('admin.product.list',$data);
    }

    public function detailproduct($id){
    	$data['product']= DB::table('product as a')
                        ->join('detail_product as b','a.id','=','b.id_product')
                        ->join('size_product as c','b.id_size','=','c.id')
                        ->select('b.id','a.name','b.quanlity','c.size')
                        ->where([['b.id_product',$id],['a.status',1]])
                        ->orderby('b.id')
                        ->get();
    	return view('admin.product.detail',$data);
    }
    public function add(){
        $data['cateparent'] = DB::table('categories_product')
                                ->select('id','name','id_parent')
                                ->where([['id_parent',0],['status',1]])
                                ->get();

        $data['catechild'] = DB::table('categories_product')
                                ->select('id','name','id_parent')
                                ->where([['id_parent','<>',0],['status',1]])
                                ->get();
        return view('admin.product.add',$data);
    }
    public function postadd(AddProduct $req){

        $product = new Product;
        if(isset($req->child)){
            $product->id_cate=$req->child;
        }else{
            $product->id_cate=$req->parent;
        }
        $product->name = $req->namepro;
        $product->slug = str::slug($req->namepro,'-');
        $product->description = $req->description;
        $product->unit_price = $req->unitprice;
        $product->promotion_price = $req->proprice;
        $product->status= $req->rdoStatus;


        if($req->hasFile('images')){
            $imageName = $req->images->getClientOriginalName();
            $product->image  = $imageName;

            $product->save();
            $req->images->move(public_path('upload/product/'), $imageName);
                
        }
       
        return back()->with('thongbao','Bạn đã thêm product thành công');
    }
    public function edit($id){
        $data['cateparent'] = DB::table('categories_product')
                                ->select('id','name','id_parent')
                                ->where([['id_parent',0],['status',1]])
                                ->get();
        $data['catechild'] = DB::table('categories_product')
                                ->select('id','name','id_parent')
                                ->where([['id_parent','<>',0],['status',1]])
                                ->get();
        
        $data['product']    =DB::table('product as a')
                                ->join('categories_product as b','a.id_cate','=','b.id')
                                ->select('a.*','b.id as id_cate','b.name as catename','b.id_parent')
                                ->where('a.id',$id)
                                ->first();
        return view('admin.product.edit',$data);
    }
    public function postedit($id,EditProduct $req){
        $this->validate($req,
            [
                'namepro'=>'required|min:3|max:300|unique:product,name,'.$id,
            ],
            [
                'namepro.required'=>'Bạn chưa nhập tên Product',
                'namepro.min'=>'Tên Product phải dài từ 3 đến 100 ký tự',
                'namepro.max'=>'Tên Product phải dài từ 3 đến 100 ký tự',
                'namepro.unique'=>'Tên Product phải là duy nhất',
            ]
        );
        $product = Product::find($id);
        if(isset($req->child)){
            $product->id_cate=$req->child;
        }else{
            $product->id_cate=$req->parent;
        }
        $product->name = $req->namepro;
        $product->slug = str::slug($req->namepro,'-');
        $product->description = $req->description;
        $product->unit_price = $req->unitprice;
        $product->promotion_price = $req->proprice;
        $product->status= $req->rdoStatus;
        

        if($req->hasFile('images')){
            $req->validate([

                'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time().'.'.$req->images->extension();  
            // $req->images->move(public_path('upload/product/'), $imageName);
             $req->images->move(public_path('upload/product/'), $imageName);
            $product->image  = $imageName;
        }

         // unlink('upload/product'.$product->$image);

        $product->save();
        return back()->with('thongbao','Bạn đã update product thành công');
    }


    public function deleteproduct($id, Request $request)
    {
       $product = Product::find($id);

       $product->status = 0;
       $product->save();
       return back()->with('thongbao','Bạn đã xóa product thành công');

    }
}
