@extends('adminmaster.index')
@section('title')
    List Product
@endsection
@section('content')
       
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Product List
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @include('adminmaster.note');
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th style="width: 3%">ID</th>
                            <th style="width: 25%">Name Product</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Price Sale</th>
                            <th>Category</th>
                            <th>Shoe brand</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $pr)
                        <tr class="even gradeC" align="center">
                            <td>{{$pr->id}}</td>
                            <td>{{$pr->name}}</td>
                            <td>
                               <img src="upload/product/{{$pr->image}}" alt="" width="150px">
                            </td>
                            <td>{{$pr->unit_price}}</td>
                            <td>
                                @if($pr->promotion_price == 0)
                                {{'Không Sale'}}
                                @else
                                {{$pr->promotion_price}}
                                @endif
                                 
                            </td>
                            <td>{{$pr->catename}}</td>
                            <td>
                               
                                @if($pr->id_parent == 0)
                                    {{$pr->catename}}
                                @else
                                    @foreach($cate as $cat)
                                        @if($pr->id_parent == $cat->id)
                                            {{$cat->name}}
                                        @endif
                                     @endforeach
                                @endif
                               
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/detail/{{$pr->id}}">Detail</a></td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/edit/{{$pr->id}}">Edit</a></td>
                           
                             <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/delete/{{$pr->id}}" onclick="return confirm('Are you sure ??')"> Delete</a></td>
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
        

   
