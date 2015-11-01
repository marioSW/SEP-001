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

                            <input type="text" id="sel_id" name="sel_id" class="form-control" value="Selected Name" readonly />
                        </div>

                        <div class="col-sm-3">
                            <input type="submit" value="View Full Detail Of the Case" class="btn btn-primary">
                        </div>

                    </form>
                    <!-- END FORM  -->
                </div>
                <div class="form-horizontal">
                    <div class="col-sm-3">
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