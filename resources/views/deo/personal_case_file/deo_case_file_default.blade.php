@extends('deo.personal_case_file.deo_personal_case_file_master')
@section('content')
    <?php $value= $caseFileIdArr ?>

    <div class="row">
        <div class="col-md-5">
            <h2 class="text-info"><strong>Status</strong>  : {{$value[0].'->'.strtoupper($status) }} </h2>
        </div>
    </div>

    @if(Session('message'))
    <div class="row">
        <div class="alert alert-info">
            <p class="alert alert-info">{{ Session('message') }}</p>
        </div>
    </div>
    @elseif(Session('new'))
    <div class="row">
        <div class="alert alert-warning">
            <p class="label-warning">{{Session('new')}}</p>
            <p>Do you want to add this user?</p>
            <a href="{{url('deo/add/complainer')}}" class="btn btn-primary">Yes</a>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">Main Complainer

              <label class="btn btn-default" data-toggle="modal" data-target="#SearchModal"><i class="fa fa-font fa-plus"></i></label>
              </div>
              <div class="panel-body">
                <ol>
                @if($complainer_list != null)
                    @foreach($complainer_list as $complainer)

                        <li>{{$complainer["name"]}}</li>
                    @endforeach
                @endif
                </ol>
              </div>
            </div>
        </div>  <!-- END col-md-5 -->

        <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">Accused
              <label class="btn btn-default"><i class="fa fa-font fa-plus"></i></label>
              </div>
              <div class="panel-body">
                <ol>

                    @foreach($accused_list as $accused)
                        <li>{{$accused}}</li>
                    @endforeach

                </ol>
              </div>
            </div>
        </div>  <!-- END col-md-5 -->
    </div> <!-- END row -->

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Witnesses
                <label class="btn btn-default"><i class="fa fa-font fa-plus"></i></label>
                </div>
                <div class="panel-body">
                <ol>

                    @foreach($witnesses_list as $witness)
                        <li>{{$witness}}</li>
                    @endforeach

                </ol>
                </div>
            </div> <!-- END panel-default -->
        </div> <!-- col-md-6 col-md-offset-3 -->
    </div><!-- END row -->

 <!-- Modal Box To search -->

        <div class="modal fade" id="SearchModal" tabindex="-1" role="dialog" aria-labelledby="SearchModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="SearchModalLabel">Complaint Details</h4>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">

                                <form role="form" name="search" id="search" method="post" action="{{url('deo/myfiles/complainer')}}" >
                                {!! csrf_field() !!}
                                    <div class="form-group">
                                        <p class="textstyle"> <label for="search_name">Name</label></p>

                                            <input type="text" name="search_name" class="form-control" list="productName"/>
                                            <datalist id="productName">
                                            @foreach($all_complainers as $list)
                                             <option value="{{ $list["name"]}}">{{ $list["name"]}}</option>
                                            @endforeach
                                            </datalist>

                                    </div> <!-- form group search_name -->

                                    <div class="form-group">
                                        <p class="textstyle"> <label for="search_nic">NIC</label></p>
                                        <input type="text" class="form-control" id="search_nic" name="search_nic" placeholder="NIC"/>
                                    </div> <!-- form group search_nic -->

                                    <div class="form-group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Search"/>
                                    </div>
                                </form>
                            </div> <!-- row -->
                        </div> <!-- container fluid -->
                    </div> <!-- modal body -->

                    <div class="modal-footer">

                    </div> <!-- modal footer -->
                </div> <!-- modal content -->
            </div> <!-- modal dialog -->
        </div> <!-- modal fade -->

@endsection
