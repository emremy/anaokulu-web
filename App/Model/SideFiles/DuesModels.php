<?php
namespace App\Model\SideFiles\DuesModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class DuesModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }

    public function GetStudentsInfo($Season,$Mounth){
        $DuesInfo = $this->ListData('SELECT * FROM newnerimanhasim.dues WHERE season_id=? AND mountly=? AND amount IS NULL',[$Season,$Mounth]);
        for($i=0;$i<count($DuesInfo);$i++){
            $Result = $this->ListData('SELECT * FROM newnerimanhasim.students WHERE public_id=?',[$DuesInfo[$i]['student_id']]);
        }
        var_dump($Result);
    }
}