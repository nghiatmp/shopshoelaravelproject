@extends('pagemaster.index')
@section('title','cart')

@section('content')
<div class="content mt-5">
		<div class="container">
			<table class="table table-hover table-cart" style="text-align: center;">
			<thead>
				<tr>
					<th>Hình Anh</th>
				    <th>Tên Sản Phẩm</th>
				    <th>Số Lượng</th>
				    <th>Size</th>
				    <th>Action</th>
				    <th>Giá Tiền</th>
				    <th>Tổng Tiền</th>
				</tr>
			</thead>
			<tbody>
				@if(isset($carts))
				@foreach($carts as $cart)
				<tr>
	                <td>
	                	<img width="150px" height="100px" src="upload/product/{{ $cart['attributes']['image'] }}" alt="" style="border-radius: 10%">
	                </td>
	                <td> {{ $cart['name'] }}</td>
	                <td>
	                	<input type="number" name="" value="{{ $cart['quantity'] }}" class="form-control" style="width:40%">
	                </td>
	                <td> {{ $cart['attributes']['size'] }}</td>
	                <td>
	                	<a href="deletecart/{{ $cart['id'] }}" title="" class="btn btn-danger"onclick="return confirm('Are you sure');">Xóa</a>
	                	<a href="" title="" class="btn btn-primary">Sửa</a>
	                </td>
	                <td>{{ number_format($cart['price'] ,0 ,'.' ,'.').' Đ' }}</td>
	                <td>{{ number_format($cart['price']*$cart['quantity'] ,0 ,'.' ,'.').' Đ' }}</td>
	                
				</tr>
				@endforeach
				@endif
			
			</tbody>
			<tfoot style="font-size: 22px;">
				<tr>
					<td colspan="5" rowspan="" headers="" >Tổng Tiền Giỏ Hàng</td>
					<td colspan="" rowspan="" headers="">{{ number_format($Total ,0 ,'.' ,'.').' Đ' }}</td>
				</tr>
			</tfoot>
		</table>
		<div>
			<a href="{{ route('page.index') }}" title="" class="btn btn-primary">Tiếp Tục Mua Sắm</a>
			<a href="dathang.html" title="" class="btn btn-success">Đặt Hàng</a>
		</div>
		</div>
	</div>

@endsection