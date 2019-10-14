@extends('pagemaster.index')

@section('title','detail-inforoder')
	
@section('content')
@if ( $detailbillex ->count() > 0)
<div class="content mt-5">
		<div class="row">
			<div class="container">
				<h2 class="text-justify mb-5" style="margin-left: 400px">HÓA ĐƠN BÁN HÀNG <a href="" style="font-size: 15px">(Quay lại trang chủ)</a></h2>
			
			<table class="table" id="tablebill">
					<tr>
						<td>Mã Hóa Đơn</td>
						<td>{{ $billex->id }}</td>
					</tr> 	
					<tr>
						<td>Khách Hàng</td>
						<td>{{ $billex->nameCusromer }}</td>
					</tr>
					<tr>
						<td>Số Điện Thoại</td>
						<td > {{ $billex->phone }}</td>
					</tr>
					<tr>
						<td>Địa Chỉ</td>
						<td>{{ $billex->address }}</td>
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
				@foreach($detailbillex as $db)
					<tr>
		                <td>
		                	{{ $db->name }}	
		                </td>
		                <td>{{ $db->size }}</td>
		                <td>{{ $db->quanlity }}</td>
		                <td>{{ $db->price }}</td>
		                <td>{{ $db->quanlity*$db->price }}</td>
		   			</tr>
				@endforeach

			</tbody>
			<tfoot style="font-size: 15px;">
				<tr>
					<td colspan="2">Tổng Tiền Hóa Đơn</td>
					<td>{{ $billex->totalmoney }}</td>
				</tr>
			</tfoot>
		</table>
		</div>
	</div>
@else
	<h2 class="text-center text-danger">Lỗi</h2>
@endif
@endsection