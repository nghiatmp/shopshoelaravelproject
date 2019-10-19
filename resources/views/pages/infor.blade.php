@extends('pagemaster.index')

@section('title','infor')

@section('content')
	<div class="content mt-5">
		<div class="container" style="width: 60%">
			<div class="">
				<h2 class="text-center mb-5" style="font-family: Arial, Helvetica, sans-serif;">Thông Tin Cá Nhân</h2>
			</div>
			@include('pagemaster.note')

			<div class="row">
				<div class="col-lg-5 col-md-5 col-sm-5">
					 <div class="img">
					 	  <img src="upload/user/{{ $info->avatar }}" alt="" width="300px" height="300px">
					 </div>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7" style="font-size:18px">
					<div class="form-group">
						<label for=""><b>Tên tài khoản [&radic;]</b></label>
						<p>{{ $info->fullname }}</p>
					</div>
					<div class="form-group">
						<label for=""><b>Email [&radic;]</b></label>
						<p>{{ $info->email }}</p>
					</div>
					<div class="form-group">
						<label for=""><b>Giới tính [&radic;]</b></label>
						<p>{{ $info->gender == 0 ? 'Nam' : 'Nữ'}}</p>
					</div>
					<div class="form-group">
						<label for=""><b>Số Điện Thoại [&radic;]</b></label>
						<p>{{ $info->phone }}</p>
					</div>
					<div class="form-group">
						<label for=""><b>Ngày Sinh [&radic;]</b></label>
						<p>{{ $info->birthday }}</p>
					</div>
					<div class="form-group">
						<label for=""><b>Địa Chỉ [&radic;]</b></label>
						<p>{{ $info->address }}</p>
					</div>
					<div class="form-group">
						<a href="{{route('page.update')}}" title="" class="btn btn-primary">Chỉnh Sửa Thông Tin</a>
					</div>
				</div>
			</div>
		</div>	
	</div>
@endsection