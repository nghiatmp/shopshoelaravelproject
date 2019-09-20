@extends('adminmaster.index')
@section('title')
	Add Category
@endsection
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Update Category
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/category/edit/{{$cate->id}}" method="POST">
                            @include('adminmaster.error')
                            @include('adminmaster.note')
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" name="parent">
                                    @if($cate->id_parent == 0)
                                        <option value="0" selected="">Parent</option>
                                        @foreach($cateparent as $catepa)
                                            <option value="{{$catepa->id}}">{{$catepa->name}}</option>
                                        @endforeach
                                    @else
                                        <option value="0">Parent</option>
                                        @foreach($cateparent as $catepa)
                                            <option value="{{$catepa->id}}"
                                                @if($cate->id_parent == $catepa->id)
                                                selected="" 
                                                @endif
                                                >{{$catepa->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="catename" placeholder="Please Enter Category Name" value="{{$cate->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Category Description</label>
                                <textarea class="form-control" rows="3" name="description">{{$cate->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Category Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" @if($cate->status == 1) checked="" @endif type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="0" @if($cate->status == 0) checked="" @endif type="radio">Invisible
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                            @csrf
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection

