<?php 
namespace Core\Db\Database;

use \PDO;

class Database{
    public $Pdo;
    private $Host = 'localhost';
    private $DatabaseName = 'newnermanhasim';
    private $DatabaseUser = 'root';
    private $DatabasePassword = '';
    private $Port = 3308;

    public function CreateTable($TableName,$Data=[]){
        $this->Pdo = new PDO("mysql:host=$this->Host;port=$this->Port;Dbname=$this->DatabaseName;charset=utf8", $this->DatabaseUser, $this->DatabasePassword);
        $this->Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($TableName == '' || empty($Data)){
            return false;
        }else{
            $Sql = "CREATE table IF NOT EXISTS newnerimanhasim.".$TableName."(";
            $i = 0;
            foreach ($Data as $Key => $Value) {
                $i++;
                if($i === count($Data)){
                    $Sql .= $Key." ".$Value.");";
                }else{
                    $Sql .= $Key." ".$Value.",\n";
                }

            };
            $this->Pdo->exec($Sql);
            $Sql = "";
            $this->Pdo = '';
        }
    }

    public function Connect(){
        $this->Pdo = new PDO("mysql:host=$this->Host;port=$this->Port;Dbname=$this->DatabaseName;charset=utf8", $this->DatabaseUser, $this->DatabasePassword);
        $this->Pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $this->Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function ListData($Sql,$Data=[]){
        $Prepare = $this->Pdo->prepare($Sql);
        if($Prepare->execute($Data)){
            while($Row = $Prepare->fetch(PDO::FETCH_ASSOC)){
                $PostData[] = $Row;
            }
            if(!empty($PostData)){
                return $PostData;
            }else{
                return false;
            }
        }else{  
            return false;
        }
    }

    public function AddData($Sql,$Data=[]){
        $Insert = $this->Pdo->prepare($Sql)->execute($Data);
        if($Insert){
            return true;
        }else{
            return false;
        }
    }

    public function RowCount($Sql,$Data=[]){
        $Result = $this->Pdo->prepare($Sql);
        $Result->execute($Data);
        if($Result->fetchColumn() > 0){
            return 1;
        }else{
            return false;
        }

    }

    public function Counter($Sql,$Data=[]){
        $Result = $this->Pdo->prepare($Sql);
        $Result->execute($Data);
        return $Result->rowCount();
    }

    public function DeleteData($Sql,$Data=[]){
        $Result = $this->Pdo->prepare($Sql);
        $Result->execute($Data);
        if($Result->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function UpdateData($Sql,$Data=[]){
        $Result = $this->Pdo->prepare($Sql)->execute($Data);
        if($Result){
            return true;
        }else{
            return false;
        }
    }
}