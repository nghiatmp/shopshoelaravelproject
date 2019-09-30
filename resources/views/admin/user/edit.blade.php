@extends('adminmaster.index')
@section('title','update user')
@section('content')
		 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Update
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('adminmaster.error')
                    @include('adminmaster.note')
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action=" " method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Please Enter Username" value="{{ $user->fullname }}" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" value="{{ $user->email }}" value="{{ old('email') }}"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="checkbox" id="check">
                                <label for=""> Repassword</label>
                                
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Please Enter Password" value="{{ old('pass') }}"/ disabled="" id="pass">
                            </div>
                             <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="passAgain" placeholder="Please Enter RePassword"  value="{{ old('passAgain') }}" disabled=""  id="passAgain" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="0" checked="" type="radio" @if($user->role == 0 ) checked="" @endif @if(old('rdoLevel')== 0 ) checked="" @endif>Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" type="radio"  @if($user->role == 1 ) checked="" @endif @if(old('rdoLevel')== 1 ) checked="" @endif>Staff
                                </label>
                                  <label class="radio-inline">
                                    <input name="rdogender" value="1" type="radio"  @if($user->role == 2 ) checked="" @endif @if(old('rdoLevel')== 2 ) checked="" @endif>Member
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Avatar old</label>
                                @if($user->avatar != '')
                                    <img src="upload/user/{{ $user->avatar }}" alt="" width="150px">
                                @else
                                    <p>Chưa có hình ảnh</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" name="avatar" placeholder="Please Enter Username" />
                            </div>
                           
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Please Enter Phone"value="{{ $user->phone }}"   value="{{ old('phone') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <label class="radio-inline">
                                    <input name="rdogender" value="0" checked="" type="radio" @if($user->gender == 0 ) checked="" @endif @if(old('rdogender')== 0 ) checked="" @endif>Male
                                </label>
                                <label class="radio-inline">
                                    <input name="rdogender" value="1" type="radio"  @if($user->gender == 1 ) checked="" @endif @if(old('rdogender')== 1 ) checked="" @endif>Female
                                </label>
                              
                            </div>
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="birthday" placeholder="Please Enter Birthday" value="{{ $user->birthday }}" value="{{ old('birthday') }}"/>
                            </div>
                             <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Address" value="{{ $user->address }}" value="{{ old('address') }}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-default">User Update</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            @csrf
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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