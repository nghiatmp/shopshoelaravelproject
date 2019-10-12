@extends('pagemaster.index')

@section('title','order')

@section('content')
	<div class="content">
		<div class="container">
			@include('pagemaster.error')
			<div class="row">

				<div class="col-lg-6">
					<div>
						<h3 class="mt-5 mb-5"> Đơn Hàng Của Bạn </h3>
					</div>
					@foreach($carts as $cart)
						<div class="row mb-5">
							<div class="col-lg-3">
								<img width="150px" height="120px" src="upload/product/{{ $cart['attributes']['image'] }}" alt="" class="mt-4">
							</div>
							<div class="col-lg-9 pl-5">
								<h4>{{ $cart->name }}</h4>
								<h5>Số Lượng :{{ $cart->quantity }}</h5>
								<h5>Size :{{ $cart['attributes']['size'] }}</h5>
								<h5>Đơn Giá:{{ number_format($cart['price']*$cart['quantity'] ,0 ,'.' ,'.').' Đ' }}</h5>
							</div>
						</div>
					@endforeach
						<div class="mt-5 mb-5" style="border-top:  1px dotted gray; display: flex;">
							<h4>Tổng Tiền Hóa Đơn : </h4>
							<h4 class="ml-5"> {{ number_format($Total ,0 ,'.' ,'.').' Đ' }} </h4>
						</div>

					
				</div>

				<div class="col-lg-6 mt-5">
					<form action="{{ route('make-bill') }}" method="POST">
						@csrf
						<div  style="border-top: 1px dotted gray;">
						<h3 class="mt-3 mb-3">Hình Thức Thanh Toán</h3>
					</div>
					<div style="border-bottom: 1px dotted gray;">
						<input type="radio" name="thanhtoan" class="mb-4" id="ttts" value="0" checked=""> Thanh toán khi nhận hàng <br>
						     <div id="ts" style="margin-left: 30px; display: none;">
						     	<p>Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng</p>
						     </div>
						<input type="radio" name="thanhtoan" class="mb-4" id="tttt" value="1"> Chuyển khoản <br>
						    <div id="tt" style="margin-left: 30px;display: none">
						    	<p>
						    		Chuyển khoản tới : <br>
						    		    Tài Khoản : Lê Minh Nghĩa <br>
						    		    Ngân Hàng : Techcombank <br>
						    		    STK : 123456789 <br>
						    	</p>
						    </div>

					</div>
					<h3>Thông Tin Khách Hàng</h3>
					<div class="mt-5">
							<label for="">Họ Và Tên :</label>
							<input type="text" name="username" class="form-control">
							<label for="">Email :</label>
							<input type="text" name="email" class="form-control">
							<label for="">Số Điện Thoại:</label>
							<input type="text" name="phone" class="form-control">
							<label for="">Địa Chỉ Nhận Hàng :</label>
							<input type="text" name="address" class="form-control">
							<label for="">Yêu Cầu, Ghi Chú :</label>
							<textarea name="note" class="form-control"></textarea>
						<button type="submit" class="btn btn-primary">Hoàn Tất Đặt Hàng</button>
					</div>
					</form>
					
							
				</div>

			</div>
		</div>
	</div>
@endsection


@section('script')

  <script>
  	$('#ttts').on('click', function (e) {
  	 	$('#ts').collapse('toggle');
  	 	$('#tt').collapse('hide');
        });

  	$('#tttt').on('click', function (e) {
  	 	$('#tt').collapse('toggle');
  	 	$('#ts').collapse('hide');
  	 	});
  </script>
@endsection