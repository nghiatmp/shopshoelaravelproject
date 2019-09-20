@extends('adminmaster.index')
@section('title')
    Edit Product
@endsection
@section('content')
     <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product Edit
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @include('adminmaster.error')
                        @include('adminmaster.note')
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
                        @if(session('loi1'))
                            <div class="alert alert-danger">
                                {{session('loi1')}}
                            </div>
                        @endif
                        <form action="admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        @if($product->id_parent == 0)
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" class="parent" id="parent" name="parent">
                                    @foreach($cateparent as $cate)
                                       
                                        <option value="{{$cate->id}}"
                                         @if($product->id_cate == $cate->id)
                                         selected="" 
                                          @endif       
                                        >{{$cate->name}}</option>
                                       
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Child</label>
                                <select class="form-control" id="child" name="child">
                                    <option value="" selected=""></option>
                                     @foreach($catechild as $catechild)
                                        <option value="{{$catechild->id}}" disabled="">{{$catechild->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="form-group">
                                <label>Category Parent</label>
                                <select class="form-control" class="parent" id="parent" name="parent">
                                    @foreach($cateparent as $cate)
                                       
                                        <option value="{{$cate->id}}"
                                      
                                            @if($product->id_parent == $cate->id)
                                            selected="" 
                                            @endif  
                                              
                                        >{{$cate->name}}</option>
                                       
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Category Child</label>
                                <select class="form-control" id="child" name="child">
                                    <option value="" selected=""></option>}
                                     @foreach($catechild as $catechild)
                                        <option value="{{$catechild->id}}"
                                        @if($product->id_cate == $catechild->id)
                                         selected="" 
                                          @endif   
                                        >{{$catechild->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="namepro" placeholder="Please Enter Username" value={{$product->name}}>
                            </div>
                            <div class="form-group">
                                <label>Unit_Price</label>
                                <input class="form-control" name="unitprice" placeholder="Please Enter Password" value={{$product->unit_price}}>
                            </div>
                             <div class="form-group">
                                <label>Promotion_Price</label>
                                <input class="form-control" name="proprice" placeholder="Please Enter Password" value={{$product->promotion_price}}>
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" rows="3" name="description">{{$product->name}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <img src="upload/product/{{$product->image}}" alt="" width="150px">
                            </div>
                            <div class="form-group">
                                <label>Images New</label>
                                <input type="file" name="images">
                            </div>
                            <div class="form-group">
                                <label>Product Status</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" @if($product->status ==1 ) checked="" @endif  type="radio">Visible
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="0" @if($product->status ==0 ) checked="" @endif  type="radio">Invisible
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Product Update</button>
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
@section('script')
<script>
    $(document).ready(function(){
        $('#parent').change(function(){
            var id = $(this).val();
            $.get("admin/ajax/type/"+id,function(data){
                $('#child').html(data);
            });

        });
    });
</script>
@endsection