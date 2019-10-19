@extends('adminmaster.index')
@section('title','Add Bill Import')
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
                        <form action="{{ route('billim-postadd') }}" method="POST">
                            @csrf
                             <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control" name="supplier">
                                    <option value="">---Choose Supplier---</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Payment</label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="1" checked="" type="radio">ATM
                                </label>
                                <label class="radio-inline">
                                    <input name="rdoStatus" value="2" type="radio">Payment
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>

                            <button type="submit" class="btn btn-default">Create Bill</button>
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