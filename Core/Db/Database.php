<?php 
namespace Core\Db\Database;

use \PDO;

class Database{
    public $Pdo;
    private $Host = 'localhost';
    private $DatabaseName = 'nermanhasim';
    private $DatabaseUser = 'root';
    private $DatabasePassword = '';
    private $Port = 3308;

    public function __construct(){
        $this->CreateTable('students',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'name' => 'VARCHAR(25) NOT NULL',
            'surname' => 'VARCHAR(40) NOT NULL',
            'tcno' => 'BIGINT(11) NOT NULL UNIQUE',
            'mtname' => 'VARCHAR(25) NOT NULL',
            'mtnumber' => 'BIGINT(11) NOT NULL',
            'ftname' => 'VARCHAR(25) NOT NULL',
            'ftnumber' => 'BIGINT(11) NOT NULL',
            'othername' => 'VARCHAR(25)',
            'othernumber' => 'BIGINT(11)'
        ]);
        $this->CreateTable('studentInfo',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'student_id' => 'INT(6) NOT NULL UNIQUE',
            'class_id' => 'INT(6) NOT NULL UNIQUE',
            'period_id' => 'INT(6) NOT NULL UNIQUE',
        ]);
        $this->CreateTable('dues',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'student_id' => 'INT(6) NOT NULL UNIQUE',
            'create_time' => 'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'date' => 'VARCHAR(10) NOT NULL',
            'amount'=>'VARCHAR(10) NOT NULL',
        ]);
        $this->CreateTable('period',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'season' => 'VARCHAR(10) NOT NULL UNIQUE',
            'create_time' => 'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->CreateTable('class',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'class_name' => 'VARCHAR(15) NOT NULL',
            'create_time' => 'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->Connect();
    }

    public function CreateTable($TableName,$Data=[]){
        $this->Pdo = new PDO("mysql:host=$this->Host;port=$this->Port;Dbname=$this->DatabaseName;charset=utf8", $this->DatabaseUser, $this->DatabasePassword);
        $this->Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if($TableName == '' || empty($Data)){
            return false;
        }else{
            $Sql = "CREATE table IF NOT EXISTS nerimanhasim.$TableName(";
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
    }

    public function AddData($Sql,$Data){
        $Insert = $this->Pdo->prepare($Sql)->execute($Data)->rowCount();
        if($Insert > 0){
            return true;
        }else{
            return false;
        }
    }

    public function RowCount($Sql,$Data){
        $Result = $this->Pdo->prepare($Sql);
        $Result->execute(array(':ColumnName'=>$Data));
        return $Result->fetchColumn();
    }
}