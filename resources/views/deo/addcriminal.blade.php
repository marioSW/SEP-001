@extends('deo.dashboard.deo_panel')
@section('content')
    <form class="form-inline" role="form" method="POST" action="{{url('criminal/confirm')}}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <table width="95%" border="0" class="main_table">
            <tr height="30">
                <td height="44" >&nbsp;</td>
                <td height="30" colspan="6" ><div class="widgetbox box-inverse">
                        <h4 class="widgettitle">Dangerous characters and Reconvicted criminals</h4>

                    </div></td>
            </tr>



            <tr height="50">
                <td width="10%" colspan="2" >&nbsp;</td>
                <td width="15%"  >
                    <p class="textstyle"> <label for="name">Criminal Entry Date  </label></p></td>
                <td width="30%"><input type="date" class="form-control" name="criminal_entry_date" placeholder="Criminal Entry Date">  </td>
                <td width="1%">&nbsp;</td>
                <td width="15%"><p class="textstyle"> <label for="name">Police Station</label></p></td>
                <td width="35%"><input type="text" class="form-control"  name="police_station" placeholder="Police Station"></td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><label for="exampleInputName2"><p class="textstyle"> <label for="name">District</label></p></td>
                <td><input type="text" class="form-control" placeholder="District" name="district"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Criminal First Name </label></p></td>
                <td><input type="text" class="form-control"  placeholder="Criminal first Name " name="criminal_f_name"> </td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td height="50"><p class="textstyle"> <label for="name">Criminal Surname </label></p></td>
                <td><input type="text" class="form-control"  placeholder="Criminal Surname Name " name="criminal_s_name"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Criminal Family Name </label></p></td>
                <td><input type="text" class="form-control"  placeholder="Criminal Family Name " name="criminal_fam_name"></td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><p class="textstyle"> <label for="name">Father Name</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Father Name" name="father_name"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Birthplace </label></p></td>
                <td><input type="text" class="form-control"  placeholder="Birthplace" name="birthplace"></td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><p class="textstyle"> <label for="name">Nationality</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Nationality" name="nationality"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Cast</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Cast" name="cast"></td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><p class="textstyle"> <label for="name">Trade/Profession </label></p></td>
                <td><input type="text" class="form-control"  placeholder="Trade/Profession" name="trade_profession"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Property</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Property" name="property"></td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><p class="textstyle"> <label for="name">Date Of Birth</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Date Of Birth" name="date_of_birth"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Residence</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Residence" name="residence"></td>

            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><p class="textstyle"> <label for="name">Marital status</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Marital status" name="maried_or_single"></td>
                <td>&nbsp;</td>
                <td><p class="textstyle"> <label for="name">Relation And Associates</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Relation And Associates" name="relations_and_associates"></td>
            </tr>

            <tr height="50">
                <td colspan="2">&nbsp;</td>
                <td ><p class="textstyle"> <label for="name">Haunts Police District <br> Or Village Name</label></p></td>
                <td><input type="text" class="form-control"  placeholder="Haunts Police District" name="fhaunts_police_district_village"></td>
                <td>&nbsp;</td>

            </tr>


            <tr>
                <td colspan="2">&nbsp;</td>
                <td height="60"><label for="exampleInputName2"></label></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td width="30%" align="right"><input type="submit" class="submit" align="left" value="Insert Criminal" ></td>
            </tr>
        </table>

    </form>

@endsection