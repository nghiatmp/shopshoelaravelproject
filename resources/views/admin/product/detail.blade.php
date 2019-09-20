@extends('adminmaster.index')
@section('title')
   Detail List Product
@endsection
@section('content')
       
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> Detail Product List
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name Product</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $pr)
                        <tr class="even gradeC" align="center">
                            <td>{{$pr->id}}</td>
                            <td>{{$pr->name}}</td>
                            <td>{{$pr->size}}</td>
                            <td>{{$pr->quanlity}}</td>
                            </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
        

   
