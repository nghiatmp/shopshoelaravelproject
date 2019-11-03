
	<div class="container">
		<div id="wrap-inner">
		<div id="khach-hang" class="mt-5 ml-5">
			<h3><b>Thông tin khách hàng</b></h3>
			<p>
				<span class="info"><b> Khách Hàng :</b> </span>
				{{ $infor['username'] }}
			</p>
			<p>
				<span class="info"><b> Email :</b>: </span>
				{{ $infor['email'] }}
			</p>
			<p>
				<span class="info"><b> Điện Thoại :</b> </span>
				{{ $infor['phone'] }}
			</p>
			<p>
				<span class="info"><b> Địa Chỉ :</b> </span>
				{{ $infor['address'] }}
			</p>
		</div>						
		<div id="hoa-don" class="ml-5 mt-5">
			<h3><b>Hóa đơn mua hàng</b> </h3>							
			<table class="table-bordered table">
				<tr class="bold">
					<th width="30%">Tên sản phẩm</th>
					<th width="25%">Giá</th>
					<th width="20%">Số lượng</th>
					<th width="15%">Thành tiền</th>
				</tr>
				@foreach($carts as $cart)
				<tr>
					<td>{{ $cart['name'] }}</td>
					<td class="price">{{ $cart['price'] }} VNĐ</td>
					<td>{{ $cart['quantity'] }}</td>
					<td class="price">{{ $cart['price']*$cart['quantity'] }} VNĐ</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="3">Tổng tiền:</td>
					<td class="total-price">{{ $Total }}VNĐ</td>
				</tr>
			</table>
		</div>
		<div id="xac-nhan">
			<br>
			<p align="justify">
				<b>Quý khách đã đặt hàng thành công!</b><br />
				• Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br />
				• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng.<br />
				<b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của chúng Tôi!</b>
			</p>
		</div>
	</div>

