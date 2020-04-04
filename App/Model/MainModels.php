<?php
namespace App\Model\MainModel;

require _core.'Db/Database.php';

use \Core\Db\Database\Database;

class MainModels extends Database{

    public function RandomKey($TableName,$Column){
        while(true){
            $RandomKey = rand(1,99999);
            $Count = $this->RowCount("SELECT COUNT(*) FROM $TableName WHERE $Column=:ColumnName",$RandomKey);
            if($Count == 0){
                break;
            }
        }
        return $RandomKey;
    }
}