<div class="menu">
		<div class="container">
			<ul>
				<li>
					<a href="{{ route('page.index') }}" title="">Trang Chủ</a>
				</li>
				<li>
					<a href="{{ route('page.detailcate',['name'=>'adidas','id'=>1]) }}" title="">Sản Phẩm</a>
					<ul class="dropdown">
						@foreach($cates as $cate)
						<li>
							{{-- <a href="/detailcate/{{ $cate->id }}" title="">{{ $cate->name }}</a> --}}
							<a href="{{ route('page.detailcate',['name'=>$cate->name,'id'=>$cate->id]) }}" title="">{{ $cate->name }}</a>
							<ul class="dropdown">
								@foreach($catechild as $child)
										@if($child->id_parent == $cate->id)
										<li>
											{{-- <a href="/detailcate/{{ $child->id }}" title="">{{ $child->name }}</a> --}}
											<a href="{{ route('page.detailcate',['name'=>$child->name,'id'=>$child->id]) }}" title="">{{ $child->name }}</a>
										</li>
										@endif
								@endforeach
							</ul>
						</li>
						@endforeach
						
					</ul>
				</li>
				<li>
					<a href="" title="">Giới Thiệu</a>
				</li>
				<li>
					<a href="{{ route('page.contact') }}" title="">Liên Hệ</a>
				</li>
			</ul>
		</div>
	</div>