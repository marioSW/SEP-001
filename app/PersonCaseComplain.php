<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonCaseComplain extends Model
{
    protected $table='person_case_complains';

    public function getComplainers($fileNo){

        $complainer_list=DB::table('person_case_complains')->where('file_no',$fileNo)->lists('person_id');
        //var_dump($complainer_list);
        if(array_filter($complainer_list))
        {
            $personInfo=new PersonalInfo();
            $complainerNameArray=[];
            foreach($complainer_list as $complainer)
            {

                $name=$personInfo->getUserName($complainer);
                array_push($complainerNameArray,array('name'=>$name));

            }

            return $complainerNameArray;
        }
        else{
            return $complainer_list=array("no complainer added");
        }
    }

    /**
     *  Get the array of complainers details
     * @return array
     */
    public function getAllComplainers(){
        $complainerArray=[];
        $all_complainers=DB::table('person_case_complains')->select('person_id')->get();
        foreach($all_complainers as $complainer) {
            array_push($complainerArray,$this->getArrayOfComplainersDetails($complainer->person_id));
        }
            return $complainerArray;
    }

    /**
     * @param $personId
     * To get the basic details of the complainer
     * in a formatted array
     * @return array
     */
    private function getArrayOfComplainersDetails($personId){
        $personInfo=new PersonalInfo();
        $personNIC=PersonalInfo::where('person_id',$personId)->value('NIC');
        $personUserName=$personInfo->getUserName(($personId));
        $arrayOfComplainers=array('name'=>$personUserName,'nic'=>$personNIC);

        return $arrayOfComplainers;

    }
}
