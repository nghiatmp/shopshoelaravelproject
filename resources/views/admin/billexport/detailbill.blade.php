@extends('adminmaster.index')
@section('title','list DetailBillex')
@section('content')
	 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Detail BillExport</h1>
                    </div>
                    @include('adminmaster.note')
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr align="center">
                                <th>Tên Sản Phẩm</th>
                                <th>Size</th>
                                <th>Số Lượng</th>
                                <th>Giá Tiền</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($detailbillexs as $detailbillex)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $detailbillex ->name }}</td>
                                <td>{{ $detailbillex ->size }}</td>
                                <td>{{ $detailbillex ->quanlity }}</td>
                                <td>{{ $detailbillex ->price }}</td>
                                <td>{{ $detailbillex ->price*$detailbillex ->quanlity }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div style="text-align: center">
						{{$detailbillexs->links()}}
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection