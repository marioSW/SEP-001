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

                <li>
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
                        <li class="active"><a href="{{ url('oic/casefile_search') }}"><i class="fa fa-circle-o"></i> Search Case File</a></li>
                        <li ><a href="data.html"><i class="fa fa-circle-o"></i> View Case File</a></li>
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

                <li class="treeview  active">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Additional Information</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li ><a href="{{ url('oic/gcr') }}"><i class="fa fa-circle-o"></i> View GCR</a></li>
                        <li class="active"><a href="{{ url('oic/crime') }}"><i class="fa fa-circle-o"></i> View Crimes</a></li>
                        <li ><a href="{{ url('oic/person') }}"><i class="fa fa-circle-o"></i> View Persons</a></li>

                    </ul>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside> <!-- /.main-sidebar -->


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Crime
                <small>View</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Additional</li>
                <li class="active">crime</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">View All Crimes</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Case File Number</th>
                                    <th>Police Station</th>
                                    <th>Crime Date</th>
                                    <th>Crime Number</th>
                                    <th>Crime place</th>
                                    <th>Crime Address</th>
                                    <th>Crime Time</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($crime as $crime)
                                    <tr>
                                        <td>{{$crime->case_file_no}}</td>
                                        <td>{{$crime->case_police_station}}</td>
                                        <td>{{$crime->crime_date}}</td>
                                        <td>{{$crime->crime_list_no}}</td>
                                        <td>{{$crime->crime_place_name}}</td>
                                        <td>{{$crime->crime_place_add}}</td>
                                        <td>{{$crime->crime_time}}</td>
                                        <td><input type="submit" name="submit1" value="Full Info" /></td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection