<?php
namespace App\Model\SideFiles\StudentsModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class StudentsModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
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