@extends('adminmaster.index')
@section('title','Detail Billex')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">BillImport List</h1>
                    </div>
                    @include('adminmaster.note')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Mã CTSP</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Size</th>
                                <th>Số Lượng</th>
                                <th>Giá Nhập</th>
                                <th>Tổng Tiền</th>
                                                    
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($details as $detail)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $detail ->id_detail }}</td>
                                <td>{{ $detail ->nameproduct }}</td>
                                <td>{{ $detail ->size }}</td>
                                <td>{{ $detail ->quanlity }}</td>
                                <td>{{ $detail ->price }} </td>
                                <td> {{ $detail ->price * $detail ->quanlity }}</td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div style="text-align: center">
						{{$details->links()}}
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection