@include('pagemaster.header')
<body>
	<header id="header" class="">
		<div class="container">
			<div class="pull-left auto-width-left">
				<ul class="top-menu menu-beta l-inline"> 
					<li>
						<a href="" title=""><i class="fa fa-home" aria-hidden="true"></i> Số 3-Cầu Giấy-Hà Nội</a>
					</li>
					<li>
						<a href="" title=""><i class="fa fa-phone-square" aria-hidden="true"></i> 0355294422</a>
					</li>
				</ul>
			</div>
			@if(Auth::check())
			<div class="pull-right auto-width-right">
				
				<ul>
					<li>
						
						<div class="dropdown">
						  
						     <a href="" title="" class="dropdown-toggle" data-toggle="dropdown"	><i class="fa fa-user" aria-hidden="true" ></i> {{ Auth::user()->fullname }}</a>
					

						    <div class="dropdown-menu">
							      <a class="dropdown-item" href="#">Sửa Thông Tin</a>
							      <a class="dropdown-item" href="{{ route('page.inforoder') }}">Theo Dõi Đơn Hàng</a>
							</div>
						  </div>
					</li>
					
					<li>
						<a  href="{{ route('page.logout') }}" >Đăng Xuất</a>
					</li>
					
					
				</ul>
				
			</div>

			@else
			<div class="pull-right auto-width-right">
				
				<ul>
					<li>
					<a  href="{{ route('page.getlogin') }}">Đăng Nhập</a>
					</li>
					<li>
						<a href="{{ route('page.getregister') }}">Đăng Kí</a>
					</li>
					
				</ul>
				
			</div>
			@endif
			<div class="clearfix"></div>
		</div>
	</header><!-- /header -->
	<div class="container logo">
			<div class="pull-left auto-width-left" style="margin-top: 20px">
				<img width="280" src="frontend/images/slide/logo.png " alt="">
			</div>
			<div class="pull-right auto-width-right right">
				<div class="find" style="display: flex">
					<input type="text" name="" class="form-control" placeholder="Nhập từ khóa..">
					<button style="margin-left: 5px" type="submit"><i  class="fa fa-search" aria-hidden="true"></i></button>
				</div>
					
				<div class="beta-select cart">
					<a href="{{ route('page.cartshop') }}" title=""><i style="font-size: 30px; margin-right: 5px" class="fa fa-shopping-cart"></i> Giỏ hàng </a>
				</div>

			</div>
			<div class="clearfix"></div>
	</div>
	@include('pagemaster.menu')
	

		@yield('content')

	@include('pagemaster.footer')
	<!-- modal login -->
		
	<!-- end modalogin -->
	@include('pagemaster.auth')


	
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}
<!-- <script type="text/javascript" src="CSS/css/bootstrap.min.js"></script>
<script type="text/javascript" src="CSS/css/jquery-3.3.1.slim.min.js"></script>
<script type="text/javascript" src="CSS/css/popper.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@yield('script')
<script type="text/javascript">
  	// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {scrollFunction()};

		function scrollFunction() {
		  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		    document.getElementById("myBtn").style.display = "block";
		  } else {
		    document.getElementById("myBtn").style.display = "none";
		  }
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
		  document.body.scrollTop = 0; // For Safari
		  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		}
  </script>
  <script type="text/javascript">
  	$('.carousel').carousel({
  		interval: 200;
	})
  </script>
  <script type="text/javascript">
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>200){
			$(".menu").addClass('fixNav')
			}else{
				$(".menu").removeClass('fixNav')
			}}
		)
	})
  </script>
 
</body>
</html>