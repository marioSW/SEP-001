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
        </nav>

        <div class="container">
             @yield('content')
        </div>
        <!-- /.container-fluid -->



</body>
</html>