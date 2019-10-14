@extends('adminmaster.index')
@section('title','approved order')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">BillExport List</h1>
                    </div>
                    @include('adminmaster.note')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Khách Hàng</th>
                                <th>Ngày Tạo Hóa Đơn</th>
                                <th>Tổng Tiền</th>
                                <th>Duyệt Đơn Hàng</th>
                                <th>Hủy Đơn Hàng</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($billexs as $billex)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $billex ->id }}</td>
                                <td>{{ $billex ->nameCusromer }}</td>
                                <td>{{ $billex ->created_at }}</td>
                                <td>{{ $billex ->totalmoney }} </td>
                                <td>
                                	<button type="submit" class="btn btn-primary approved">Duyệt Đơn Hàng</button>
                                    <input type="hidden" class="id" value="{{ $billex ->id }}">

                                </td>
                                <td>
                                    <button type="submit" class="btn btn-danger">Hủy Đơn Hàng</button>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div style="text-align: center">
						{{$billexs->links()}}
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection

@section('script')
    <script type="text/javascript">
       $(document).ready(function(){
        $('.approved').click(function(){
            var id = $(this).parent().find('.id').val();
            $.get("admin/ajax/approved/"+id,function(data){
                // $('#child').html(data);
                if(data == 'ok'){
                    window.location = 'admin/billex/approved'
                }
            });

        });
    });
    </script>
@endsection