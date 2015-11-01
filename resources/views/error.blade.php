<!doctype html>
<html lang="en">
<head>
<!--STYLESHEETS-->
<link type="text/css" rel="stylesheet" href="{{asset('./css/bootstrap.css')}}" />
<link rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('./css/sb-admin.css')}}" />

<!--END DATA TABLE STYLESHEETS AND SCRIPTS -->
<script src="{{asset('js/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>

</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">Police Crime Branch</a>
            </div>

            <!-- Left Nav Bar -->
            <ul class="nav navbar-left top-nav">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home">   Home</span></a></li>
            </ul>

            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i>{{ Auth::user()->name }} <b class="caret"></b></a>
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

        </nav>
        <div id="page-wrapper">

            <div class="container">
                <div class="col-md-11 col-sm-11">
                    <h1>You do not Have Permission to enter this URL </h1>
                </div> <!-- /.col-md-8 col-sm-8 -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>

</body>
</html>