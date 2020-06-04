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

        $ReturnData = $this->RowCount('SELECT * FROM newnerimanhasim.period WHERE season=:ColumnName',['ColumnName'=>$Season]);
        if($ReturnData > 0){
            return false;
        }else{
            return $this->AddData('INSERT INTO newnerimanhasim.period (public_id,season) VALUES (?,?)',[$PublicId,$Season]);
        }

    }

    public function ClassAdd($SeasonID,$ClassName){
  
        $PublicId = $this->RandomKey('newnerimanhasim.class','public_id');

        $ReturnData = $this->RowCount('SELECT * FROM newnerimanhasim.class WHERE class_name=:ColumnName AND season_id=:SeasonID',[':ColumnName'=>$ClassName,':SeasonID'=>$SeasonID]);
        if($ReturnData > 0){
            return false;
        }else{
            return $this->AddData('INSERT INTO newnerimanhasim.class (public_id,class_name,season_id) VALUES (?,?,?)',[$PublicId,$ClassName,$SeasonID]);
        }

    }

    public function ClassDelete($ClassID,$SeasonID){
        $ReturnData = $this->RowCount('SELECT * FROM newnerimanhasim.class WHERE public_id=:ColumnName AND season_id=:SeasonID',[':ColumnName'=>$ClassID,':SeasonID'=>$SeasonID]);        

        if($ReturnData > 0){
            $DeleteClass = $this->DeleteData('DELETE FROM newnerimanhasim.class WHERE public_id=:PublicID AND season_id=:SeasonID',[':PublicID'=>$ClassID,':SeasonID'=>$SeasonID]);

            return $DeleteClass;
        }else{
            return false;
        }
    }
}