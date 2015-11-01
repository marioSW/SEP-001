@extends('OIC.crime_oic_main')
@section('content')

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>All Crime Reported Summary</h4>
            </div>
            <!-- END PANEL HEADING -->
            <div class="panel-body">
                <div class="form-group form-horizontal">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}

                        </div>
                    @endif
                    <form action="{{url('oic/CrimeFullView')}}" method="post" >
                        {!! csrf_field() !!}

                        <div class="col-sm-2">
                            <label>Case File</label>
                            <input type="text" id="sel_id" name="sel_id" class="form-control" value="Selected Name" readonly />
                        </div>

                        <div class="col-sm-3">
                            <input type="submit" value="View Full Detail Of the Case" class="btn btn-primary">
                        </div>

                    </form>
                    <!-- END FORM  -->
                </div>
                <div class="form-horizontal">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </div>
                            <input type="text" id="search" class="form-control" placeholder="Search for preference">
                        </div> <!-- END INPUT-GROUP -->
                    </div>
                </div> <!-- END FORM HORIZONATL -->
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

            </div>
            <!--  END PANEL BODY -->
        </div>
        <!-- END PANEL -->
    </div>
    <!-- END ROW -->

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Victim Details</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">

                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" >
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label >Victim Name</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['full_name']}}" readonly />
                                </div>


                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['surname']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >NIC</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['date_of_birth']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Gender</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['sex']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Religion</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['religion']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Nationality</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['nationality']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Marital Status</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['marital_status']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['current_address']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Phone</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$victim['telephone']}}" readonly />
                                </div>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div> <!-- ./col-md-5 -->

    <div class="col-md-6 col-sm-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Case File</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">

                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" >
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label >Case Police Station</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$casefile['police_station']}}" readonly />
                                </div>


                                <div class="form-group">
                                    <label>File Created Date</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$casefile['file_created_date']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Resoleved Date</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$casefile['resolved_date']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Status</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$casefile['status']}}" readonly />
                                </div>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div> <!-- ./col-md-5 -->

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Witness Details</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">

                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" >
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label >Witness Name</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['full_name']}}" readonly />
                                </div>


                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['surname']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >NIC</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['date_of_birth']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Gender</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['sex']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Religion</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['religion']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Nationality</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['nationality']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Marital Status</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['marital_status']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['current_address']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Phone</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$vitnesse['telephone']}}" readonly />
                                </div>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Accused Details</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">

                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" >
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label >Accused Name</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['full_name']}}" readonly />
                                </div>


                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['surname']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >NIC</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['date_of_birth']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Gender</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['sex']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Religion</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['religion']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Nationality</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['nationality']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Marital Status</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['marital_status']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['current_address']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Phone</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$accused['telephone']}}" readonly />
                                </div>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Suspect Details</h4>
            </div> <!-- panel heading -->

            <div class="panel-body">
                <div class="container-fluid">

                    <div class="col-md-11">
                        <div class="row">
                            <form class="form-horizontal" method="post" >
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label >Suspect Name</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['full_name']}}" readonly />
                                </div>


                                <div class="form-group">
                                    <label>Surname</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['surname']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >NIC</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['date_of_birth']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Gender</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['sex']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Religion</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['religion']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Nationality</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['nationality']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Marital Status</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['marital_status']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Address</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['current_address']}}" readonly />
                                </div>

                                <div class="form-group">
                                    <label >Phone</label>
                                    <input type="text" id="p_id" name="p_id" class="form-control" value="{{$suspect['telephone']}}" readonly />
                                </div>

                            </form>
                        </div> <!-- ./row -->
                    </div> <!-- col-md-11 -->
                </div> <!-- ./container -->

            </div> <!-- ./panel body -->

        </div> <!-- panel primary -->
    </div>

    <script type="text/javascript">

        $("#crime_select_table tr").click(function(){
            var idSelected =$(this).find('td:first').html();
            //var policeStationSelected= $(this).find('td:nth-child(3)').html();

            $('#sel_id').val(idSelected.replace(/\s+/g,' ').trim()).html();

            //$('#sel_police_station').val(policeStationSelected.replace(/\s+/g,' ').trim()).html();
        });
        $(document).ready(function()
        {
            $('#search').keyup(function()
            {
                searchTable($(this).val());
            });
        });

        function searchTable(inputVal)
        {
            var table = $('#roles_select_table');
            table.find('tr').each(function(index, row)
            {
                var allCells = $(row).find('td');
                if(allCells.length > 0)
                {
                    var found = false;
                    allCells.each(function(index, td)
                    {
                        var regExp = new RegExp(inputVal, 'i');
                        if(regExp.test($(td).text()))
                        {
                            found = true;
                            return false;
                        }
                    });
                    if(found == true)$(row).show();else $(row).hide();
                }
            });
        }
    </script>
@endsection