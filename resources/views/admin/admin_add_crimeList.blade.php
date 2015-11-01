@extends('admin.main_admin_panel')
@section('content')
<div class="col-md-5">
    <div class="panel panel-primary">

        <div class="panel-heading">
           <h4>Add Crime List</h4>
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
                        <form class="form-horizontal" method="post" action="{{url('admin/add_crime_list')}}">
                        {!! csrf_field()  !!}
                            <div class="form-group">
                                <label for="#list_no">List Number</label>
                                <input type="text" id="list_no" name="list_no" class="form-control" placeholder="List No."/>
                            </div>

                            <div class="form-group">
                                <label for="#crime_type">Crime Type</label>
                                <input type="text" id="crime_type" name="crime_type" class="form-control" placeholder="Crime Type"/>
                            </div>

                            <div class="form-group">
                                <label for="#crime_description">Crime Description</label>
                                <textarea id="crime_description" name="crime_description" class="form-control" rows="4" placeholder="Crime Description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="#crime_category">Crime Category</label>
                                <input type="text" id="crime_category" name="crime_category" class="form-control" placeholder="Crime Category"/>
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
            <h4>Registered Users Information</h4>
        </div>
        <!-- END PANEL HEADING -->
        <div class="panel-body">
        <div class="form-group form-horizontal">

         </div>

            <table class="table table-hover display" role="form" action="post"  id="roles_select_table">
                <thead>
                    <tr>
                        <th value="list_no">List No</th>
                        <th value="crime_type">Crime Type</th>
                        <th value="crime_description">Crime Description</th>
                        <th value="crime_category">Crime Category</th>
                        <th value="created_date">Created Date</th>
                        <th value="updated_date">Updated Date</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($data as $vals)
                <tr>
                    <td>
                        {{ $vals['list_no'] }}
                    </td>
                    <td>
                        {{ $vals['crime_type'] }}
                    </td>
                    <td>
                        {{ $vals['crime_description'] }}
                    </td>
                    <td>
                        {{ $vals['crime_category'] }}
                    </td>
                    <td>
                        {{ $vals['created_at'] }}
                    </td>
                    <td>
                        {{ $vals['updated_at'] }}
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

@endsection