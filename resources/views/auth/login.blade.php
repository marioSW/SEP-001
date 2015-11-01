<html>
<!-- resources/views/auth/login.blade.php -->
<head>
<!--STYLESHEETS-->
<link type="text/css" rel="stylesheet" href="{{asset('./css/bootstrap.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}" />

<script src="{{asset('./js/bootstrap.js')}}"></script>
<script src="{{asset('./js/bootstrap.min.js')}}"></script>
<script src="{{asset('./js/jquery.min.js')}}"></script>

</head>
<body>

<div class="container" style="margin-top:40px">
      		<div class="row">
      			<div class="col-sm-6 col-md-4 col-md-offset-4">
      				<div class="panel panel-default">
      					<div class="panel-heading">
      						<strong> Sign in to continue</strong>
      					</div>

      					<div class="panel-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning">
                                    {{ session('warning') }}
                                </div>
                            @endif
      						<form role="form" class="form-group" action="{{ url('auth/login')}}" name="signinForm" id="signinForm"  method="POST">

      							<fieldset>
      							{!! csrf_field() !!}
      								<div class="row">
      								    <div class="col-md-3 col-md-offset-3">
                                            <div class="center-block">
                                                <img class="profile-img" src="{{ asset('images/logo_p.png') }}" alt="">
                                            </div>
      									</div>
      								</div>
      								<div class="row">
      									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
      										<div class="form-group" id="email-div">
      											<div class="input-group">
      												<span class="input-group-addon">
      													<i class="glyphicon glyphicon-user"></i>
      												</span>
      												<input class="form-control" placeholder="E-mail" name="email" id="email" type="text"  autofocus>
      											</div>
      											<label id="emaillbl"> </label>
      										</div>
      										<div class="form-group" id="password-div">
      											<div class="input-group">
      												<span class="input-group-addon">
      													<i class="glyphicon glyphicon-lock"></i>
      												</span>
      												<input class="form-control" placeholder="Password" name="password" id="password" type="password" value="">
      											</div>
      											<label id="passwordlbl"> </label>
      										</div>

      										<div class="form-group">
      											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
      										</div>
      									</div>
      								</div>
      							</fieldset>
      						</form>
      					</div>
      					<div class="panel-footer ">
      						Don't have an account! <a href="{{url('auth/register')}}" onClick=""> Sign Up Here </a>
      					</div>
                      </div>
      			</div>
      		</div>
      	</div>

<script>
    $("document").ready(function (){
        @if( count($errors) > 0)
            @if( $errors->email  != null )
            $("#email",function(){
                $("#email-div").addClass("alert has-error has-feedback");
                $("#emaillbl").value=" {{ $errors->email->first() }}";
            });
            @endif
            @if( $errors->password != null)
            $("#password",function(){
                $("#password-div").addClass("alert has-error has-feedback")  ;
            });

            @endif
         @endif

    });
</script>

</body>

</html>