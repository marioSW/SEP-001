@extends('OIC.crime_oic_main')
@section('content')


    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Criminals</h4>
            </div>
            <!-- END PANEL HEADING -->
            <div class="panel-body">
                <div class="form-group form-horizontal">
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
                    <form action="{{url('oic/makecriminal')}}" method="post" >
                        {!! csrf_field() !!}

                        <div class="col-sm-2">
                            <label>Person ID</label>
                            <input type="text" id="sel_id" name="sel_id" class="form-control" value="Selected ID" readonly />
                        </div>
                        <div class="col-sm-2">
                            <label>Case File</label>
                            <input type="text" id="sel_file_no" name="sel_file_no" class="form-control" value="File Number" readonly/>
                        </div>


                        <div class="col-sm-2">
                            <label>Full Name</label>
                            <input type="text" id="sel_name" name="sel_name" class="form-control" value="Name" readonly/>
                        </div>

                        <div class="col-sm-2">
                            <label>Date Of Birth</label>
                            <input type="text" id="sel_dob" name="sel_dob" class="form-control" value="Date Of Birth" readonly />
                        </div>

                        <div class="col-sm-2">
                            <label>Sex</label>
                            <input type="text" id="sel_sex" name="sel_sex" class="form-control" value="Sex" readonly />
                        </div>
                        <div class="col-sm-2">
                            <label>Crime</label>
                            <input type="text" id="sel_crime" name="sel_crime" class="form-control" value="File Number" readonly/>
                        </div>

                        <div class="col-sm-2">
                            <label>Happen Date</label>
                            <input type="text" id="sel_date" name="sel_date" class="form-control" value="Date" readonly/>
                        </div>

                        <div class="col-sm-2">
                            <label>Happen Place</label>
                            <input type="text" id="sel_place" name="sel_place" class="form-control" value="place" readonly/>
                        </div>



                        <div class="col-sm-2">
                            <label>Name as criminal </label>
                            <input type="submit" value="submit" class="btn btn-primary">
                        </div>

                    </form>
                    <!-- END FORM  -->
                </div>
                <div class="col-md-7 col-sm-2">

                </div>
                <div class=".col-lg-12">

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
                <table class="table table-hover display" role="form" action="post"  id="criminal_select_table">
                    <thead>
                    <tr>
                        <th value="person_id">ID</th>
                        <th value="file_no">File Number</th>
                        <th>Full Name</th>
                        <th>Sex</th>
                        <th>D.O.B</th>
                        <th>Crime</th>
                        <th>Crime date</th>
                        <th>Crime Place</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($suspects as $suspect)
                        <tr>
                            <td>
                                {{ $suspect->person_id }}
                            </td>
                            <td>
                                {{ $suspect->file_no }}
                            </td>
                            <td>
                                {{ $suspect->full_name }}
                            </td>

                            <td>
                                {{ $suspect->sex}}
                            </td>
                            <td>
                                {{ $suspect->date_of_birth}}
                            </td>
                            <td>
                                {{$suspect->description}}
                            </td>
                            <td>
                                {{$suspect->crime_date}}
                            </td>
                            <td>
                                {{$suspect->crime_place_name}}
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



    </div>

    <script type="text/javascript">

        $("#criminal_select_table tr").click(function(){
            var idSelected =$(this).find('td:first').html();
            var fileSelected= $(this).find('td:nth-child(2)').html();
            var nameSelected=$(this).find('td:nth-child(3)').html();
            var dobSelected=$(this).find('td:nth-child(4)').html();
            var sexSelected=$(this).find('td:nth-child(5)').html();
            var crimeSelected=$(this).find('td:nth-child(6)').html();
            var dateSelected=$(this).find('td:nth-child(7)').html();
            var placeSelected=$(this).find('td:nth-child(8)').html();

            $('#sel_id').val(idSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_file_no').val(fileSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_name').val(nameSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_dob').val(dobSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_sex').val(sexSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_crime').val(crimeSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_date').val(dateSelected.replace(/\s+/g,' ').trim()).html();

            $('#sel_place').val(placeSelected.replace(/\s+/g,' ').trim()).html();



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
            var table = $('#criminal_select_table');
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