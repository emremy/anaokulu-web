<?php

namespace App\Model\SideFiles\AjaxModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class AjaxModels extends MainModels{

    public function __construct(){
        $this->customCreateTable();
    }

    public function SeasonAdd($Season){
  
        $PublicId = $this->RandomKey('newnerimanhasim.period','public_id');

        $ReturnData = $this->RowCount('SELECT * FROM newnerimanhasim.period WHERE season=:ColumnName',$Season);
        if($ReturnData > 0){
            return false;
        }else{
            return $this->AddData('INSERT INTO newnerimanhasim.period (public_id,season) VALUES (?,?)',[$PublicId,$Season]);
        }

    }
}