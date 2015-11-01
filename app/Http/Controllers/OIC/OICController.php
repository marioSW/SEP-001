<?php

namespace App\Http\Controllers\Oic;

use App\Case_file;
use Illuminate\Http\Request;

use DB;
use App\Gcr;
use App\Email;
use App\Crime;
use App\Http\Requests\UpdateRequest;

use App\User;
use App\PersonalInfo;
use Illuminate\Support\Facades\Auth;
use App\UserResponsibleCaseFile;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;


class OICController extends Controller
{
    function getDashboard()
    {
        $current_month = date('m');
        $current_year = date('Y');
        $so_status = 'Solved';
        $pe_status = 'Pending';


        //Month
        //Caluculate the no of reported files for current month

        $reported_m_ = DB::select('SELECT COUNT(file_no) as re_files FROM case_files WHERE MONTH(file_created_date)= ?',[$current_month]);
        $tot_reported_m = array_pluck($reported_m_,'re_files');
        $reported_m = $tot_reported_m[0];

        //Caluculate the no of solved files for current month

        $solved_m_ = DB::select("SELECT COUNT(file_no) as so_files FROM case_files WHERE status = '$so_status' AND MONTH(resolved_date)= ?",[$current_month]);
        $tot_solved_m = array_pluck($solved_m_,'so_files');
        $solved_m = $tot_solved_m[0];

        //Caluculate the no of solved files for current month

        $pending_m_ = DB::select("SELECT COUNT(file_no) as so_files FROM case_files WHERE status = '$pe_status' AND MONTH(file_created_date)= ?",[$current_month]);
        $tot_pending_m = array_pluck($pending_m_,'so_files');
        $pending_m = $tot_pending_m[0];


        //Year
        //Caluculate the no of reported files for current month

        $reported_y_ = DB::select('SELECT COUNT(file_no) as re_files FROM case_files WHERE YEAR(file_created_date)= ?',[$current_year]);
        $tot_reported_y = array_pluck($reported_y_,'re_files');
        $reported_y = $tot_reported_y[0];

        //Caluculate the no of solved files for current month


        $solved_y_= DB::select("SELECT COUNT(file_no) as so_files FROM case_files WHERE status = '$so_status' AND YEAR(resolved_date)= ?",[$current_year]);
        $tot_solved_y = array_pluck($solved_y_,'so_files');
        $solved_y = $tot_solved_y[0];

        //Caluculate the no of solved files for current month

        $pending_y_ = DB::select("SELECT COUNT(file_no) as so_files FROM case_files WHERE status = '$pe_status' AND YEAR(file_created_date)= ?",[$current_year]);
        $tot_pending_y = array_pluck($pending_y_,'so_files');
        $pending_y = $tot_pending_y[0];

        //Today
        $today = date("Y-m-d");
        //Today Crimes Reported Details

        $today_reported = DB::select("SELECT * FROM case_files WHERE file_created_date = '$today' AND status='Pending' ");

        //Toady crimes Solved Details
        $today_solved =  DB::select("SELECT * FROM case_files WHERE resolved_date = '$today' AND status='Solved' ");



        //Last Year
        //January
        $last_year = $current_year - 1 ;
        $re_jan_=DB::select("SELECT count(file_no) as rep_jan_files FROM case_files WHERE MONTH(file_created_date)='01' and YEAR(file_created_date) = '$last_year'");
        $tot_jan = array_pluck($re_jan_,'rep_jan_files');
        $rep_jan = $tot_jan[0];

        //February

        $re_feb_=DB::select("select count(file_no)as rep_feb_files from case_files where MONTH(file_created_date)='02' and YEAR(file_created_date) = '$last_year'");
        $tot_feb = array_pluck($re_feb_,'rep_feb_files');
        $rep_feb = $tot_feb[0];

        //March
        $re_mar_=DB::select("select count(file_no)as rep_mar_files from case_files where MONTH(file_created_date)='03' and YEAR(file_created_date) = '$last_year'");
        $tot_mar = array_pluck($re_mar_,'rep_mar_files');
        $rep_mar = $tot_mar[0];

        //April
        $re_apr_=DB::select("select count(file_no)as rep_apr_files from case_files where MONTH(file_created_date)='04' and YEAR(file_created_date) = '$last_year'");
        $tot_apr = array_pluck($re_apr_,'rep_apr_files');
        $rep_apr = $tot_apr[0];

        //May
        $re_may_=DB::select("select count(file_no)as rep_may_files from case_files where MONTH(file_created_date)='05' and YEAR(file_created_date) = '$last_year'");
        $tot_may = array_pluck($re_may_,'rep_may_files');
        $rep_may = $tot_may[0];

        //June
        $re_jun_=DB::select("select count(file_no)as rep_jun_files from case_files where MONTH(file_created_date)='06' and YEAR(file_created_date) = '$last_year'");
        $tot_jun = array_pluck($re_jun_,'rep_jun_files');
        $rep_jun = $tot_jun[0];

        //July
        $re_jul_=DB::select("select count(file_no)as rep_jul_files from case_files where MONTH(file_created_date)='07' and YEAR(file_created_date) = '$last_year'");
        $tot_jul = array_pluck($re_jul_,'rep_jul_files');
        $rep_jul = $tot_jul[0];

        //August
        $re_aug_=DB::select("select count(file_no)as rep_aug_files from case_files where MONTH(file_created_date)='08' and YEAR(file_created_date) = '$last_year'");
        $tot_aug = array_pluck($re_aug_,'rep_aug_files');
        $rep_aug = $tot_aug[0];

        //September
        $re_sep_=DB::select("select count(file_no)as rep_sep_files from case_files where MONTH(file_created_date)='09' and YEAR(file_created_date) = '$last_year'");
        $tot_sep = array_pluck($re_sep_,'rep_sep_files');
        $rep_sep = $tot_sep[0];

        //October
        $re_oct_=DB::select("select count(file_no)as rep_oct_files from case_files where MONTH(file_created_date)='10' and YEAR(file_created_date) = '$last_year'");
        $tot_oct = array_pluck($re_oct_,'rep_oct_files');
        $rep_oct = $tot_oct[0];

        //November
        $re_nov_=DB::select("select count(file_no)as rep_nov_files from case_files where MONTH(file_created_date)='11' and YEAR(file_created_date) = '$last_year'");
        $tot_nov = array_pluck($re_nov_,'rep_nov_files');
        $rep_nov = $tot_nov[0];

        //December
        $re_dec_=DB::select("select count(file_no)as rep_dec_files from case_files where MONTH(file_created_date)='12' and YEAR(file_created_date) = '$last_year'");
        $tot_dec = array_pluck($re_dec_,'rep_dec_files');
        $rep_dec = $tot_dec[0];

        //Getting Count of mail received

        $email = Auth::user()->email;
        $count = Email::where('receiver_email',$email )->count();


        return view('OIC.dashboard.dashboard_nav',compact('pending_m','solved_m','reported_m','pending_y','solved_y','reported_y','current_year',
            'today_reported','today_solved','rep_jan','rep_feb','rep_mar','rep_apr','rep_may','rep_jun','rep_jul','rep_aug','rep_sep','rep_oct','rep_nov','rep_dec','count'));
    }

    function getSearchCaseFile()
    {
        $case_files = DB::select("SELECT * FROM case_files");
        return view('OIC.case_file_Search',compact('case_files'));
    }

    public function persontable()
    {
        $persons = PersonalInfo::all();
        return view('OIC.table_persons' ,compact('persons'));
    }



    public function crimetable()
    {
        $crime=crime::all();

        return view('OIC.table_crimes',compact('crime'));

    }

    public function gcrtable()
    {
        $GCR=Gcr::all();

        return view('OIC.table_gcr',compact('GCR'));


    }

    public function assignCasesIndex()
    {
        $crimes=Crime::all();
        $officers=User::all();

        return view('OIC.assign_policecases',compact('crimes','officers'));
    }

    public function assignCasesCreate(Request $request)
    {
        //$name=$request->input('person_id');
        //$policeStation=Input::get('police_station');
        //$case=$request->input('case_file_no');

       // $station=Input::get('police_station');
       // $Officer=Input::get('person_id');
        //$case=Input::get('case_file_no');

        //$success=UserResponsibleCaseFile::create(['person_id'=>$name,'police_station'=>$policeStation,'case_file_no'=>$case]);

        $person =Request::all();
        $success=UserResponsibleCaseFile::create($person);

        $crimes=Crime::all();
        $officers=User::all();

        if($success != null) {

            session()->flash('success',"Successfully updated the data base");
            return view('OIC.assign_policecases',compact('crimes','officers'));
        }
        else{
            session()->flash('fail',"Failed to update the data base please try again");
            return view('OIC.assign_policecases',compact('crimes','officers'));
        }
       // return view('OIC.assign_policecases',compact('crimes','officers'));
    }
	
//Update status of the case file
    public function pendingCasefiles()
    {
        //$status = "Gaya";
        $file = "lol";
        $CaseFile = DB::select("SELECT * FROM case_files cf,crimes c,crime_lists cl WHERE cf.file_no=c.case_file_no AND c.crime_list_no=cl.list_no AND cf.status='Pending'") ;

        return view('OIC.update_status_case_file',compact('CaseFile','file'));
    }




    public function edit($file_no)
    {
        $cur_date = date('Y-m-d');
        $case_file = DB::table('case_files')->where('file_no',$file_no)->first();
        return view('OIC.update_status',compact('case_file','cur_date'));
    }

    public function update(UpdateRequest $request)
    {
        $post = $request->all();
        $data = array(
            'designated_file_no' => $post['designated_file_no'],
            'status' => $post['status'],
            'resolved_date' => $post['resolved_date'],

        );
        $i = DB::table('case_files')->where('file_no',$post['file_no'])->update($data);
        if($i>0)
        {
            $request->session()->flash('success',"Successfully closed the case file");
            return redirect('oic/pending_case_files');
        }



    }

}
