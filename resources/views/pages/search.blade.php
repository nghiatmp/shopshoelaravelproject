@extends('pagemaster.index')
@section('title','Trang Chủ')
@section('content')
	<div class="content">
		<?php
			function doimau($str,$key){
				return str_replace($key, "<span style='color:red'>$key</span>", $str);
			}
		?>
		<div class="container">
			<div class="mt-5 mb-5">
				<h4>Sản phẩm với từ khóa : {{ $key }}</h4>
				<div class="beta-products-details">
					<p class="pull-left">Tìm Thấy: {{$products->total()}} Sản Phẩm</p>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="row">
				@foreach($products as $product)
				<div class="col-lg-3 mb-5 mt-5 product">
					<div class="single-item">

						<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						<div class="single-item-header">
							<a href="{{ route('page.detailproduct',['slug'=>$product->slug,'id'=> $product->id ]) }}"><img width="270px" height="200px" src="upload/product/{{ $product->image }}" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title mt-3" style="color: #030303">{!! doimau($product->name,$key)!!}</p>
							<p class="single-item-price">
								@if($product->promotion_price != 0)
								<span class="flash-del">{{ number_format($product->unit_price ,0 ,'.' ,'.').' Đ' }}</span>

								<span class="flash-sale">{{ number_format($product->promotion_price ,0 ,'.' ,'.').' Đ' }}</span>
								@else
										{{-- <span class="flash-sale">{{ $product->unit_price }}đ</span> --}}
										<span class="flash-sale">{{ number_format($product->unit_price ,0 ,'.' ,'.').' Đ' }}</span>
	
								@endif
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{{ route('page.detailproduct',['slug'=>$product->slug,'id'=> $product->id ]) }}"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 50px; margin-left: 5px"></i></a>
							<a style="background-color: #3A5C83; font-size: 18px; margin-left: 18px;" class="btn btn-success" href="{{ route('page.detailproduct',['slug'=>$product->slug,'id'=> $product->id ]) }}"> Details <i style="font-size: 20px; margin-left: 10px;margin-top:6px" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							<div class="clearfix"></div>
						</div>
							
					</div>
				</div>
				@endforeach
				<div style="margin: auto; width: 340px">
					{{$products->appends(Request::all())->links()}}
				</div>
				
			</div>	
		</div>
	</div>
	<div class="container mt-5 mb-5">
		<div class="thuonghieu" style="margin-left:70px">
		<ul>
			<li>
				<a href="detailcate/ADIDAS~1" title="">
					<img width="100px" src="frontend/images/thuonghieu/adisas.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/Balenciaga~16" title="">
					<img width="100px" src="frontend/images/thuonghieu/balenciaga.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/CONVERSE~4" title="">
					<img width="100px" src="frontend/images/thuonghieu/converse.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/Fila~18" title="">
					<img width="100px" src="frontend/images/thuonghieu/fila.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/NIKE~2" title="">
					<img width="100px" src="frontend/images/thuonghieu/nilke.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="index" title="">
					<img width="100px" src="frontend/images/thuonghieu/puma.png" alt="" style="margin-left: 15px">
				</a>
			</li>
		</ul>
	</div>
	</div>

@endsection