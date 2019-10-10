@extends('pagemaster.index')
@section('title','Trang Chủ')
@section('content')
<div class="container">
	<!-- <div class="nav"> -->
		<div class="menu1">
			<div id="demo" class="carousel slide" data-ride="carousel">
			  <ul class="carousel-indicators">
			    <li data-target="#demo" data-slide-to="0" class="active"></li>
			    <li data-target="#demo" data-slide-to="1"></li>
			    <li data-target="#demo" data-slide-to="2"></li>
			  </ul>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img width="100%" height="450px" src="frontend/images/slide/1.jpg" alt="Los Angeles" width="1100" height="500">
			      <div class="carousel-caption">
			        <h3>Los Angeles</h3>
			        <p>We had such a great time in LA!</p>
			      </div>   
			    </div>
			    <div class="carousel-item">
			      <img width="100%" height="450px" src="frontend/images/slide/2.jpg" alt="Chicago" width="1100" height="500">
			      <div class="carousel-caption">
			        <h3>Chicago</h3>
			        <p>Thank you, Chicago!</p>
			      </div>   
			    </div>
			    <div class="carousel-item">
			      <img width="100%" height="450px" src="frontend/images/slide/3.jpg" alt="New York" width="1100" height="500">
			      <div class="carousel-caption">
			        <h3>New York</h3>
			        <p>We love the Big Apple!</p>
			      </div>   
			    </div>
			  </div>
			  <a class="carousel-control-prev" href="#demo" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#demo" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			  </a>
			</div>
		</div>
	<!-- 	</div> -->
	</div>
	<div class="content">
		<div class="container">
			<div class="mt-5 mb-5">
				<h2>Sản Phẩm Đang Khuyến Mại</h2>
			</div>
			<div class="row">
				@foreach($sales as $sale)
				<div class="col-lg-3 mb-5 mt-5 product">
					<div class="single-item">

						<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						<div class="single-item-header">
							<a href="detailproduct/{{ $sale->id }}"><img width="270px" height="200px" src="upload/product/{{ $sale->image }}" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title mt-3" style="color: #030303">{{ $sale->name }}</p>
							<p class="single-item-price">
								
								<span class="flash-del">{{ number_format($sale->unit_price ,0 ,'.' ,'.').' Đ' }}</span>

								<span class="flash-sale">{{ number_format($sale->promotion_price ,0 ,'.' ,'.').' Đ' }}</span>
								
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="detailproduct/{{ $sale->id }}"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 50px; margin-left: 5px"></i></a>
							<a style="background-color: #3A5C83; font-size: 18px; margin-left: 18px;" class="btn btn-success" href="detailproduct/{{ $sale->id }}"> Details <i style="font-size: 20px; margin-left: 10px;margin-top:6px" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							<div class="clearfix"></div>
						</div>
							
					</div>
				</div>
				@endforeach
				<div style="margin: auto; width: 340px">
					{{ $sales->links() }}
				</div>
				
			</div>
			<div class="mt-5 mb-5">
				<h2>Sản Phẩm Mới Nhất</h2>
			</div>
			<div class="row">
				@foreach($products as $product)
				<div class="col-lg-3 mb-5 mt-5 product">
					<div class="single-item">
						@if($product->promotion_price != 0)
						<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						<div class="single-item-header">
							<a href="detailproduct/{{ $product->id }}"><img width="270px" height="200px" src="upload/product/{{ $product->image }}" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title mt-3" style="color: #030303">{{ $product->name }}</p>
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
							<a class="add-to-cart pull-left" href="detailproduct/{{ $product->id }}"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 50px; margin-left: 5px"></i></a>
							<a style="background-color: #3A5C83; font-size: 18px; margin-left: 18px;" class="btn btn-success" href="detailproduct/{{ $product->id }}"> Details <i style="font-size: 20px; margin-left: 10px;margin-top:6px" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							<div class="clearfix"></div>
						</div>
							
					</div>
				</div>
				@endforeach
				<div style="margin: auto; width: 340px">
					{{ $products->links() }}
				</div>
				
			</div>
			
			
		</div>
	</div>
	<div class="container mt-5 mb-5">
		<div class="thuonghieu" style="margin-left:70px">
		<ul>
			<li>
				<a href="detailcate/1" title="">
					<img width="100px" src="frontend/images/thuonghieu/adisas.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/16" title="">
					<img width="100px" src="frontend/images/thuonghieu/balenciaga.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/4" title="">
					<img width="100px" src="frontend/images/thuonghieu/converse.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/18" title="">
					<img width="100px" src="frontend/images/thuonghieu/fila.png" alt="" style="margin-left: 15px">
				</a>
			</li>
			<li>
				<a href="detailcate/2" title="">
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