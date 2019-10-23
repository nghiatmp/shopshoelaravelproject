<?php

namespace App\Http\Controllers\page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Categories;
use App\Feedback;
use DB;
use Illuminate\Support\Facades\View;
use App\User;
use Cart;
use App\BillExport;
use App\DetailBillExport;
use App\Http\Requests\page\StoreMakeBill;
use App\Http\Requests\page\StoreRegisterPage;
use App\Http\Requests\page\StoreLoginPage;
use App\Http\Requests\page\StorePostOrderPage;
use App\Http\Requests\page\StoreUpdateUser;
use App\Http\Requests\page\StoreComment;

class PageController extends Controller
{

    public function __construct(){
        
        $data['cates'] = Categories::Where([['status',1],['id_parent',0]])->get();
        $data['catechild'] = Categories::Where([['status',1],['id_parent','<>',0]])->get();
        view::share($data);
    }
    public function index()
    {
        $data['products'] = Product::Where('status',1)->OrderBy('created_at','desc')->paginate(12);
        $data['sales']    = Product::Where([['status',1],['promotion_price','<>',0]])->take(8)->get();
        $data['sells']    = DB::table('detail_bill_export as a')
                            ->leftjoin('detail_product as b','a.id_detail_product','=','b.id')
                            ->leftjoin('product as c','b.id_product','=','c.id')
                            ->select(DB::raw('SUM(a.quanlity) as SL'),'c.*')
                            ->groupBy('c.id')
                            ->orderBy('SL','desc')
                            ->take(8)        
                            ->get();
        // dd($data['sell']);
    	return view('pages.index',$data);
    }


    public function getlogin(){
        return view ('pages.login');
    }
   
    public function postlogin(StoreLoginPage $request){
        if(Auth::attempt(['email'=> $request->email,'password'=>$request->pass])){
            return redirect()->route('page.index');
        }else{
            return back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getregister(){
        return view('pages.register');
    }

    public function postregister(StoreRegisterPage $request){

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



    public function detailcate(Request $request){
        $id = $request->id;
        $category = Categories::find($id);

        if($category->id_parent == 0){
           $data['products']= DB::table('product')
                            ->leftjoin('categories_product','product.id_cate','=','categories_product.id')
                            ->select('product.*','categories_product.id as idcate','categories_product.name as catename','categories_product.id_parent')
                            ->where([['product.status',1],['categories_product.id_parent',$id]])
                            ->orWhere('product.id_cate',$id)
                            ->paginate(12);


        }else{
             $data['products']=Product::where([['status',1],['id_cate',$id]])->paginate(12);
        }
          $data['categoryname'] = $category->name; 
    
         return view('pages.detailcate',$data);
    }

    public function detailproduct(Request $request){
        $id = $request->id;
        $data['product'] = Product::find($id); 
        $data['detailproducts'] = DB::table('detail_product')
                                ->leftjoin('size_product','detail_product.id_size','=','size_product.id')
                                ->select('detail_product.*','size_product.size')
                                ->where([['detail_product.id_product',$id],['detail_product.quanlity','>',0]])
                                ->get();

        $data['otherproduct'] = Product::where('id_cate',$data['product']->id_cate)->take(8)->get();

        $data['comments']   = DB::table('feedback as a')
                            ->join('users as b','a.id_user','=','b.id')
                            ->select('a.*','b.avatar')
                            ->where('id_product',$id)
                            ->get();
        return view('pages.detailproduct',$data);
    }


    public function contact(){
        return view('pages.contact');
    }

    public function cart(){
        return view('pages.cart');
    }

    public function postorder(StorePostOrderPage $request){

        return redirect('orderproduct/'.$request->idpro .'/'.$request->size.'/'.$request->quantity);
    }

    public function inforoder($id){
        $data['billexs'] = BillExport::Where('id_user',$id)->OrderBy('status','asc')->get();
        return view('pages.infororder',$data);
    }
    public function detailinfororder($id){
        $iduser = Auth::user()->id;
        $data['detailbillex'] = DB::table('detail_bill_export as a')
                                ->join('bill_export as b','a.id_bill_export','=','b.id')
                                ->join('detail_product as c','a.id_detail_product','=','c.id')
                                ->join('product  as d','c.id_product','=','d.id')
                                ->select('a.*','b.id as idbill','b.*','d.name')
                                ->join('size_product  as e','c.id_size','=','e.id')
                                ->select('a.*','b.id as idbill','b.*','d.name','e.size')
                                ->where([['b.id',$id],['b.id_user',$iduser]])
                                ->get();
       $data['billex'] = BillExport::find($id);
        return view('pages.detail-infor-order',$data);
    }


    public function orderproduct($idpro,$idsize,$quantity){
         $product = DB::table('detail_product as a')
                    ->leftjoin('size_product as b','a.id_size','=','b.id')
                    ->join('product as c','c.id', '=', 'a.id_product')
                    ->select('a.*','a.id as id_detail','b.size','c.name','c.id as idproduct','c.*')
                    ->where([['a.id_product',$idpro],['a.id_size',$idsize ]])
                    ->first();
        if($product->quanlity >= $quantity){
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

    public function makebill(StoreMakeBill $request)
    {

        $iduser = Auth::user()->id;
        $carts = Cart::session($iduser)->getContent();
        $Total = Cart::session($iduser)->getTotal();


        foreach ($carts as $cart) {
           // $id_detail = $cart['id'];
            $product = DB::table('detail_product as a')
                        ->leftjoin('size_product as b','a.id_size','=','b.id')
                        ->join('product as c','c.id', '=', 'a.id_product')
                        ->select('a.*','a.id as id_detail','b.size','c.name','c.id as idproduct','c.*')
                        ->where('a.id',$cart['id'])
                        ->first();
             if($cart['quantity'] > $product->quanlity){
                return redirect(route('page.order'))->with('thongbao','Số lượng sản phẩm k đáp ứng đủ, Xin giảm số lượng');
             }

        }

       
        $billex = new BillExport;
        $billex->id_user = $iduser;
        $billex->nameCusromer= $request->username;
        $billex->phone = $request->phone;
        $billex->totalmoney=$Total;
        $billex->payment = $request->thanhtoan;
        $billex->note = $request->note;
        $billex->status= 0;
        $billex->address = $request->address;

        $billex->save();


        // detailbillex
        foreach ($carts as $cart) {
            $product = DB::table('detail_product as a')
                        ->leftjoin('size_product as b','a.id_size','=','b.id')
                        ->join('product as c','c.id', '=', 'a.id_product')
                        ->select('a.*','a.id as id_detail','b.size','c.name','c.id as idproduct','c.*')
                        ->where('a.id',$cart['id'])
                        ->first();

                $detailbillex = new DetailBillExport;
                $detailbillex->id_bill_export =  $billex->id;
                $detailbillex->id_detail_product= $cart['id'];
                $detailbillex->quanlity=$cart['quantity'];
                $detailbillex->price =$cart['price'];


                $detailbillex->save();

                // $product->quanlity = ( $product->quanlity ) - ( $cart['quantity']);
                 $quan = ( $product->quanlity ) - ( $cart['quantity']);
                DB::table('detail_product as a')
                ->leftjoin('size_product as b','a.id_size','=','b.id')
                ->join('product as c','c.id', '=', 'a.id_product')
                ->select('a.*','a.id as id_detail','b.size','c.name','c.id as idproduct','c.*')
                ->where('a.id',$cart['id'])
                ->update(['quanlity'=>$quan]);

                Cart::session(Auth::user()->id)->remove($cart['id']);
            
        }
        // return redirect(route('page.order'))->with('thongbao','Đặt hàng Thành Công');
         return redirect('inforoder/'.Auth::user()->id)->with('thongbao','Đặt hàng Thành Công');

    }


    public function infor(){
        $id = Auth::user()->id;
        $data['info'] = User::find($id);
        return view('pages.infor',$data);
    }
    public function update(){
         $id = Auth::user()->id;
         $data['info'] = User::find($id);
        return view('pages.update-user',$data);
    }
    public function postupdate(Request $request){
        // dd($request->all());

        $id =Auth::user()->id;
        $validator = Validator::make($request->all(), [
           'user'=>'required|min:3|max:100|unique:users,fullname,'.$id,
           'birthday'=>'required',
           'email'=>'required|email|unique:users,email,'.$id, 
           'phone'=>'numeric|required',
           'address' => 'required',
           // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect(route('page.update'))
                        ->withErrors($validator)
                        ->withInput();
        }


         $user = User::find($id);

        if($request->checkpass == "on"){
                $validator = Validator::make($request->all(), [
               'pass'=>'required|min:6|max:10',
               'passAgain'=>'required|same:pass',
           
            ]);

            if ($validator->fails()) {
                return redirect(route('page.update'))
                            ->withErrors($validator)
                            ->withInput();
            }
             $user->password=bcrypt($request->pass);
        }

       
        $user->fullname = $request->user;
        $user->email = $request->email;
        $user->gender= $request->gender;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->role = 2;
       
        if(isset($request->avatar)){
            $avatar = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('upload/user/'), $avatar);
            $user->avatar= $avatar;
        }
        $user->save();
        return redirect(route('page.infor'))->with('thongbao','Bạn cập nhật thông tin thành công');
    }

    // comment


    public function comment(StoreComment $request){
        // dd($request->all());
        $comment = new Feedback;
        $comment->id_user    = Auth::user()->id;
        $comment->nameUser   = $request->name;
        $comment->id_product = $request->idpro;
        $comment->content    = $request->comment;

        $comment->save();

        return redirect()->route('page.detailproduct',['id'=>$request->idpro])->with('thongbao','Cảm ơn bạn đã để lại bình luận');
    }


    //search

    public function search(Request $request){
        $key = $request->key;
        $data['products'] = Product::where('name','like',"%$key%")->paginate(16)->appends(['key'=>$key]);
        $data['key']     =$key;
        return view('pages.search',$data);
    }


}
