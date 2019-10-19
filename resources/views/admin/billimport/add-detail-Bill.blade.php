@extends('adminmaster.index')
@section('title','Add-Detail-Bill')
@section('content')
	<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bill Import Add</h1>
                    </div>
                    @include('adminmaster.error')
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="{{ route('billim-postadddetail') }}" method="POST">
                            @csrf
                            <input class="form-control" name="idbill" type="hidden" value="{{ $idbill }}" /> 
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="categorty" id="cate">
                                    <option value="">---Choose Category---</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Product</label>
                                <select class="form-control" name="product" id="product">
                                     <option value="">---Choose Product---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <select class="form-control" name="size" id="size">
                                     <option value="">---Choose Size---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Quantity</label>
                                <input class="form-control" name="quantity" type="number" />
                            </div>
                            
                            <button type="submit" class="btn btn-default">Add Bill</button>
                            <button type="reset" class="btn btn-default">Reset</button>
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
        $('#cate').change(function(){
            var id = $(this).val();
            $.get("admin/ajax/addbill/"+id,function(data){
                $('#product').html(data);
            });

        });
    });
    $(document).ready(function(){
        $('#product').change(function(){
            var id = $(this).val();
            $.get("admin/ajax/addbillSize/"+id,function(data2){
                $('#size').html(data2);
            });

        });
    });
</script>

@endsection