<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function listproduct(){
    	$data['product']= DB::table('product')->leftjoin('categories_product','product.id_cate','=','categories_product.id')->select('product.id','product.name','product.description','product.unit_price','product.promotion_price','product.image','categories_product.id as idcate','categories_product.name as catename','categories_product.id_parent')->where('product.status',1)->get();
    	$data['cate'] = DB::table('categories_product')->select('id','name')->where('id_parent',0)->get();
   	
    	return view('admin.product.list',$data);
    }

    public function detailproduct($id){
    	$data['product']= DB::table('product')->join('detail_product','product.id','=','detail_product.id_product')->join('size_product','detail_product.id_size','=','size_product.id')->select('detail_product.id','product.name','detail_product.quanlity','size_product.size')->where([['detail_product.id_product',$id],['product.status',1]])-> orderby('detail_product.id')->get();
    	return view('admin.product.detail',$data);
    }
    public function add(){
        $data['cateparent'] = DB::table('categories_product')->select('id','name','id_parent')->where([['id_parent',0],['status',1]])->get();
        $data['catechild'] = DB::table('categories_product')->select('id','name','id_parent')->where([['id_parent','<>',0],['status',1]])->get();
        return view('admin.product.add',$data);
    }
    public function postadd(Request $req){
        $this->validate($req,
            [
                'namepro'=>'required|min:3|max:300|unique:product,name',
                'description'=>'required|min:3|max:100',
                'unitprice'=>'required|numeric',
                'proprice'=>'required|numeric',
                'images' =>'max:5120',
            ],
            [
                'namepro.required'=>'Bạn chưa nhập tên Product',
                'namepro.min'=>'Tên Product phải dài từ 3 đến 100 ký tự',
                'namepro.max'=>'Tên Product phải dài từ 3 đến 100 ký tự',
                'namepro.unique'=>'Tên Product phải là duy nhất',
                'description.required'=>'Bạn chưa nhập description',
                'description.min'=>'Description phải dài từ 3 đến 100 ký tự',
                'description.max'=>'Description phải dài từ 3 đến 100 ký tự',
                'unitprice.required'=>'Bạn chưa nhập Unit_Price',
                'unitprice.numeric'=>'Unit_Price bánh phải là số',
                'proprice.required'=>'Bạn chưa nhập Promotion_Price',
                'proprice.numeric'=>'Promotion_Price bánh phải là số',
                'images.max'=>'Kích thuoc anh qua lon',

            ]
        );
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
            $file =$req->file('images');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'){
                return redirect('admin/product/add')->with('loi1','Lỗi File Anh');
            }
            $name = $file->getClientOriginalName();
            $image = str::random(2)."_".$name;
            while (file_exists('upload/product'.$image)) {
                $image = str::random(2)."_".$name;
            }
            $file->move('upload/product',$image);

            $product->image= $image;
            echo  $product->image ;
        }else{
           return back()->with('loi','Bạn chưa chọn file ảnh *Bắt Buộc');
        }
         echo "aaaaa";
         
        $product->save();

        return back()->with('thongbao','Bạn đã thêm product thành công');
    }
    public function edit($id){
        $data['cateparent'] = DB::table('categories_product')->select('id','name','id_parent')->where([['id_parent',0],['status',1]])->get();
        $data['catechild'] = DB::table('categories_product')->select('id','name','id_parent')->where([['id_parent','<>',0],['status',1]])->get();
        
        $data['product']=DB::table('product')->join('categories_product','product.id_cate','=','categories_product.id')->select('product.id','product.name','product.description','product.unit_price','product.promotion_price','product.image','product.status','categories_product.id as id_cate','categories_product.name as catename','categories_product.id_parent')->where('product.id',$id)->first();
        return view('admin.product.edit',$data);
    }
    public function postedit($id,Request $req){
        $this->validate($req,
            [
                'namepro'=>'required|min:3|max:300|unique:product,name,'.$id,
                'description'=>'required|min:3|max:100',
                'unitprice'=>'required|numeric',
                'proprice'=>'required|numeric',
            ],
            [
                'namepro.required'=>'Bạn chưa nhập tên Product',
                'namepro.min'=>'Tên Product phải dài từ 3 đến 100 ký tự',
                'namepro.max'=>'Tên Product phải dài từ 3 đến 100 ký tự',
                'namepro.unique'=>'Tên Product phải là duy nhất',
                'description.required'=>'Bạn chưa nhập description',
                'description.min'=>'Description phải dài từ 3 đến 100 ký tự',
                'description.max'=>'Description phải dài từ 3 đến 100 ký tự',
                'unitprice.required'=>'Bạn chưa nhập Unit_Price',
                'unitprice.numeric'=>'Unit_Price  phải là số',
                'proprice.required'=>'Bạn chưa nhập Promotion_Price',
                'proprice.numeric'=>'Promotion_Price  phải là số',

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
            $file =$req->file('images');
            $duoi = $file->getClientOriginalExtension();
            if($duoi != 'jpg' && $duoi !='png'){
                return redirect('admin/product/add')->with('loi1','Lỗi File Anh');
            }
            $name = $file->getClientOriginalName();
            $image = str::random(2)."-".$name;
            while (file_exists('upload/product'.$image)) {
                $image = str::random(2)."-".$name;
            }
            $file->move('upload/product',$image);
            unlink('upload/product'.$product->$image);
            $product->image= $image;
        }

        $product->save();
        return back()->with('thongbao','Bạn đã update product thành công');
    }
}
