@extends('pagemaster.index')
@section('title','product')
@section('content')
<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 mt-5">
					<div class="search">
						<input type="text" class="form-control" name="" placeholder="Search....">
						<button type="submit"><i style="font-size: 25px" class="fa fa-search" aria-hidden="true"></i></button>
					</div>
					<div class="cate">
						<div style="margin-bottom: 20px">
							<h3>Mẫu Giày</h3>
						</div>
						<ul>
							@foreach($catechild as $child)
								<li>
									<a href="{{ route('page.detailcate',['name'=>$child->name,'id'=>$child->id]) }}" title="">{{"Giày " .$child->name }}  <i class="fa fa-angle-right" aria-hidden="true"></i></a>
								</li>
							@endforeach
						</ul>
						
					</div>
					
				</div>
				<div class="col-lg-9 mt-5">
					<div class="">
						<h3> Giày {{ $categoryname}}</h3>
					</div>
					<div class="" style="margin-top: 20px; margin-bottom: 20px">
						<p>Có {{  $products->total()}} sản phẩm </p>
					</div>
					<div class="row">
						@foreach($products as $product)
							<div class="col-lg-4 mb-5 mt-5 product">
								@if($product->promotion_price != 0)
								<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
								@endif
								<div class="single-item-header">
									<a href="{{ route('page.detailproduct',['slug'=>$product->slug,'id'=> $product->id ]) }}"><img width="270px" height="200px" src="upload/product/{{ $product->image }}" alt=""></a>
								</div>
								<div class="single-item-body">
									<h4 class="single-item-title mt-3" style="color: #030303">{{ $product->name }}</h4>
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
								{{-- <div class="single-item-caption">
									<a class="add-to-cart pull-left" href="{{ route('page.detailproduct',['slug'=>$product->slug,'id'=> $product->id ]) }}"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 50px; margin-left: 5px"></i></a>
									<a style="background-color: #3A5C83; font-size: 18px; margin-left: 18px;" class="btn btn-success" href="{{ route('page.detailproduct',['slug'=>$product->slug,'id'=> $product->id ]) }}"> Details <i style="font-size: 20px; margin-left: 10px;margin-top:6px" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
									<div class="clearfix"></div>
								</div> --}}
							
							</div>
						@endforeach
						
					</div>
						<div style="width: 200px; margin:auto">
							{{ $products->links() }}
						</div>
						

					</div>

					
									
						
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

