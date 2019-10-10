<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Categories;
use DB;
use Illuminate\Support\Facades\View;
use App\User;
use Cart;
class PageController extends Controller
{

    public function __construct(){
        
        $data['cates'] = Categories::Where([['status',1],['id_parent',0]])->get();
        $data['catechild'] = Categories::Where([['status',1],['id_parent','<>',0]])->get();
         if(Auth::check()){
             $iduser = Auth::user()->id;
        }else{
             $iduser =-1;
        }
        $data['carts']=Cart::session($iduser)->getContent();
        $data['cartscount']=$data['carts']->count();
         // dd($data['carts']);
        view::share($data);
    }
    public function index()
    {
        $data['products'] = Product::Where('status',1)->OrderBy('created_at','desc')->paginate(12);
        $data['sales']=Product::Where([['status',1],['promotion_price','<>',0]])->take(30)->paginate(8);
    	return view('pages.index',$data);
    }


    public function getlogin(){
        return view ('pages.login');
    }
   
    public function postlogin(Request $request){
        $validator = Validator::make($request->all(), [
           'email'=>'required|email',
           'pass'=>'required|min:6|max:10',
           
          
        ]);

        if ($validator->fails()) {
            return redirect(route('page.getlogin'))
                        ->withErrors($validator)
                        ->withInput();
        }

        if(Auth::attempt(['email'=> $request->email,'password'=>$request->pass])){
            return redirect()->route('page.index');
        }else{
            return back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getregister(){
        return view('pages.register');
    }

    public function postregister(Request $request){
        $validator = Validator::make($request->all(), [
           'name'=>'required|min:3|max:100|unique:users,fullname',
           'pass'=>'required|min:6|max:10',
           'passAgain'=>'required|same:pass',
           'birthday'=>'required',
           'email'=>'required|email|unique:users,email', 
           'phone'=>'numeric|required',
           'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect(route('page.getregister'))
                        ->withErrors($validator)
                        ->withInput();
        }

        $user = new User;
        $user->fullname = $request->name;
        $user->email = $request->email;
        $user->password=bcrypt($request->pass);
        $user->gender= $request->rdogender;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->role = 2;    
       
        if($request->hasFile('avatar')){
            $avatar = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('upload/user/'), $avatar);
            $user->avatar  = $avatar;
        }else{
            $user->avatar = "";
        }
        

        $user->save();
        return back()->with('thongbao','Bạn đã đăng kí thành công thành công hãy quay lại trang chu');

    }



    public function logout(){
        Auth::logout();
        return redirect(route('page.index'));
    }



    public function detailcate($id){

        $category = Categories::find($id);

        if($category->id_parent == 0){
           $data['products']= DB::table('product')->leftjoin('categories_product','product.id_cate','=','categories_product.id')->select('product.*','categories_product.id as idcate','categories_product.name as catename','categories_product.id_parent')->where([['product.status',1],['categories_product.id_parent',$id]])->orWhere('product.id_cate',$id)->paginate(12);


        }else{
             $data['products']=Product::where([['status',1],['id_cate',$id]])->paginate(12);
        }
          $data['categoryname'] = $category->name; 
    
         return view('pages.detailcate',$data);
    }

    public function detailproduct($id){
        $data['product'] = Product::find($id); 
        $data['detailproducts'] = DB::table('detail_product')->leftjoin('size_product','detail_product.id_size','=','size_product.id')->select('detail_product.*','size_product.size')->where([['detail_product.id_product',$id],['detail_product.quanlity','>',0]])->get();
        $data['otherproduct'] = Product::where('id_cate',$data['product']->id_cate)->take(8)->get();
        return view('pages.detailproduct',$data);
    }


    public function contact(){
        return view('pages.contact');
    }

    public function cart(){
        return view('pages.cart');
    }

    public function postorder(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
           'quantity'=>'required',
           'size'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('detailproduct/'.$request->idpro)
                        ->withErrors($validator)
                        ->withInput();
        }

        return redirect('orderproduct/'.$request->idpro .'/'.$request->size.'/'.$request->quantity);
    }


    public function orderproduct($idpro,$idsize,$quantity){
        // $product = DB::table('detail_product as a')->leftjoin('size_product as b','a.id_size','=','b.id')->join('product as c','c.id', '=', 'a.id_product')->select('a.*','a.id as id_detail','b.size','c.name','c.id as idproduct','c.*')
        // ->where(['a.id_product'=>$idpro,'a.id_size'=>$idsize])->first();
         $product = DB::table('detail_product as a')->leftjoin('size_product as b','a.id_size','=','b.id')->join('product as c','c.id', '=', 'a.id_product')->select('a.*','a.id as id_detail','b.size','c.name','c.id as idproduct','c.*')
        ->where([['a.id_product',$idpro],['a.id_size',$idsize ]])->first();
        if($product->quanlity > $quantity){
            if(Auth::check()){
             $iduser = Auth::user()->id;
            }else{
                 $iduser =-1;
            }
            $price = $product->promotion_price == 0 ?  $product->unit_price : $product->promotion_price;
            Cart::session($iduser)
            ->add([
                'id' => $product->id_detail,
                'name' => $product->name,
                'quantity' => $quantity,
                'price' => $price,
                'attributes'=>[
                        'image'=>$product->image,
                        'size' =>$product->size,
                    ]
            ]);

            $data['carts'] = Cart::getContent();
            return redirect(route('page.cartshop'));
        }else{
            return redirect('detailproduct/'.$idpro)->with('thongbao','Sản Phẩm Không Đủ Số Lượng. Xin Giam Số Lượng');
        }
        
    }

    public function cartshop()
    {
        if(Auth::check()){
             $iduser = Auth::user()->id;
        }else{
             $iduser =-1;
        }
        $data['carts'] = Cart::session($iduser)->getContent();
        $data['Total'] = Cart::session($iduser)->getTotal();
        return view('pages.cart',$data);
    }
    public function deletecart($id){
        if(Auth::check()){
             $iduser = Auth::user()->id;
        }else{
             $iduser =-1;
        }
        Cart::session($iduser)->remove($id);
        return redirect(route('page.cartshop'));


    }


    public function order(){
        
        if(Auth::check()){
            
            $iduser = Auth::user()->id;
            $data['carts'] = Cart::session($iduser)->getContent();
            $data['Total'] = Cart::session($iduser)->getTotal();
            if($data['Total'] != 0){
                return view('pages.order',$data);
            }else{
                return redirect(route('page.cartshop'))->with('thongbao','Giỏ hàng của bạn đang trống');
                }
           
        }else{
           
            return redirect(route('page.cartshop'))->with('thongbao','Hãy đăng nhập để đặt hàng');
        }
        
    }
}
