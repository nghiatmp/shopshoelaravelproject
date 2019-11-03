@extends('adminmaster.index')
@section('title','Bill-Year')

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
        		<div class="row mt-5" style="margin-top: 50px">
        			{{-- <div class="col-lg-10 col-lg-offset-1 mt-5">
        		        <div id="container" style="height: 300px">
        					<input id="year1" type="hidden" name="" value="{{$billyear}}">
        				</div>
        			</div>
                   
                    <div class="col-lg-10 col-lg-offset-1 mt-5" style="margin-top:50px; border-top: 1px solid gray">
                        <div id="container-product" style="height: 300px; margin-top: 50px">
                            <input id="product-year" type="hidden" name="" value="{{$product}}">
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div id="container" style="height: 300px;margin-top: 50px">
                            <input id="year1" type="hidden" name="" value="{{$billyear}}">
                        </div>
                    </div>
                   
                    <div class="col-lg-6">
                        <div id="container-product" style="height: 300px; margin-top: 50px">
                            <input id="product-year" type="hidden" name="" value="{{$product}}">
                        </div>
                    </div>

                    <div class="col-lg-10 col-lg-offset-1 mt-5" style=" margin-top: 50px">
                        <div id="categoryproduct" style="height: 300px">
                            <input id="cateproduct" type="hidden" name="" value="{{$cateproduct}}">
                        </div>
                    </div>
        		</div>
            </div>
        </div>

@endsection

@section('script')
 <script src="http://code.highcharts.com/highcharts.js"></script>
 <script>
 	
 	document.addEventListener('DOMContentLoaded', function (){
 		var year = $('#year1').val();

 		var year1 = JSON.parse(year);
 		
 		var listyear = [];
 		var listSP = [];
       
 		year1.forEach(function(element){
 			listyear.push(element.Nam);
 		 	listSP.push(element.SoHd);
 		});


 		Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Bill In Year'
        },
        xAxis: {
            categories: listyear
        },
        yAxis: {
            title: {
                text: 'Free Style'
            }
        },
        series: [
        {
            name: 'Biểu đồ hóa đơn trong các năm',
            data: listSP,
            color:'#4A2BEF',
        }],
    });
    });

    document.addEventListener('DOMContentLoaded', function (){
        var product = $('#product-year').val();

        var product1 = JSON.parse(product);
      
        var listyear = [];
        var listproduct = [];
        
        product1.forEach(function(element){
            listyear.push(element.Nam);
            listproduct.push(Number(element.SL));
        });
        
        Highcharts.chart('container-product', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Product In Year'
        },
        xAxis: {
            categories: listyear
        },
        yAxis: {
            title: {
                text: 'Free Stylee'
            }
        },
        series: [
        {
            name: 'Biểu đồ số sản phẩm trong các năm',
            data: listproduct,
            color:'#4A2BEF',
        }],
    });
    });
    document.addEventListener('DOMContentLoaded', function (){
        var cate = $('#cateproduct').val();

        var cate = JSON.parse(cate);
        
        var SL = [];
        var chartData = [];
       
        cate.forEach(function(element){
            var ele = {name : element.namecate, y : parseFloat(element.SL) };
                chartData.push(ele);
        });
        console.log(chartData);


        Highcharts.chart('categoryproduct', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Category Product '
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: chartData
            }]
        });
    }); 
    
 </script>
@endsection