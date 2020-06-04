<?php
namespace App\Model\SideFiles\StudentsModels;

require _model.'MainModels.php';

use \App\Model\MainModel\MainModels;

class StudentsModel extends MainModels{
    public function __construct(){
        $this->customCreateTable();
    }
}