@extends('pagemaster.index')
@section('title','contact')

@section('content')
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<h4 class="mt-5 mb-5">Địa Chỉ Của Shop Trên Bản Đồ</h4>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3958469539543!2d105.78156371476301!3d21.016841486004814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454ab43c0c4db%3A0xdb6effebd6991106!2sKeangnam%20Hanoi%20Landmark%20Tower!5e0!3m2!1svi!2s!4v1566795328555!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
				<div class="col-lg-5">
					<h4 class="mt-5 mb-5">Thông Tin Liên Hệ Với Shop</h4>
					<form class="form-group">
							<label for="">Email Shop</label>
							<h5>Nghiaminhle0801@gmail.com</h5>
							
							<label for="">Address</label>
							<h5>Yên Lâm - Yên Mô - Ninh Bình</h5>
					</form>
					<h4 class="mt-5 mb-5">Đóng góp ý kiến</h4>
					<div class="mt-5">
						<form class="form-group">
							<label for="">Họ Và Tên :</label>
							<input type="text" name="" class="form-control">
							<label for="">Email :</label>
							<input type="email" name="" class="form-control">
							<label for="">Số Điện Thoại:</label>
							<input type="text" name="" class="form-control">
							<label for="">Y kiến Đóng Gop :</label>
							<textarea name="" class="form-control"></textarea>
						</form>
						<button type="submit" class="btn btn-primary">Gửi ý kiến</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection