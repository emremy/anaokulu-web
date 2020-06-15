<?php
namespace App\Model\SideFiles\StudentModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class StudentModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }
    public function GetSingleStudent($Data=[]){
        $Count = $this->RowCount('SELECT * FROM newnerimanhasim.students WHERE public_id=:PublicId',['PublicId'=>$Data[0]]);
        if($Count > 0){
            $Student = $this->ListData('SELECT * FROM newnerimanhasim.students WHERE public_id=:PublicId',['PublicId'=>$Data[0]]);
            $Class = $this->ListData('SELECT class_name,public_id FROM newnerimanhasim.class WHERE public_id=:PublicId ORDER BY create_time DESC',['PublicId'=>$Data[2]]);
            $Season = $this->ListData('SELECT season,public_id FROM newnerimanhasim.period WHERE public_id=:PublicId',['PublicId'=>$Data[1]]);
            $StudentInfo = $this->ListData('SELECT * FROM newnerimanhasim.studentinfo WHERE student_id=:StudentId',['StudentId'=>$Data[0]]);
            $CustomArray = [
                'Student' => $Student[0],
                'Class' => $Class[0],
                'Season' => $Season[0]['season'],
            ];
            foreach ($CustomArray as $key => $value) {
                if(empty($value)){
                    return false;
                }
            }
            return $CustomArray;
        }else{
            return false;
        }
    }
    public function GetSingleSeason($Data){
        $Result = array();
        $InfoSeason = $this->ListData("SELECT season,public_id,create_time FROM newnerimanhasim.period WHERE public_id=:ID",[':ID'=>$Data]);
        $InfoClass = $this->ListData("SELECT public_id,class_name FROM newnerimanhasim.class WHERE season_id=:ID ORDER BY class_name ASC",[':ID'=>$Data]);
        $Result['class'] = $InfoClass;
        $Result['seasonName'] = $InfoSeason;
        return $Result;
    }
}