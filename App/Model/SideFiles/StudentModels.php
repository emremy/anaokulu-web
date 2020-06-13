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
            $Class = $this->ListData('SELECT * FROM newnerimanhasim.class WHERE public_id=:PublicId',['PublicId'=>$Data[2]]);
            $Season = $this->ListData('SELECT * FROM newnerimanhasim.period WHERE public_id=:PublicId',['PublicId'=>$Data[1]]);
            $CustomArray = [
                'Student' => $Student[0],
                'Class' => $Class[0]['class_name'],
                'Season' => $Season[0]['season']
            ];
            foreach ($CustomArray as $key => $value) {
                if(empty($value)){
                    return false;
                }
            }
            return true;
        }else{
            return false;
        }
    }
}