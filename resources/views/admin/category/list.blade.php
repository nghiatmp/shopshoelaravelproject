@extends('adminmaster.index')
@section('title')
    List Category
@endsection
@section('content')
       
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"> List Category
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name Category</th>
                            <th>Description</th>
                            <th>Parent</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cate as $cat)
                        <tr class="even gradeC" align="center">
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->description}}</td>
                            <td>
                                 @if($cat->id_parent == 0)
                                    Parent
                                @else
                                    @foreach($cate as $ca)
                                        @if($cat->id_parent == $ca->id)
                                            {{$ca->name}}
                                        @endif
                                     @endforeach
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/edit/{{$cat->id}}">Edit</a></td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> Delete</a></td>
                            
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
        

   
