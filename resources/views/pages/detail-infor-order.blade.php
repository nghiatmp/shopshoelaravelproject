@extends('pagemaster.index')

@section('title','detail-inforoder')
	
@section('content')

<div class="content mt-5">
		<div class="row">
			<div class="container">
				<h2 class="text-justify mb-5" style="margin-left: 400px">HÓA ĐƠN BÁN HÀNG <a href="" style="font-size: 15px">(Quay lại trang chủ)</a></h2>
			
			<table class="table" id="tablebill">
					<tr>
						<td>Mã Hóa Đơn</td>
						<td>01</td>
					</tr> 	
					<tr>
						<td>Khách Hàng</td>
						<td>Lê Minh Nghĩa</td>
					</tr>
					<tr>
						<td>Số Điện Thoại</td>
						<td > 0929550594</td>
					</tr>
					<tr>
						<td>Địa Chỉ</td>
						<td>Keangame- Hà Nội</td>
					</tr>
			</table>
		</div>

		<div class="container">
			<table class="table table-hover table-cart" id="tablebill2" style="text-align: center;">
			<thead>

				    <th>Tên Sản Phẩm</th>
				    <th>Size</th>
				    <th>Số Lượng</th>
				    <th>Giá Tiền</th>
				    <th>Tổng Tiền</th>
				</tr>
			</thead>
			<tbody>
				<tr>
	                <td>
	                	Giày Balenciaga
	                </td>
	                <td>42</td>
	                <td>2</td>
	                <td>$15</td>
	                <td>$15</td>
	   
				

			</tbody>
			<tfoot style="font-size: 15px;">
				<tr>
					<td colspan="2">Tổng Tiền Hóa Đơn</td>
					<td>$15</td>
				</tr>
			</tfoot>
		</table>
		</div>
	</div>
@endsection