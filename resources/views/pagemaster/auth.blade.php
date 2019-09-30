<div class="modal fade" id="ModalLogIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Đăng Nhập</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
			@include('pagemaster.error')
	        <form action="{{ route('page.postlogin') }}" method="post">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email</label>
				    <input type="email" class="form-control" name="email" placeholder="Enter email">
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Mật Khẩu</label>
				    <input type="password" class="form-control" name="pass" placeholder="Password">
				  </div>
		
				  <button type="submit" class="btn btn-primary">Đăng Nhập</button>
				  @csrf
			</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>


<!-- modal dang ki -->
	<div class="modal fade" id="ModalRester" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Đăng Kí</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Họ Và Tên</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email</label>
						    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Mật Khẩu</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						  </div>
						   <div class="form-group">
						    <label for="exampleInputPassword1">Nhập Lại Mật Khẩu</label>
						    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Giới Tính</label>
						    <input type="radio" name="gender" value="0">   Nam 
						    <input type="radio" name="gender" value="1">   Nữ 

						  </div>
						  
						  <button type="submit" class="btn btn-primary">Đăng Kí</button>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>
	<!-- end modal dang ki -->