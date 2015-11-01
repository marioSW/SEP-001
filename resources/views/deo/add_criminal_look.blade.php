@extends('deo.main_deo_panel')
@section('content')

    <div class="col-md-5">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <h4>Add Criminal Appearances</h4>
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
                            <form class="form-horizontal" method="post" action="{{url('criminal/appearance')}}">
                                {!! csrf_field()  !!}
                                <div class="form-group">
                                    <label for="#list_no">Criminal Id</label>
                                    <input type="text" id="person_id" name="person_id" class="form-control" placeholder="Criminal Id."/> 
                                </div>

                                <div class="form-group">
                                    <label for="#crime_type">Image</label>
                                    <input type="file" style="width:200px">
                                </div>

                                <div class="form-group">
                                    <label>Eye Color</label>
                                    <textarea id="eye_colour" name="eye_colour" class="form-control" rows="4" placeholder="Eye Color"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="#crime_category">Hair Color</label>
                                    <input type="text" id="hair_colour" name="hair_colour" class="form-control" placeholder="Hair Color"/>
                                </div>

                                <div class="form-group">
                                    <label for="#crime_category">Height(inches)</label>
                                    <input type="text" id="height" name="height" class="form-control" placeholder="Height"/>
                                </div>

                                <div class="form-group">
                                    <label for="#">Weight(kg)</label>
                                    <input type="text" id="weight" name="weight" class="form-control" placeholder="Birth Mark"/>
                                </div>

                                <div class="form-group">
                                    <label for="#">Birth Mark Description 1</label>
                                    <input type="text" id="birth_mark_description1" name="birth_mark_description1" class="form-control" placeholder="Birth Mark"/>
                                </div>

                                <div class="form-group">
                                    <label for="#">Birth Mark Description 2</label>
                                    <input type="text" id="birth_mark_description2" name="birth_mark_description2" class="form-control" placeholder="Birth Mark"/>
                                </div>

                                <div class="form-group">
                                    <label for="#">Birth Mark Description 3</label>
                                    <input type="text" id="birth_mark_description3" name="birth_mark_description3" class="form-control" placeholder="Birth Mark"/>
                                </div>

                                <div class="form-group">
                                    <label for="#">Birth Mark Description 4</label>
                                    <input type="text" id="birth_mark_description4" name="birth_mark_description4" class="form-control" placeholder="Birth Mark"/>
                                </div>

                                <div class="form-group">
                                    <label for="#">Other Descriptions</label>
                                    <textarea class="form-control" id="other_description" name="other_description" rows="3" placeholder="Other Descriptions"></textarea>
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
                <h4>Registered Criminals</h4>
            </div>
            <!-- END PANEL HEADING -->
            <div class="panel-body">
                <div class="form-group form-horizontal">

                </div>

                <table class="table table-hover display" role="form" action="post"  id="criminal_select_table">
                    <thead>
                    <tr>
                        <th value="Person ID">ID</th>
                        <th value="Name">Criminal Name</th>
                        <th value="D.O.B">Date Of Birth</th>
                        <th value="crime_description">Crime Description</th>
                        <th value="crime_date">Crime Date</th>
                        <th value="place">Crime Place</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($criminals as $criminal)
                        <tr>
                            <td>
                                {{ $criminal->person_id}}
                            </td>
                            <td>
                                {{ $criminal->full_name }}
                            </td>
                            <td>
                                {{ $criminal->date_of_birth }}
                            </td>
                            <td>
                                {{ $criminal->description }}
                            </td>
                            <td>
                                {{ $criminal->crime_date}}
                            </td>
                            <td>
                                {{ $criminal->crime_place_name}}
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

        $("#criminal_select_table tr").click(function(){
            var idSelected =$(this).find('td:first').html();

            $('#person_id').val(idSelected.replace(/\s+/g,' ').trim()).html();

        });
    </script>
@endsection