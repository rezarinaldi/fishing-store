@extends('layouts.admin')

@section('title')
Admin | Dashbord DK Pancing
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
                        <!-- <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p> -->
                        <!-- <div class="google-chart-container d-flex align-items-center justify-content-center h-100">
                            <div id="barchart_material" style="display: block; height: 677px; width: 1354px;" width="1218" height="609" class="google-charts"></div>
                        </div> -->
                        <div class="container">
                            <div id="barchart_material" style="width: 900px; height: 500px"></div>
                        </div>

                        <!-- <canvas id="barChart"></canvas> -->
                        <!-- <canvas id="bar-chart"></canvas> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="{{ asset('ap/js/google-charts.js') }}"></script>
<script type="text/javascript">
    var analytics = <?php echo $quantity; ?>
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {
            title: "Total Sales",
            width: 600,
            height: 400,
        };
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
@endsection