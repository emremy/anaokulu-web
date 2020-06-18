<?php
namespace App\Model\SideFiles\DuesModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class DuesModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }

}