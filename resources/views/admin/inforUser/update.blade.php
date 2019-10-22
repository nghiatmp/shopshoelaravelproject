@extends('adminmaster.index')
@section('title','update staff')
@section('content')
   <div class="content mt-5">
        <div class="container" style="border: 1px solid #79F2E7;">
        <div class="row mb-3" style="border-bottom: 1px solid #79F2E7;background-color: #F5F1F1;padding: 10px 15px">
            <b class="ml-5 mt-3 mb-3 p-3" style="font-size: 20px;padding: 20px 20px">Update User</b>
        </div>
        <div class="row mt-5" style="margin-top: 15px">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <img width="300px" height="300px" src="upload/user/{{ $info->avatar }}" alt=""> <br>
                <b style="margin-left:80px; margin-top:35px;">Ảnh đại diện[&radic;]</b>
            </div>

            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                @include('pagemaster.error')
                <form action="{{ route('post.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for=""><b>Tên tài khoản [&radic;]</b></label>
                        <input type="text" name="user" class="form-control" value="{{ $info->fullname }}">
                    </div>
                    <input style="margin-bottom: 20px" type="checkbox" name="checkpass" class="mt-3 mb-5" id="check"> <b>Đổi Mật khẩu</b>
                    <div class="form-group">
                        <label for=""><b>Mật khẩu [&radic;]</b></label>
                        <input type="password" name="pass" class="form-control" id="pass" disabled="">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Nhập lại mật khẩu [&radic;]</b></label>
                        <input type="password" name="passAgain" class="form-control" id="passAgain" disabled="">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Email [&radic;]</b></label>
                        <input type="email" name="email" class="form-control" value="{{ $info->email }}">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Avater Change [&radic;]</b></label> <br>
                        <input type="file" name="avatar">
                    </div>
                    <div class="form-group">
                        <label for=""><b>Ngày Sinh[&radic;]</b></label> <br>
                        <input type="date" name="birthday" value="{{ $info->birthday }}" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1"> <b>Giới tính </b> </label>
                        <input type="radio" name="gender" value="0" {{ $info->gender == 0 ? 'checked = ' :'' }}> Nam
                        <input type="radio" name="gender" value="1" {{ $info->gender == 1 ? 'checked = ' :'' }}> Nữ
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1"> <b>Số Điện Thoại</b>  </label>
                        <input type="text" name="phone" value="{{ $info->phone }}" class="form-control"> 
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1"> <b>Địa Chỉ</b>  </label>
                        <input type="text" name="address" class="form-control" value="{{ $info->address }}"> 
                    </div>
                    <div class="form-group">
                        {{-- <button class="btn btn-primary"><b>Quay lại trang trước</b></button>  --}}
                        <button style="margin-left: 290px" class="btn btn-primary"><b>Cập nhật dữ liệu</b></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
     <script  type="text/javascript">
        $(document).ready(function(){
            $('#check').change(function(){
                if($('#check').is(":checked")){
                    $("#pass").removeAttr('disabled');
                    $("#passAgain").removeAttr('disabled');
                }else{
                    $("#pass").attr('disabled','');
                    $("#passAgain").attr('disabled','');
                }
            });
        });
    </script>
    </script>
@endsection