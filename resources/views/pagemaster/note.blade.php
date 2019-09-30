@if(session('thongbao'))
	<div class="alert alert-success">
		{{session('thongbao')}}
	</div>
@endif