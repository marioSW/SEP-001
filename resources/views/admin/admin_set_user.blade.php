@extends('admin.main_admin_panel')
@section('content')

    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4>Registered Users Information</h4>
            </div>
            <!-- END PANEL HEADING -->
            <div class="panel-body">
            <div class="form-group form-horizontal">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}

                    </div>
                @endif
            <form action="{{url('./admin/setusers')}}" method="post" >
            {!! csrf_field() !!}

                <div class="col-sm-2">
                <input type="text" id="sel_name" name="sel_name" class="form-control" value="Selected Name" readonly />
                </div>
                <div class="col-sm-2">
                <input type="text" id="sel_police_station" name="sel_police_station" class="form-control" value="Police Station" readonly/>
                </div>
                <div class="col-sm-4">
                <select id="selectbasic" name="selectbasic" class="form-control input-xlarge">
                    <option value="data-entry-operator">data-entry-operator</option>
                    <option value="officer-in-charge">officer-in-charge</option>
                    <option value="admin">admin</option>
                    <option value="assistant-superintendent-police">assistant-superintendent-police</option>
                    <option value="island-registered-criminal-officer">island-registered-criminal-officer</option>
                </select>
                </div>
                <div class="col-sm-3">
                    <input type="submit" value="submit" class="btn btn-primary">
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
                <table class="table table-hover display" role="form" action="post"  id="roles_select_table">
                    <thead>
                        <tr>
                            <th value="name">Name</th>
                            <th value="e-mail">E-mail</th>
                            <th value="police_station">Police Station</th>
                            <th value="role">Role</th>
                            <th value="created_date">Created Date</th>
                            <th value="updated_date">Updated Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $vals)
                    <tr>
                        <td>
                            {{ $vals['name'] }}
                        </td>
                        <td>
                            {{ $vals['email'] }}
                        </td>
                        <td>
                            {{ $vals['police_station'] }}
                        </td>
                        <td>
                            {{ $vals['role'] }}
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
    <!-- END ROW -->


<script type="text/javascript">

   $("#roles_select_table tr").click(function(){
      var nameSelected =$(this).find('td:first').html();
      var policeStationSelected= $(this).find('td:nth-child(3)').html();

      $('#sel_name').val(nameSelected.replace(/\s+/g,' ').trim()).html();

      $('#sel_police_station').val(policeStationSelected.replace(/\s+/g,' ').trim()).html();
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