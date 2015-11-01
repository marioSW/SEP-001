@extends('OIC.crime_oic_main')
@section('content')

    <div class="col-md-5">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Assign Police Officers</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">
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
                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" action="{{url('oic/assignOfficers')}}">
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label >police Id</label>
                                    <textarea id="person_id" name="person_id" class="form-control" rows="1"  placeholder="police station"></textarea>
                                </div>


                                <div class="form-group">
                                    <label>Police Station</label>
                                    <textarea id="police_station" name="police_station" class="form-control" rows="1" placeholder="police station"></textarea>
                                </div>

                                <div class="form-group">
                                    <label >Case File</label>
                                    <textarea id="case_file_no" name="case_file_no" class="form-control" rows="1" placeholder="police station"></textarea>
                                </div>


                                <input type="submit" class="btn btn-primary" value="submit"/>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div> <!-- ./col-md-5 -->

    <div class="col-md-7 col-sm-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Case Details</h4>
            </div>
            <!-- END PANEL HEADING -->
            <div class="panel-body">
                <div class="form-group form-horizontal">

                </div>

                <table class="table table-hover display" role="form" action="post"  id="crime_select_table">
                    <thead>
                    <tr>
                        <th value="case_file">Case File</th>
                        <th value="Name">Police Station</th>
                        <th value="place">Crime Place</th>
                        <th value="place_add">Crime Place Address</th>
                        <th value="crime_date">Happen Date</th>
                        <th value="place">Crime Happen Time</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($crimes as $crime)
                        <tr>
                            <td>
                                {{ $crime->case_file_no}}
                            </td>
                            <td>
                                {{ $crime->case_police_station}}
                            </td>
                            <td>
                                {{ $crime->crime_place_name }}
                            </td>
                            <td>
                                {{ $crime->crime_place_add}}
                            </td>
                            <td>
                                {{ $crime->crime_date}}
                            </td>
                            <td>
                                {{ $crime->crime_time}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> <!-- END TABLE  -->

                <table class="table table-hover display" role="form" action="post"  id="officers_table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th value="name">Name</th>
                        <th value="e-mail">E-mail</th>
                        <th value="police_station">Police Station</th>
                        <th value="role">Role</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($officers as $officer)
                        <tr>
                            <td>
                                {{ $officer->id }}
                            </td>
                            <td>
                                {{ $officer->name }}
                            </td>
                            <td>
                                {{ $officer->email }}
                            </td>
                            <td>
                                {{ $officer->police_station }}
                            </td>
                            <td>
                                {{ $officer->role }}
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table> <!-- END TABLE  -->
            </div>
            <!--  END PANEL BODY -->
        </div>
        <!-- END PANEL -->
    </div>
    <!-- END col-md-7 col-sm-7 -->
    <script type="text/javascript">

        $("#officers_table tr").click(function(){
            var idSelected =$(this).find('td:first').html();

            $('#person_id').val(idSelected.replace(/\s+/g,' ').trim()).html();

            var policeStationSelected =$(this).find('td:nth-child(4)').html();

            $('#police_station').val(policeStationSelected.replace(/\s+/g,' ').trim()).html();


        });

        $("#crime_select_table tr").click(function(){

            var caseSelected=$(this).find('td:first').html();

            $('#case_file_no').val(caseSelected.replace(/\s+/g,' ').trim()).html();


        });

    </script>
@endsection