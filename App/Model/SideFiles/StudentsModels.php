<?php
namespace App\Model\SideFiles\StudentsModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class StudentsModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }

    public function GetSingleSeason($Data){
        $Result = array();
        $InfoSeason = $this->ListData("SELECT season,public_id,create_time FROM newnerimanhasim.period WHERE public_id=:ID",[':ID'=>$Data]);
        $InfoClass = $this->ListData("SELECT public_id,class_name FROM newnerimanhasim.class WHERE season_id=:ID ORDER BY class_name ASC",[':ID'=>$Data]);
        $Result['class'] = $InfoClass;
        $Result['seasonName'] = $InfoSeason;
        return $Result;
    }

    public function GetClasses($ClassID){
        $Result = array();
        $CountStudent = $this->RowCount('SELECT * FROM newnerimanhasim.studentinfo WHERE class_id=:ClassID',[':ClassID'=>$ClassID]);
        $Result['ClassCount'] = $CountStudent;
        $ClassInfo = $this->ListData("SELECT class_name FROM newnerimanhasim.class WHERE public_id=:PublicID",[':PublicID'=>$ClassID]);
        $Result['ClassName'] = $ClassInfo[0]['class_name'];
        $StudentInfo = $this->ListData("SELECT st.* FROM newnerimanhasim.students AS st RIGHT JOIN newnerimanhasim.studentinfo as sti ON st.public_id = sti.student_id WHERE sti.class_id=:ClassID",[':ClassID'=>$ClassID]);
        $Result['Students'] = $StudentInfo;
        return $Result;
    }
}