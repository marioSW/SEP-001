<?php

namespace App\Http\Controllers\Deo;

use App\Case_file;
use App\Http\Requests\addComplainerRequest;
use App\PersonalInfo;
use App\PersonCaseAccused;
use App\PersonCaseComplain;
use App\PersonCaseVitnesse;
use App\UserResponsibleCaseFile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class DeoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
            return view('deo.deo_dashboard');
    }

    /**
     * @return \Illuminate\View\View
     * goes to the view which displays the case Files for the deo
     */

    public function viewFiles(){
        $cf=new Case_file();    //Create Case_File Object
        $caseFiles="";
        $userId= Auth::user()->id;
        $userInfo=UserResponsibleCaseFile::where('person_id',$userId)->get();

        if(is_null($userInfo) || $userInfo === "")
        {
            session()->flash('non',"You Have No Case Files Assigned to you");
            return view('deo.deo_view_case_file');
        }
        else {
            $index_count = 0;
            foreach ($userInfo as $cases) {
                $designatedFileNo = $cf->getDesignatedFileValue($cases->case_file_no,"designated_file_no");
                $caseFiles[$index_count] = array($designatedFileNo, $cases->case_file_no); //insert to $caseFiles=> $designatedFileNo & case_file_no
                $index_count++;
            }

            Session::put('casefiles', $caseFiles);
            return view('deo.deo_view_case_file', compact('caseFiles'));
        }

    }


    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function openCaseFile($id){
        $cf=new Case_file();// Case_file object

        if(Session::has('casefiles')) {     //check if casefiles value is in the session
            $caseFileArr = Session::get('casefiles'); //get casefiles

            $this->addSelectedId($id);
            $caseFileIdArr = $caseFileArr[$id];

            $status=$cf->getDesignatedFileValue($caseFileIdArr[1],"status");

            /**
             * To get the list of Complainers for the relevant file
             */
            $complainer = new PersonCaseComplain(); //New Instance of Complainer Model
            $complainer_list=$complainer->getComplainers($caseFileIdArr[1]);
            $all_complainers=$complainer->getAllComplainers();

            /**
             * T0 get the list of Accused Persons for the relevant file
             */
            $accused=new PersonCaseAccused(); // New Instance of Accused Person Model
            $accused_list=$accused->getCAccused($caseFileIdArr[1]) ;
            //var_dump($caseFileIdArr[1]);
            /**
             * To get the list of relevant Witnesses for the Case File
             */
            $witnesses=new PersonCaseVitnesse(); // New Instance of Person case Witness
            $witnesses_list=$witnesses->getWitness($caseFileIdArr[0]);

            return view('deo.personal_case_file.deo_case_file_default', compact('caseFileIdArr','status',
                'complainer_list','all_complainers','accused_list','witnesses_list'));
        }
        else{
            Session::flash("Error","Sorry you don't have access to any Files");
            return Redirect::to('deo/dashboard');
        }
    }

    /**
     * @param $id
     * Adds the selected ID to a session variable
     */
    private function addSelectedId($id){

        if(Session::has('selectedId'))
        {
            Session::forget('selectedId');
        }

        Session::put('selectedId',$id);

    }

    /**
     * Returns the selected ID from the session
     */
    private function getSelectedId(){
        if(Session::has('selectedId'))
        {
            return Session::get('selectedId');
        }
        else{
            Session::flash("Error","Sorry you have to select a file first");
            return http_redirect(url('deo/dashboard'));
        }
    }

    /**
     * @param Request $request
     * Searches the form if the name or user name that was typed exists
     * @return Redirect
     *
     */
    public function searchForm(Request $request){
        $name=$request->search_name;
        $nic=$request->search_nic;

        $id=$this->getSelectedId();
        $result=$this->searchName($name,$nic);

        if(is_null($result))
        {
            Session::flash('new',''.$name.' , '.$nic.' Does not exists');
            return redirect('deo/myfiles/'.$id);
        }
        else
        {
            Session::flash('message','The Complainer was successfully added');
            return redirect('deo/myfiles/'.$id);
        }

    }

    /**
     * @param $name
     * @return mixed
     * Search for ID from the name/ NIC provided
     */
    private function searchName($name,$nic){
        $personInfo = new PersonalInfo();
        if(is_null($nic) || $nic="") {
            if (!is_null($name)) {
                $success = $personInfo->getUserId($name, 'full_name');
            }
            return $success;
        }
        else{
        $success=$personInfo->getUserId($nic,'NIC');
        return $success;
        }

    }

    /**
     * Redirecting to the location where the complainer details are added
     */
    public function addComplainer(){

        return view('deo.personal_case_file.deo_person_info_add');
    }
}
