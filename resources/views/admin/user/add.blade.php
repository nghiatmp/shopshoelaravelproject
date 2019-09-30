@extends('adminmaster.index')
@section('title','add user')
@section('content')
		 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User Add
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @include('adminmaster.error')
                    @include('adminmaster.note')
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('userpostadd') }}" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Please Enter Username" value="{{ old('name') }}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" value="{{ old('email') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="pass" placeholder="Please Enter Password" value="{{ old('pass') }}"/>
                            </div>
                             <div class="form-group">
                                <label>RePassword</label>
                                <input type="password" class="form-control" name="passAgain" placeholder="Please Enter RePassword" value="{{ old('passAgain') }}" />
                            </div>
                            <div class="form-group">
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="0" checked="" type="radio" @if(old('rdoLevel')== 0 ) checked="" @endif>Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="1" type="radio" @if(old('rdoLevel')== 1 ) checked="" @endif>Staff
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoLevel" value="2" type="radio" @if(old('rdoLevel')== 2 ) checked="" @endif>Member
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" name="avatar" placeholder="Please Enter Username" />
                            </div>
                           
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Please Enter Phone" value="{{ old('phone') }}"/>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <label class="radio-inline">
                                    <input name="rdogender" value="0" checked="" type="radio" @if(old('rdogender')== 0 ) checked="" @endif>Male
                                </label>
                                <label class="radio-inline">
                                    <input name="rdogender" value="1" type="radio" @if(old('rdogender')== 1 ) checked="" @endif>Female
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" class="form-control" name="birthday" placeholder="Please Enter Birthday" value="{{ old('birthday') }}"/>
                            </div>
                             <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Address" value="{{ old('address') }}"/>
                            </div>
                            
                            <button type="submit" class="btn btn-default">User Add</button>
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