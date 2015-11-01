<html>
<head>
<!--STYLESHEETS-->
<link type="text/css" rel="stylesheet" href="{{asset('./css/bootstrap.css')}}" />
<link type="text/css" rel="stylesheet" href="{{asset('./css/bootstrap.min.css')}}" />

<!-- SCRIPTS -->
<script src="{{asset('./js/bootstrap.js')}}"></script>
<script src="{{asset('./js/bootstrap.min.js')}}"></script>
<script src="{{asset('./js/jquery.min.js')}}"></script>

</head>
<body>
<div class="container" style="margin-top:40px">
      		<div class="row">
      			<div class="col-md-6 col-md-offset-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h1>Register</h1>

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
                                    <!-- REGISTRATION FORM -->
                                       <form name="registration-form" method="POST" action="/auth/register" class="form-horizontal">
                                       {!! csrf_field() !!}


                                      <div class="form-group" id="name-div">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                                        </div>
                                      </div>

                                      <div class="form-group" id="email-div">
                                        <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email">
                                        </div>
                                      </div>

                                      <div class="form-group" id="password-div">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
                                        </div>
                                      </div>

                                      <div class="form-group" id="password-div">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control" name="password_confirmation" id="inputPassword3" placeholder="confirm password">
                                        </div>
                                      </div>
<!--
                                        <div class="form-group">
                                          <label class="col-sm-2 control-label" for="selectbasic">Role</label>
                                            <div class="col-sm-10">
                                                <select id="selectbasic" name="buttondropdown" class="form-control input-xlarge">
                                                  <option>data-entry-operator</option>
                                                  <option>officer-in-charge</option>
                                                  <option>admin</option>
                                                  <option>asp</option>
                                                  <option>island-registered-criminal-officer</option>
                                                </select>
                                            </div>
                                        </div>
-->
                                      <div class="form-group" id="policeStation-div">
                                        <label for="policestation" class="col-sm-2 control-label">Police Station</label>
                                        <div class="col-sm-10">
                                          <input type="text" class="form-control" name="police_station" id="police_station" placeholder="police station">
                                        </div>
                                      </div>
                                       <div class="col-md-3 col-md-offset-9">
                                        <div class="form-group">

                                                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Register">

                                        </div>

                                        </div>


                                       </form>
                                    <!-- END REGISTRATION FORM -->
                                </div>
                                <!--END PANEL BODY -->
                            </div>
                            <!-- END PANEL -->
                        </div>
                        <!-- END ROW -->
                    </div>
                    <!-- END CONTAINER FLUID -->


                </div>
            </div>
</div>
<!--END WRAPPER-->
<script>
    $("document").ready(function (){
        @if( count($errors) > 0)
            @if( $errors->name  != null )
            $("#name",function(){
                $("#name-div").addClass("form-group alert has-error has-feedback");

            });
            @endif
            @if( $errors->email  != null )
            $("#inputEmail",function(){
                $("#email-div").addClass("form-group alert has-error has-feedback");
                $("#emaillbl").value=" {{ $errors->email->first() }}";
            });
            @endif
            @if( $errors->password != null)
            $("#inputPassword",function(){
                $("#password-div").addClass("alert has-error has-feedback")  ;
            });
            @endif
            @if( $errors->police_station  != null )
            $("#police_station",function(){
                $("#policeStation-div").addClass("form-group alert has-error has-feedback");

            });
            @endif
         @endif

    });
</script>
</body>
</html>