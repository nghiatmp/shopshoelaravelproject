<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class UserController extends Controller
{
    public function list(){
    	$data['users'] = DB::table('users')->where('status',1)->orderBy('role','asc')->paginate(10);
    	return view('admin.user.list',$data);
    }
    public function add(){
    	return view('admin.user.add');
    }
    public function postadd(Request $request){
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
            return redirect(route('useradd'))
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
        $user->role = $request->rdoLevel;
       
        if($request->hasFile('avatar')){
            $avatar = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('upload/user/'), $avatar);
            $user->avatar  = $avatar;
        }else{
            $user->avatar = "";
        }
        

        $user->save();
        return back()->with('thongbao','Bạn đã thêm Users thành công');

	}

    public function edit($id){
        $data['user'] = User::find($id);
        return view('admin.user.edit',$data);
    }
    public function postedit($id, Request $request){
       $validator = Validator::make($request->all(), [
           'name'=>'required|min:3|max:100|unique:users,fullname,'.$id,
           'birthday'=>'required',
           'email'=>'required|email|unique:users,email,'.$id, 
           'phone'=>'numeric|required',
           'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect(route('useradd'))
                        ->withErrors($validator)
                        ->withInput();
        }


         $user =  User::find($id);

        if($request->checkbox == "on"){
                $validator = Validator::make($request->all(), [
               'pass'=>'required|min:6|max:10',
               'passAgain'=>'required|same:pass',
           
            ]);

            if ($validator->fails()) {
                return redirect(route('useradd'))
                            ->withErrors($validator)
                            ->withInput();
            }
             $user->password=bcrypt($request->pass);
        }

       
        $user->fullname = $request->name;
        $user->email = $request->email;
       
        $user->gender= $request->rdogender;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->address = $request->address;
        $user->role = $request->rdoLevel;
       
        if($request->hasFile('avatar')){
            $avatar = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('upload/user/'), $avatar);
            $user->avatar  = $avatar;
        }
        

        $user->save();
        return back()->with('thongbao','Bạn update Users thành công');

    }

    public function delete($id){
        $user = User::find($id);
        $user->status = 0;
        $user->save();
        return back()->with('thongbao','Bạn đã xóa người dùng thành công');
    }


    public function login(){
        return view('admin.login');
    }
    public function postlogin(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
           'pass'=>'required|min:6|max:10',
           
          
        ]);

        if ($validator->fails()) {
            return redirect(route('login'))
                        ->withErrors($validator)
                        ->withInput();
        }

        if(Auth::attempt(['email'=> $request->email,'password'=>$request->pass])){
            return redirect()->route('categorylist');
        }else{
            return back()->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login'));
    }
}
