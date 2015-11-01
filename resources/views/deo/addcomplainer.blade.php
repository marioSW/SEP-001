@extends('deo.main_deo_panel')
@section('content')

        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="content-header">
        <h1>
            Complainer
            <small>case file</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">DEO</a></li>
            <li class="active">New Complainer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <form  role="form" method="POST" action="{{url('complainer/create')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">CASE FILE</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Complainer ID</label>
                                <div class="input-group">
                                    <div class="input-group-addon">

                                    </div>
                                    <input type="text" class="form-control" name="person_id" >
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <select class="form-control select2" name="title" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <option value="Rev" >Rev</option>
                                    <option value="DR">Dr</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>

                                </select>
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label>NIC Number</label>
                                <input type="text" class="form-control" name="NIC" placeholder=" NIC...">
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="full_name" placeholder="fullname ...">

                            </div><!-- /.form-group -->
                            <div class="form-group">
                                <label>PassPort Number</label>
                                <input type="text" class="form-control" name="passport_id" placeholder="passport ...">

                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <div>
                                    <label>Male
                                        <input type="radio" name="sex" value="male" class="minimal" checked>
                                    </label>
                                    <label>Female
                                        <input type="radio" name="sex" value="female" class="minimal">
                                    </label>
                                </div>
                            </div><!-- /.form-group -->

                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="DATE" class="form-control" placeholder=" ..." max="{{$cur_date}}" >

                            </div><!-- /.form-group -->

                        </div><!-- /.col -->


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Religion</label>
                                <select class="form-control select2" name="religion" style="width: 100%;">
                                    <option value="Buddhism" selected="selected">Buddhism</option>
                                    <option value="Christian" >Christian</option>
                                    <option value="Roman Cathalic">Roman Cathalic</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Islam">Islam</option>


                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nationality</label>
                                <select class="form-control select2" name="nationality" style="width: 100%;">
                                    <option selected="selected" value="Sinhala">Sinhala</option>
                                    <option value="Tamil">Tamil</option>
                                    <option value="Muslim">Muslim</option>
                                    <option value="Burger">Burger</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-control select2" name="marital_status" style="width: 100%;">
                                    <option selected="selected" value="Married">Married</option>
                                    <option value="UnMarried">UnMarried</option>
                                    <option value="Widow">Widow</option>
                                </select>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <!-- textarea -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="current_address" placeholder="Address ..."></textarea>

                            </div><!-- /.form-group -->

                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number 1</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="telephone">
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number 2</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="current_mobile_no" >
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>File</label>
                                <div class="input-group">
                                    <div class="input-group-addon">

                                    </div>
                                    <input type="text" class="form-control" name="file_no" >
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Crime Date</label>
                                <div class="input-group">
                                    <div class="input-group-addon">

                                    </div>
                                    <input type="DATE" class="form-control" placeholder=" ..." max="{{$cur_date}}" >
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Crime Time</label>
                                <div class="input-group">
                                    <div class="input-group-addon">

                                    </div>
                                    <input type="time" class="form-control" >
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Crime Place</label>
                                <div class="input-group">
                                    <div class="input-group-addon">

                                    </div>
                                    <input type="text" class="form-control" >
                                </div><!-- /.input group -->
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                        <!-- textarea -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Crime Description</label>
                                <textarea class="form-control" rows="4"  placeholder="Describe the crime ..."></textarea>

                            </div><!-- /.form-group -->

                        </div><!-- /.col -->

                    </div><!-- /.row -->


                </div><!-- /.box -->

                <table>
                    <tr>
                        <td width="20%">&nbsp;</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VictimModal" data-whatever="@mdo">Victim Details</button></td>
                        <td width="20%">&nbsp;</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#WitnessModal" data-whatever="@mdo">Witness Details</button></td>
                        <td width="20%">&nbsp;</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#SuspectModal" data-whatever="@mdo">Suspect Details</button></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

                <!-- Modal Box For Victim Details -->


                <div class="modal fade" id="VictimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Victim Details</h4>
                            </div>

                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_title">Title</label> <label style="color:#C20000">*</label></p>
                                                <select name="v_title" id="v_title">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($title1 as $titles)
                                                        <option class="form-control" name="v_title" value="{{$titles}}" > {{ $titles }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group title -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_f_name">Full Name</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="v_f_name" name="v_f_name" placeholder="Full Name"/>
                                            </div> <!-- form group full name -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_s_name">Surname</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="v_s_name" name="v_s_name" placeholder="Surname"/>
                                            </div> <!-- form group surname -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_address">Current Address</label> <label style="color:#C20000">*</label></p>
                                                <textarea class="form-control" id="v_address" name="v_address" placeholder="Current Address" rows="4"></textarea>
                                            </div> <!-- form group current address -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_t_number">Telephone Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="number" class="form-control" id="v_t_number" name="v_t_number" placeholder="Telephone Number"/>
                                            </div> <!-- form group telephone number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_m_number">Current Mobile Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="number" class="form-control" id="v_m_number" name="v_m_number" placeholder="Current Mobile Number"/>
                                            </div> <!-- form group current mobile no -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_nic">NIC Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="v_nic" name="v_nic" placeholder="NIC Number" maxlength="10"/>
                                            </div> <!-- form group NIC number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_passport">Passport Number</label></p>
                                                <input type="text" class="form-control" id="v_passport" name="v_passport" placeholder="Passport Number" maxlength="9"/>
                                            </div> <!-- form group passport ID -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_gender">Gender</label> <label style="color:#C20000">*</label></p>
                                                <table>
                                                    <tr>
                                                        <td width="22%">&nbsp;</td>
                                                        <td><input type="radio" id="v_gender" name="v_gender" value="male">   Male</td>
                                                        <td width="35%">&nbsp;</td>
                                                        <td><input type="radio" id="v_gender" name="v_gender" value="female">   Female</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </div> <!-- form group gender -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_dob">Date Of Birth</label> <label style="color:#C20000">*</label></p>
                                                <input type="date" class="form-control" id="v_dob" name="v_dob" max="{{$cur_date}}"/>
                                            </div> <!-- form group date of birth -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_religion">Religion</label> <label style="color:#C20000">*</label></p>
                                                <select name="v_religion" id="v_religion">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($religion1  as $religions)
                                                        <option class="form-control" name="v_religion" value="{{$religions}}" > {{ $religions }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group religion -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_nationality">Nationality</label> <label style="color:#C20000">*</label></p>
                                                <select name="v_nationality" id="v_nationality">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($nationality1  as $nationalities)
                                                        <option class="form-control" name="v_nationality" value="{{$nationalities}}" > {{ $nationalities }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group nationality -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_m_status">Marital Status</label> <label style="color:#C20000">*</label></p>
                                                <select name="v_m_status" id="v_m_status">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($m_status1  as $m_statuses)
                                                        <option class="form-control" name="v_m_status" value="{{$m_statuses}}" > {{ $m_statuses }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group maritual status -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_b_group">Blood Group</label> <label style="color:#C20000">*</label></p>
                                                <select name="v_b_group" id="v_b_group">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($blood_group1 as $blood_groups)
                                                        <option class="form-control" name="v_b_group" value="{{$blood_groups}}" > {{ $blood_groups }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group blood group -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="v_wounds">Wounds in Details</label></p>
                                                <textarea class="form-control" id="v_wounds" name="v_wounds" placeholder="Wounds In Details" rows="4"></textarea>
                                            </div> <!-- form group wounds -->

                                        </div> <!-- col-md-12 -->
                                    </div> <!-- row -->
                                </div> <!-- container fluid -->
                            </div> <!-- modal body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="victim_details()">Save</button>
                            </div> <!-- modal footer -->
                        </div> <!-- modal content -->
                    </div> <!-- modal dialog -->
                </div> <!-- modal fade -->

                <!-- Modal Box For Witness Details -->

                <div class="modal fade" id="WitnessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Statement Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_title">Title</label> <label style="color:#C20000">*</label></p>
                                                <select name="w_title" id="w_title">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($title1 as $titles)
                                                        <option class="form-control" name="w_title" value="{{$titles}}" > {{ $titles }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group title -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_f_name">Full Name</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="w_f_name" name="w_f_name" placeholder="Full Name" />
                                            </div> <!-- form group full name -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_s_name">Surname</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="w_s_name" name="w_s_name" placeholder="Surname" />
                                            </div> <!-- form group surname -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_address">Current Address</label> <label style="color:#C20000">*</label></p>
                                                <textarea class="form-control" id="w_address" name="w_address" placeholder="Current Address" rows="4"></textarea>
                                            </div> <!-- form group address -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_t_number">Telephone Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="number" class="form-control" id="w_t_number" name="w_t_number" placeholder="Telephone Number"/>
                                            </div> <!-- form group telephone number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_m_number">Current Mobile Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="number" class="form-control" id="w_m_number" name="w_m_number" placeholder="Current Mobile Number"/>
                                            </div> <!-- form group mobile number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_nic">NIC Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="w_nic" name="w_nic" placeholder="NIC Number" maxlength="10" />
                                            </div> <!-- form group NIC number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_passport">Passport Number</label></p>
                                                <input type="text" class="form-control" id="w_passport" name="w_passport" placeholder="Passport Number"/>
                                            </div> <!-- form group passport ID -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_gender">Gender</label> <label style="color:#C20000">*</label></p>
                                                <table>
                                                    <tr>
                                                        <td width="22%">&nbsp;</td>
                                                        <td><input type="radio" id="w_gender" name="w_gender" value="male">   Male</td>
                                                        <td width="35%">&nbsp;</td>
                                                        <td><input type="radio" id="w_gender" name="w_gender" value="female">   Female</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </div> <!-- form group gender -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_dob">Date Of Birth</label> <label style="color:#C20000">*</label></p>
                                                <input type="date" class="form-control" id="w_dob" name="w_dob" max="{{$cur_date}}" />
                                            </div> <!-- form group date of birth -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_religion">Religion</label> <label style="color:#C20000">*</label></p>
                                                <select name="w_religion" id="w_religion">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($religion1  as $religions)
                                                        <option class="form-control" name="w_religion" value="{{$religions}}" > {{ $religions }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group religion -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_nationality">Nationality</label> <label style="color:#C20000">*</label></p>
                                                <select name="w_nationality" id="w_nationality">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($nationality1  as $nationalities)
                                                        <option class="form-control" name="w_nationality" value="{{$nationalities}}" > {{ $nationalities }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group nationality -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_m_status">Marital Status</label> <label style="color:#C20000">*</label></p>
                                                <select name="w_m_status" id="w_m_status">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($m_status1  as $m_statuses)
                                                        <option class="form-control" name="w_m_status" value="{{$m_statuses}}" > {{ $m_statuses }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group maritual status -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="w_statement">Statement</label></p>
                                                <textarea class="form-control" id="w_statement" name="w_statement" placeholder="Statement" rows="4"></textarea>
                                            </div> <!-- form group statement -->

                                        </div> <!-- col-md-12 -->
                                    </div> <!-- row -->
                                </div> <!-- container fluid -->
                            </div> <!-- modal body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="witness_details()">Save</button>
                            </div> <!-- modal footer -->
                        </div> <!-- modal content -->
                    </div> <!-- modal dialog -->
                </div> <!-- modal fade -->

                <!-- Modal Box For Suspect Details -->

                <div class="modal fade" id="SuspectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Suspect Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_title">Title</label> <label style="color:#C20000">*</label></p>
                                                <select name="s_title" id="s_title">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($title1 as $titles)
                                                        <option class="form-control" name="s_title" value="{{$titles}}" > {{ $titles }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group title -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_f_name">Full Name</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="s_f_name" name="s_f_name" placeholder="Full Name" />
                                            </div> <!-- form group full name-->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_s_name">Surname</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="s_s_name" name="s_s_name" placeholder="Surname" />
                                            </div> <!-- form group surname -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_address">Current Address</label> <label style="color:#C20000">*</label></p>
                                                <textarea class="form-control" id="s_address" name="s_address" placeholder="Current Address" rows="4"></textarea>
                                            </div> <!-- form group address -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_t_number">Telephone Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="number" class="form-control" id="s_t_number" name="s_t_number" placeholder="Telephone Number"/>
                                            </div> <!-- form group telephone number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_m_number">Current Mobile Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="number" class="form-control" id="s_m_number" name="s_m_number" placeholder="Current Mobile Number"/>
                                            </div> <!-- form group mobile number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_nic">NIC Number</label> <label style="color:#C20000">*</label></p>
                                                <input type="text" class="form-control" id="s_nic" name="s_nic" placeholder="NIC Number" maxlength="10" />
                                            </div> <!-- form group NIC number -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_passport">Passport Number</label></p>
                                                <input type="text" class="form-control" id="s_passport" name="s_passport" placeholder="Passport Number"/>
                                            </div> <!-- form group passport ID -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_gender">Gender</label> <label style="color:#C20000">*</label></p>
                                                <table>
                                                    <tr>
                                                        <td width="22%">&nbsp;</td>
                                                        <td><input type="radio" id="s_gender" name="s_gender" value="male">   Male</td>
                                                        <td width="35%">&nbsp;</td>
                                                        <td><input type="radio" id="s_gender" name="s_gender" value="female">   Female</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table>
                                            </div> <!-- form group gender -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_dob">Date Of Birth</label> <label style="color:#C20000">*</label></p>
                                                <input type="date" class="form-control" id="s_dob" name="s_dob" max="{{$cur_date}}" />
                                            </div> <!-- form group date of birth -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_religion">Religion</label> <label style="color:#C20000">*</label></p>
                                                <select name="s_religion" id="s_religion">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($religion1  as $religions)
                                                        <option class="form-control" name="s_religion" value="{{$religions}}" > {{ $religions }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group religion -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_nationality">Nationality</label> <label style="color:#C20000">*</label></p>
                                                <select name="s_nationality" id="s_nationality">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($nationality1  as $nationalities)
                                                        <option class="form-control" name="s_nationality" value="{{$nationalities}}" > {{ $nationalities }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group nationality -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_m_status">Marital Status</label> <label style="color:#C20000">*</label></p>
                                                <select name="s_m_status" id="s_m_status">
                                                    <option class="form-control" value="">Select an Option</option>
                                                    @foreach($m_status1  as $m_statuses)
                                                        <option class="form-control" name="s_m_status" value="{{$m_statuses}}" > {{ $m_statuses }} </option>
                                                    @endforeach
                                                </select>
                                            </div> <!-- form group marital status -->

                                            <div class="form-group">
                                                <p class="textstyle"> <label for="s_method">Methods Used</label></p>
                                                <textarea class="form-control" id="s_method" name="s_method" placeholder="Method" rows="4"></textarea>
                                            </div> <!-- form group method -->
                                        </div> <!-- col-md-12 -->
                                    </div> <!-- row -->
                                </div> <!-- container fluid -->
                            </div> <!-- modal body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="suspect_details()">Save</button>
                            </div> <!-- modal footer -->
                        </div> <!-- modal content -->
                    </div> <!-- modal dialog -->
                </div> <!-- modal fade -->

            </div>

        </form>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection

<script type="text/javascript">

    function victim_details()
    {
        $('#VictimModal').modal('hide');

        $v_title = $("#v_title").val().text();
        $v_f_name = $("#v_f_name").val().text();
        $v_s_name = $("#v_s_name").val().text();
        $v_address = $("#v_address").val().text();
        $v_t_number = $("#v_t_number").val().text();
        $v_m_number = $("#v_m_number").val().text();
        $v_nic = $("#v_nic").val().text();
        $v_passport = $("#v_passport").val().text();
        $v_gender = $("#v_gender").val().text();
        $v_dob = $("#v_dob").val().text();
        $v_religion = $("#v_religion").val().text();
        $v_nationality = $("#v_nationality").val().text();
        $v_m_status = $("#v_m_status").val().text();
        $v_b_group = $("#v_b_group").val().text();
        $v_wounds = $("#v_wounds").val().text();
    }

    function witness_details()
    {
        $('#WitnessModal').modal('hide');
        $w_title=$("#w_title").val().text();
        $w_f_name=$("#w_f_name").val().text();
        $w_s_name=$("#w_s_name").val().text();
        $w_address=$("#w_address").val().text();
        $w_t_number=$("#w_t_number").val().text();
        $w_m_number=$("#w_m_number").val().text();
        $w_nic=$("#w_nic").val().text();
        $w_passport=$("#w_passport").val().text();
        $w_gender=$("#w_gender").val().text();
        $w_dob=$("#w_dob").val().text();
        $w_religion=$("#w_religion").val().text();
        $w_nationality=$("#w_nationality").val().text();
        $w_m_status=$("#w_m_status").val().text();
        $w_b_group=$("#w_b_group").val().text();
        $w_wounds=$("#w_wounds").val().text();
    }
    function suspect_details()
    {
        $('#SuspectModal').modal('hide');
        $v_title=$("#s_title").val().text();
        $v_f_name=$("#s_f_name").val().text();
        $v_s_name=$("#s_s_name").val().text();
        $v_address=$("#s_address").val().text();
        $v_t_number=$("#s_t_number").val().text();
        $v_m_number=$("#s_m_number").val().text();
        $v_nic=$("#s_nic").val().text();
        $v_passport=$("#s_passport").val().text();
        $v_gender=$("#s_gender").val().text();
        $v_dob=$("#s_dob").val().text();
        $v_religion=$("#s_religion").val().text();
        $v_nationality=$("#s_nationality").val().text();
        $v_m_status=$("#s_m_status").val().text();
        $v_b_group=$("#s_b_group").val().text();
        $v_wounds=$("#s_wounds").val().text();
    }

</script>