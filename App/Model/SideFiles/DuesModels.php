<?php
namespace App\Model\SideFiles\DuesModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class DuesModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }

    public function GetStudentsInfo($Season,$Mounth){
        $CheckData = $this->Counter('SELECT * FROM newnerimanhasim.dues WHERE season_id=? AND mountly=? AND amount IS NULL',[$Season,$Mounth]);
        if($CheckData > 0){
            $DuesInfo = $this->ListData('SELECT * FROM newnerimanhasim.dues WHERE season_id=? AND mountly=? AND amount IS NULL',[$Season,$Mounth]);
            for($i=0;$i<count($DuesInfo);$i++){
                $DuesResult['Result'][$i] = $DuesInfo[$i]['student_id'];  
            }
            for($i=0;$i<count($DuesResult['Result']);$i++){
                $Result['StudentInfo'][$i] = $this->ListData('SELECT * FROM newnerimanhasim.students WHERE public_id=?',[$DuesResult['Result'][$i]])[0];
                $ClassInfo = $this->ListData('SELECT * FROM newnerimanhasim.studentinfo WHERE student_id=? AND period_id=?',[$DuesResult['Result'][$i],$Season])[0]['class_id'];
                $ClassInfo = $this->ListData('SELECT * FROM newnerimanhasim.class WHERE public_id=?',[$ClassInfo]); 
                $Result['StudentInfo'][$i]['class_name'] = $ClassInfo[0]['class_name'];
                $Result['StudentInfo'][$i]['class_id'] = $ClassInfo[0]['public_id'];
            }
            return $Result['StudentInfo'];
        }else{
            return false;
        }

    }
}