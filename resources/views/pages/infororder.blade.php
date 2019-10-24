

@extends('pagemaster.index')

@section('title','inforoder')

@section('content')
	<div class="content mt-5">
		
		<div class="row">
			<div class="container">
				@include('pagemaster.note')
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
				@foreach($billexs as $billex)
					<tr>
		                <td>{{ $billex->id }}</td>
		                <td>{{ $billex->nameCusromer }}</td>
		                <td>{{ $billex->totalmoney }}</td>
		                <td>{{ $billex->status == 0 ? "Đang Đợi Duyệt" : "Đã Duyệt"}}</td>
		                <td>
		                	<a href="detail-infor-order/{{$billex->id }}">Xem Chi Tiết</a>
		                </td>
		                <td >
		                	<a href="{{ route('page.delete-order',['id'=>$billex->id]) }}" class="btn btn-danger" onclick="return confirm('Bạn Có Chắc Chắn Muốn Hủy Đơn Hàng Này Không ??')">Hủy Đơn Hàng</a>
		                </td>
		            </tr>
		        @endforeach
			</tbody>
		</table>
		</div>
	</div>
@endsection




