<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Resgiter</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="backend/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="backend/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="backend/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="backend/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="mt-5 mb-5">
                    <h2 class="text-center mt-5 mb-5">Resgiter <small><a href="{{ route('page.index') }}">back</a></small></h2>
                    
                </div>
                <div class=" panel panel-default">
                    @include('adminmaster.error')
                    @include('adminmaster.note')
                    <div class="panel-body">
                        <form action="{{ route('page.postregister') }}" method="POST" enctype="multipart/form-data">
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
                            
                            <button type="submit" class="btn btn-default">Register</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                            @csrf
                        <form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="backend/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="backend/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="backend/dist/js/sb-admin-2.js"></script>

</body>

</html>
