<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Categories;
use Illuminate\Support\Str;
use App\Http\Requests\admin\AddCategory;
use App\Http\Requests\admin\EditCategory;
class CategoryController extends Controller
{
    public function list(){
    	$data['cate'] = Categories::all()
                        ->where('status',1);
    	return view('admin.category.list',$data);
    }

    public function add(){
    	$data['cateparent'] = DB::table('categories_product')
                                ->select('id','name')
                                ->where('id_parent',0)
                                ->get();
    	return view('admin.category.add',$data);
    }

    public function postadd(AddCategory $req){

        $data['cate']= new Categories;
        $data['cate']->name = $req->catename;
        $data['cate']->id_parent = $req->parent;
        $data['cate']->slug = str::slug($req->catename,'-');
        $data['cate']->description = $req->description;
        $data['cate']->status = $req->rdoStatus;

        $data['cate']->save();

        return back()->with('thongbao','Bạn đã thêm category thành công');

    }

    public function edit($id){
        $data['cate']=Categories::find($id);
        $data['cateparent'] = DB::table('categories_product')
                                ->select('id','name','id_parent')
                                ->where('id_parent',0)
                                ->get();
        return view('admin.category.edit',$data);
    }

    public function postedit($id,EditCategory $req){
        $data['cate'] = Categories::find($id);
           $this->validate($req,
                [
                    'catename'=>'required|min:3|max:300|unique:categories_product,name,'.$id,
                ],
                [
                    'catename.required'=> 'Bạn chưa nhập tên Category',
                    'catename.min'     => 'Tên Category phải dài từ 3 đến 100 ký tự',
                    'catename.max'     => 'Tên Category phải dài từ 3 đến 100 ký tự',
                    'catename.unique'  => 'Tên Category phải là duy nhất',
                ]
            );
            $data['cate']->name        = $req->catename;
            $data['cate']->id_parent   = $req->parent;
            $data['cate']->slug        = str::slug($req->catename,'-');
            $data['cate']->description = $req->description;
            $data['cate']->status      = $req->rdoStatus;

            $data['cate']->save();
        return back()->with('thongbao','Bạn đã update category thành công');

    }
    public function deletecate($id, Request $request)
    {
        $cate = Categories::find($id);
        $cate->status = 0;
        $cate->save();
        return back()->with('thongbao','Bạn đã xóa thành công category');
    }
}
