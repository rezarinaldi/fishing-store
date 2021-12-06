@extends('layouts.admin')

@section('title')
Admin | Dashbord {{ config('settings.name') }}
@endsection

@section('sidebar')
@endsection

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Hai! {{ Auth::user()->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Alat Pancing</p>
                                <p class="fs-30 mb-2">{{ $item['item'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Jumlah Kategori</p>
                                <p class="fs-30 mb-2">{{ $category['category'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Banyak Order</p>
                                <p class="fs-30 mb-2">{{ $order['order'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <p class="card-title">Sales Report</p>
                            <!-- <a href="#" class="text-info">View all</a> -->
                        </div>
                        <div id="linechart" style="width: 1000px; height: 800px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- <script src="{{-- asset('ap/js/google-charts.js') --}}"></script> -->
<script type="text/javascript">
        
    var analytics = <?php echo $quantity; ?>;
    console.log(analytics);
        google.charts.load('current', {
            'packages': ['corechart']
        });
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(lineChart);

    function lineChart() {
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
            title: "Total Sales",
            curveType: 'function',
            legend: {
                position: 'bottom'
            }
        };
        var chart = new google.visualization.LineChart(document.getElementById('linechart'));
        chart.draw(data, options);
    }
</script>
@endsection