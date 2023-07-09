@extends('admin.layouts.master')
@section('css')
    <style>
        .bg-primary-gradient,
        .bg-danger-gradient,
        .bg-success-gradient,
        .bg-warning-gradient {
            height: 106px !important;
        }
    </style>
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"></h2>
                <p class="mg-b-0"> </p>
            </div>
        </div>
        {{-- <div class="main-dashboard-header-right">
						<div>
							<label class="tx-13">Customer Ratings</label>
							<div class="main-star">
								<i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star active"></i> <i class="typcn typcn-star"></i> <span>(14,873)</span>
							</div>
						</div>
						<div>
							<label class="tx-13">Online Sales</label>
							<h5>563,275</h5>
						</div>
						<div>
							<label class="tx-13">Offline Sales</label>
							<h5>783,675</h5>
						</div>
					</div> --}}
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">عدد الاخبار </h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $posts }}</h4>
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                {{-- <span class="text-white op-7"> +427</span> --}}
                            </span>
                        </div>
                    </div>
                </div>
                {{-- <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span> --}}
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">اخبارالبطولات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $tournament_news }}</h4>
                                {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                {{-- <span class="text-white op-7"> -23.09%</span> --}}
                            </span>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1"></span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h1 class="mb-3 tx-12 text-white">اخبار الرياضة النسائية</h1>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $sports_woman }}</h4>
                                {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-up text-white"></i>
                                {{-- <span class="text-white op-7"> 52.09%</span> --}}
                            </span>
                        </div>
                    </div>
                </div>
                {{-- <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span> --}}
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الاقسام</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ $categories }}</h4>
                                {{-- <p class="mb-0 tx-12 text-white op-7">Compared to last week</p> --}}
                            </div>
                            <span class="float-right my-auto mr-auto">
                                <i class="fas fa-arrow-circle-down text-white"></i>
                                {{-- <span class="text-white op-7"> -152.3</span> --}}
                            </span>
                        </div>
                    </div>
                </div>
                {{-- <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span> --}}
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row">

        {{-- <div class="col-md-6">
            <div class="d-flex justify-content-between">

                <div class="chart">

                    <div id="pie_chart">

                    </div>
                </div>
            </div>

        </div> --}}
        <div class="col-md-8">
            <div class="chart">
                <canvas id="barChart"></canvas>
            </div>
        </div>

    </div>
    <div class="row row-sm">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">

                </div>

            </div>

        </div>
        <!-- row closed -->

        <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"
        integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pie-chart/1.0.0/pie-chart.min.js"
        integrity="sha512-RloOYfWgCwxbdExraq88FwUdFA/RQSuLJADn72+kUcKraQGrhn43BfDruK5dxKjqDGhNDhkE3h1bSoqdXxbGHg=="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var sucess = <?php echo json_encode($sucess); ?>;
            var options = {
                chart: {
                    renderTo: 'pie_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'الاخبار'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage}%</b>',
                    percentageDecimals: 1
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>' + this.point.name + '</b>: ' + this.percentage + ' %';
                            }
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Success'
                }]
            }
            myarray = [];
            $.each(sucess, function(index, val) {
                myarray[index] = [val.status, val.count];
            });
            options.series[0].data = myarray;
            chart = new Highcharts.Chart(options);

        });
    </script>


    <script>
        $(document).ready(function() {

            var dates = <?php echo json_encode($dates); ?>;
            var barcanvas = $("#barChart");
            var barchart = new Chart(barcanvas, {

                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ],
                    datasets: [{
                        label: 'New works Growth 2020',
                        data: dates,
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'indigo',
                            'violet', 'puruple', 'pink', 'sliver', 'gold', 'brown'
                        ]
                    }]

                },
                option: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });

        })
    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
@endpush
