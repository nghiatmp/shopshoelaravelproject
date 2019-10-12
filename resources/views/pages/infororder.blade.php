@extends('pagemaster.index')

@section('title','inforoder')

@section('content')
	<div class="content mt-5">
		<div class="row">
			<div class="container">
				<h2 class="text-justify mb-5" style="margin-left: 400px">Thông Tin Đơn Hàng  <a href="{{ route('page.index') }}" style="font-size: 15px">(Quay lại trang chủ)</a></h2>
			
		</div>

		<div class="container">
			<table class="table table-hover table-cart" id="tablebill2" style="text-align: center;">
			<thead>

				    <th>Mã Hóa Đơn</th>
				    <th>Tên Khách Hàng</th>
				    <th>Tổng Tiền</th>
				    <th>Tình Trạng</th>
				    <th>Chi Tiết Hóa Đơn</th>
				    <th>Hủy Đơn Hàng</th>
				 
				</tr>
			</thead>
			<tbody>
				<tr>
	                <td>01</td>
	                <td>Lê Minh Nghĩa</td>
	                <td>20000</td>
	                <td>Đang Đợi Duyệt</td>
	                <td>
	                	<a href="{{ route('page.detailinfororder') }} ">Xem Chi Tiết</a>
	                </td>
	                <td >
	                	<a href="" class="btn btn-danger">Hủy Đơn Hàng</a>
	                </td>
			</tbody>
		</table>
		</div>
	</div>

@endsection