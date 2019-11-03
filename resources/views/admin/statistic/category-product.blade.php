@extends('adminmaster.index')
@section('title','Category')

@section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
        		<div class="row mt-5" style="margin-top: 50px">
        			<div class="col-lg-10 col-lg-offset-1 mt-5">
        		        <div id="container" style="height: 300px">
        					<input id="money" type="hidden" name="" value="{{$money}}">
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
        var money = $('#money').val();

        var money = JSON.parse(money);

        var totalmoney = [];
        var listmonth = [];
        
        
        money.forEach(function(element){
            totalmoney.push(Number(element.TotalMoney));
            listmonth.push(element.month);
        });
        console.log(listmonth);
        
        Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Revenue One Month'
        },
        xAxis: {
            categories: listmonth
        },
        yAxis: {
            title: {
                text: 'Free Stylee'
            }
        },
        series: [
        {
            name: 'Biểu đồ doanh thu theo tháng',
            data: totalmoney,
            color:'#4A2BEF',
        }],
    });
    });
    
 </script>
@endsection