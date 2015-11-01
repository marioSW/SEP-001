@extends('OIC.header_footer')
@section('content')


    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="\images\AdminLTE-OIC\user2-160x160.jpg" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li class="active">
                    <a href="{{ url('oic/dashboard') }}">
                        <i class="fa fa-th"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Case File</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="{{ url('oic/casefile_search') }}"><i class="fa fa-circle-o"></i> Search Case File</a></li>
                        <li ><a href="data.html"><i class="fa fa-circle-o"></i> View Case File</a></li>
                        <li ><a href="{{ url('oic/pending_case_files') }}"><i class="fa fa-circle-o"></i> Update Status of Case File</a></li>

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span>Request</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class=""><a href="index.html"><i class="fa fa-circle-o"></i> View Request</a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i>  Accept Request</a></li>
                    </ul>
                </li>

                <li>
                    <a href="">
                        <i class="fa fa-th"></i> <span>Report</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Additional Information</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('oic/gcr') }}"><i class="fa fa-circle-o"></i> View GCR</a></li>
                        <li><a href="{{ url('oic/crime') }}"><i class="fa fa-circle-o"></i> View Crimes</a></li>
                        <li><a href="{{ url('oic/person') }}"><i class="fa fa-circle-o"></i> View Persons</a></li>

                    </ul>
                </li>

                <li>
                    <a href="{{ url('oic/makecriminal') }}">
                        <i class="fa fa-th"></i> <span>CrimeOIC</span>
                    </a>
                </li>



            </ul>
        </section>
        <!-- /.sidebar -->
    </aside> <!-- /.main-sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Dashboard
                <small>O.I.C</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Case File</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>53</h3><!-- <sup style="font-size: 20px">%</sup> -->
                            <p>Report</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Requests</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $count }}</h3>
                            <p>Emails</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="https://mail.google.com" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

            </div><!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->

                <section class="col-md-3 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->


                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">

                            <li class="pull-left header"><i class="fa fa-inbox"></i> Today Crimes </li>
                        </ul>
                        <div class="tab-content">

                            <label>List of today reported casefiles</label>
                            <br>
                            @foreach ( $today_reported as $reported_files)
                                <div class="row">
                                    <div class="col-xs-6 col-md-3" align="center">
                                        <a href="#" class="thumbnail" align="center">
                                            <img src="\images\AdminLTE-OIC\Case-Icon.png"  width="50px" height="50px" ><label >{{ $reported_files->designated_file_no }}</label>
                                        </a>
                                    </div>
                                </div>
                                <br>

                            @endforeach

                            <label>List of today solved casefiles</label>
                            <br>
                            @foreach ( $today_solved as $solved_files)
                                <div class="row">
                                    <div class="col-xs-6 col-md-3" align="center">
                                        <a href="#" class="thumbnail" align="center">
                                            <img src="\images\AdminLTE-OIC\Case-Icon.png"  width="50px" height="50px" ><label >{{ $solved_files->designated_file_no }}</label>
                                        </a>
                                    </div>

                                </div>
                                <br>

                            @endforeach



                        </div>

                    </div><!-- /.nav-tabs-custom -->



                </section><!-- /.Left col -->
                <section class="col-md-9 connectedSortable"><!-- Right col -->



                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">
                            <li class="pull-left header"><i class="fa fa-inbox"></i> Last Year Crimes </li>
                        </ul>
                        <div class="tab-content">

                            <div id="chart1">
                                <svg></svg>
                            </div>
                        </div>

                    </div>

                </section><!-- /.Right col -->

                <section class="col-lg-4 connectedSortable"><!-- Right col -->

                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">

                            <li class="pull-left header"><i class="fa fa-inbox"></i> Current Year Crimes </li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->

                            <svg id="test2" class="mypiechart"></svg>


                        </div>

                    </div><!-- /.nav-tabs-custom -->



                </section><!-- /.Right col -->


                <section class="col-lg-4 col-md-offset-1 connectedSortable"><!-- Right col -->
                    <div class="nav-tabs-custom">
                        <!-- Tabs within a box -->
                        <ul class="nav nav-tabs pull-right">

                            <li class="pull-left header"><i class="fa fa-inbox"></i> Current Month Crimes</li>
                        </ul>
                        <div class="tab-content no-padding">
                            <!-- Morris chart - Sales -->

                            <svg id="test1" class="mypiechart"></svg>
                        </div>

                    </div><!-- /.nav-tabs-custom -->




                </section><!-- /.Right col -->






                <!-- right col (We are only adding the ID to make the widgets sortable)-->
            </div><!-- /.row (main row) -->


        </section><!-- /.content -->

    </div><!-- /.content-wrapper -->


    <script>

        var testdata2 = [
            {key: "Reported", y: {{ $reported_y }}},
            {key: "Solved", y: {{ $solved_y }}},
            {key: "Pending", y: {{ $pending_y }}},

        ];

        var height = 350;
        var width = 350;

        var chart1;
        nv.addGraph(function() {
            var chart1 = nv.models.pieChart()
                    .x(function(d) { return d.key })
                    .y(function(d) { return d.y })
                    .donut(true)
                    .width(width)
                    .height(height)
                    .padAngle(.08)
                    .cornerRadius(5)
                    .id('donut1'); // allow custom CSS for this one svg

            chart1.title("100%");
            chart1.pie.donutLabelsOutside(true).donut(true);

            d3.select("#test2")
                    .datum(testdata2)
                    .transition().duration(1200)
                    .call(chart1);

            //nv.utils.windowResize(chart1.update);

            return chart1;

        });



    </script>


    <script>

        var testdata1 = [
            {key: "Reported", y: {{ $reported_m }}},
            {key: "Solved", y: {{ $solved_m }}},
            {key: "Pending", y: {{ $pending_m }}},

        ];

        var height = 350;
        var width = 350;

        var chart1;
        nv.addGraph(function() {
            var chart1 = nv.models.pieChart()
                    .x(function(d) { return d.key })
                    .y(function(d) { return d.y })
                    .donut(true)
                    .width(width)
                    .height(height)
                    .padAngle(.08)
                    .cornerRadius(5)
                    .id('donut1'); // allow custom CSS for this one svg

            chart1.title("100%");
            chart1.pie.donutLabelsOutside(true).donut(true);

            d3.select("#test1")
                    .datum(testdata1)
                    .transition().duration(1200)
                    .call(chart1);

            //nv.utils.windowResize(chart1.update);

            return chart1;

        });



    </script>
    <script>

        historicalBarChart = [
            {
                key: "Cumulative Return",
                values: [
                    {
                        "label" : "January" ,
                        "value" : {{ $rep_jan }}
                    } ,
                    {
                        "label" : "February" ,
                        "value" : {{ $rep_feb }}
                    } ,
                    {
                        "label" : "March" ,
                        "value" : {{ $rep_mar }}
                    } ,
                    {
                        "label" : "April" ,
                        "value" : {{ $rep_apr }}
                    } ,
                    {
                        "label" : "May" ,
                        "value" : {{ $rep_may }}
                    } ,
                    {
                        "label" : "June" ,
                        "value" : {{ $rep_jun }}
                    } ,
                    {
                        "label" : "July" ,
                        "value" : {{ $rep_jul }}
                    } ,
                    {
                        "label" : "August" ,
                        "value" : {{ $rep_aug }}
                    },
                    {
                        "label" : "September" ,
                        "value" : {{ $rep_sep }}
                    },
                    {
                        "label" : "October" ,
                        "value" : {{ $rep_oct }}
                    },
                    {
                        "label" : "November" ,
                        "value" : {{ $rep_nov }}
                    },
                    {
                        "label" : "December" ,
                        "value" : {{ $rep_dec }}
                    }
                ]
            }
        ];

        nv.addGraph(function() {
            var chart = nv.models.discreteBarChart()
                            .x(function(d) { return d.label })
                            .y(function(d) { return d.value })
                            .staggerLabels(true)
                        //.staggerLabels(historicalBarChart[0].values.length > 8)
                            .showValues(true)
                            .duration(250)
                    ;

            d3.select('#chart1 svg')
                    .datum(historicalBarChart)
                    .call(chart);

            nv.utils.windowResize(chart.update);
            return chart;
        });


    </script>

@endsection