<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Police Crime Branch</title>
<!--STYLESHEETS-->
    <link type="text/css" rel="stylesheet" href="{{asset('./css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('./fonts/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('./css/sb-admin.css')}}" />
<!--END DATA TABLE STYLESHEETS AND SCRIPTS -->

<script src="{{asset('./js/SB-Admin-2/sb-admin-2.js')}}"></script>
<script src="{{asset('./js/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('./js/bootstrap.min.js')}}"></script>
    <!-- Custom CSS -->
</head>

<body>

    <div id="wrapper">

<!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

                    </button>
                    <a class="navbar-brand" href="{{url('deo/dashboard')}}">Police Crime Branch</a>
                </div>
                <!-- Left Nav Bar -->

                <ul class="nav nav-tabs navbar-inverse navbar-left navbar-top" style="background-color: #ffffff">
                  <li role="presentation" class="active"><a href="{{url('deo/dashboard')}}">
                  <span class="glyphicon glyphicon-home">  Home</span></a></li>

                  <li role="presentation"><a href="{{url('complainer/create')}}">Create Case File</a></li>
                  <li role="presentation"><a href="{{url('deo/myfiles')}}">View Case File</a></li>
                </ul>

                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i>  {{ Auth::user()->name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="{{url('auth/logout')}}"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li>
                    <a href="{{url('deo/myfiles/'.Session('selectedId'))}}"><i class="fa fa-list-alt"></i> Summary</a>
                </li>

                <li>
                    <a href="{{url('deo/add/complainer')}}"><i class="fa fa-dashboard fa-fw"></i> Add Complaint</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Criminals<span class="fa arrow"></span></a>
                </li>


            </ul>
        </div>
                <!-- /.sidebar-collapse -->

        </nav>

        <div class="content-wrapper">
        <div class="container">
            <div class="panel panel-body">
                @yield('content')
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>

    </div>
    <!-- /#wrapper -->



</body>

</html>
