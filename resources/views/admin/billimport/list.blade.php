@extends('adminmaster.index')
@section('title','list Billex')
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
                                <th>Mã Hóa Đơn</th>
                                <th>Tên Nhà Cung Cấp</th>
                                <th>Ngày Tạo Hóa Đơn</th>
                                <th>Nhân Viên Tạo Hóa Đơn</th>
                                <th>Tổng Tiền</th>
                                <th>Chi Tiết Hóa Đơn</th>
                                <th>Thêm Chi Tiết Hóa Đơn</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($billimports as $billimport)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $billimport ->id }}</td>
                                <td>{{ $billimport ->namesupplier }}</td>
                                <td>{{ $billimport ->created_at }}</td>
                                <td>{{ $billimport ->namestaff }}</td>
                                <td>{{ number_format($billimport ->totalmoney ,0 ,'.' ,'.').' Đ' }} </td>
                                <td>
                                	<a href="admin/billim/detail-import/{{ $billimport->id }}" title="">Chi Tiết Hóa Đơn</a>
                                </td>
                                <td>
                                     <a href="admin/billim/add-detail-bill/{{$billimport->id }}" title="" class="btn btn-primary">Thêm Chi Tiết Hóa Đơn</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div style="text-align: center">
						{{$billimports->links()}}
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection