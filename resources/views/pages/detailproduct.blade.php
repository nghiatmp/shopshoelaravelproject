@extends('pagemaster.index')

@section('title','detailproduct')

@section('content')
	<div class="content mt-5">
		<div class="container">
			@include('pagemaster.error')
			@include('pagemaster.note')
			<div class="row">
				<div class="col-lg-5">
					<img id="imgproduct" src="upload/product/{{ $product->image }}" alt="" width="350px">
				</div>
				<div class="col-lg-7">
					<h2 style="color: #000">{{ $product->name }}</h2>

					<hr>
					<div style="font-size:20px;display: flex ">
						@if($product->promotion_price !=0 )
						<p class="mr-3">{{ number_format($product->unit_price ,0 ,'.' ,'.').' Đ' }}</p> 
						<p style="text-decoration: line-through; color: #bebebe">{{ number_format($product->unit_price ,0 ,'.' ,'.').' Đ' }}</p>
						@else
						<p class="mr-3">{{ number_format($product->unit_price ,0 ,'.' ,'.').' Đ' }}</p> 
						@endif
					</div>
					<hr>
					<h4>{{ $product->name }}</h4>
					<p>* Size : 
						@foreach($detailproducts as $dp)
					 		{{ $dp->size.' ' }}
					 	@endforeach
					</p>
					<p>* Giày Replica 1:1</p>
					<p>* Chất lượng vẫn là tốt nhất trên cả tuyệt vời, luôn bao so sánh và bao giá tốt nhất</p>
					<p>* Ship Cod toàn quốc, thanh toán khi nhận hàng </p>
					<p>* Hình ảnh chụp thật 100% . Hàng về sai chất lượng tặng luôn giày.</p>
					<p>* Bảo hành keo trọn đời sản phẩm</p>
					<p>* Tất cả giày đều FULLBOX + TAG + BILL + GIẤY GÓI + TÚI XÁCH HÃNG.</p>
					<p class="text-info"> <i class="fa fa-phone" aria-hidden="true"></i> Hotline : 0901088779 ( Imess/Zalo/Viber/WhatsApp )</p>
					<h5 class="mt-3"> <i class="fa fa-hand-o-right" style="font-size: 25px" aria-hidden="true"></i> NHẬN BỎ SỈ SỐ LƯỢNG LỚN TẤT CẢ CÁC MẶT HÀNG - ĐẢM BẢO GIÁ TỐT NHẤT THỊ TRƯỜNG</h5>
					<div class="mt-5">
						
						<form class="form-group" style="width:30%"  action=" {{ route('page.order') }}" method="POST">
						    @csrf  

						    <label for="">Size</label>
						    <select name="size" class="form-control">
						      	<option value="">--- Chọn Kích Cỡ ---</option>
								@foreach($detailproducts as $dp)
						      		<option value="{{ $dp->id_size }}">{{ $dp->size }}</option>
						      	@endforeach
						    </select>
						    <label for="">Số Lượng</label>
						    <input type="number" name="quantity"class="form-control" value="1">
						    <input type="hidden" name="idpro" value="{{ $product->id }}">
						    <div class="mt-5">
								<input type="submit" name="" class="btn btn-primary mb-5" value="Thêm Vào Giỏ Hàng">
								<input type="submit" name="" class="btn btn-primary" value="Đặt Hàng">
							</div>								
						</form>
						
					</div>
                    
				</div>
			</div>
	
			<div class="row mt-5 ml-3">
				  	@foreach($comments as $comment)
							<div class="col-lg-1">
								<img src="upload/user/{{ $comment->avatar }}" width="50px" style="border-radius: 50%">
							</div>
						    <div class="col-lg-11">
								<p>{{ $comment->nameUser }} <span style="color:darkgray ">{{ $comment->created_at }}</span></p>
								<p>{{ $comment->content }}</p>
							</div>

					@endforeach
					@if(Auth::check())
						<div class="col-lg-12 mt-5">
							<h4 class="">Hãy Để Lại Đánh Gía Của Bạn Về Sản Phẩm </h4>
							<form class="form-group" style="width:30%" action="{{ route('page.comment') }}" method="POST">
								@csrf
								<input type="hidden" name="idpro" value="{{ $product->id }}">
								<label for="">Tên Của Bạn</label>
								<input type="text" name="name" class="form-control">
								<label for="">Nội Dung</label>
								<textarea name="comment" class="form-control"></textarea>
								<button type="submit" class="btn btn-primary mt-3">Bình Luận</button>
							</form>
					    </div>

					@else
						<h6 class="mt-5 ml-5">Hãy đăng nhập để có thể bình luận</h6>
					@endif
			</div>
			<h3 class="mt-5 ml-3 mb-5">Sản phẩm liên quan</h3>
			<div class="row">
				@foreach($otherproduct as $other)
				<div class="col-lg-3 mb-5 mt-5 ">
					<div class="single-item">
						@if($other->promotion_price != 0)
						<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
						@endif
						<div class="single-item-header">
							<a href="detailproduct/{{ $other->id }}"><img width="270px" height="200px" src="upload/product/{{ $other->image }}" alt=""></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title mt-3" style="color: #030303">{{ $other->name }}</p>
							<p class="single-item-price">
										@if($other->promotion_price != 0)
										<span class="flash-del">{{ number_format($other->unit_price ,0 ,'.' ,'.').' Đ' }}</span>

										<span class="flash-sale">{{ number_format($other->promotion_price ,0 ,'.' ,'.').' Đ' }}</span>
										@else
												{{-- <span class="flash-sale">{{ $product->unit_price }}đ</span> --}}
												<span class="flash-sale">{{ number_format($other->unit_price ,0 ,'.' ,'.').' Đ' }}</span>
			
										@endif
									</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="cartshop.html"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 50px; margin-left: 5px"></i></a>
							<a style="background-color: #3A5C83; font-size: 18px; margin-left: 18px;" class="btn btn-success" href="detailproduct/{{ $other->id }}"> Details <i style="font-size: 20px; margin-left: 10px;margin-top:6px" class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							<div class="clearfix"></div>
						</div>
					
					</div>
				</div>
				
				@endforeach
			</div>
		</div>
	</div>
@endsection