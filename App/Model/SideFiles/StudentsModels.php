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
}