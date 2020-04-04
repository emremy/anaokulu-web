<?php

namespace App\Model\SideFiles\AjaxModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class AjaxModels extends MainModels{
    public function SeasonAdd($Season){
        $PublicId = $this->RandomKey('period','public_id');
        return $this->AddData('INSERT INTO period (public_id,season) VALUES (?,?)',[$PublicId,$Season]);
    }
}