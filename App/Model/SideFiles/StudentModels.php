<?php
namespace App\Model\SideFiles\StudentModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class StudentModels extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }
}