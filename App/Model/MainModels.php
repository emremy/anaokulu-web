<?php
namespace App\Model\MainModel;

require _core.'Db/Database.php';

use \Core\Db\Database\Database;

class MainModels extends Database{
    public function customCreateTable(){
        $this->CreateTable('students',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'sname' => 'VARCHAR(25) NOT NULL',
            'surname' => 'VARCHAR(40) NOT NULL',
            'tcno' => 'BIGINT(11) NOT NULL UNIQUE',
            'mtname' => 'VARCHAR(25) NOT NULL',
            'mtnumber' => 'BIGINT(11) NOT NULL',
            'ftname' => 'VARCHAR(25) NOT NULL',
            'ftnumber' => 'BIGINT(11) NOT NULL',
            'othername' => 'VARCHAR(25)',
            'othernumber' => 'BIGINT(11)',
            'create_time'=>'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->CreateTable('studentInfo',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL',
            'student_id' => 'INT(6) NOT NULL',
            'class_id' => 'INT(6) NOT NULL',
            'period_id' => 'INT(6) NOT NULL',
            'create_time' => 'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP'
        ]);
        $this->CreateTable('dues',[
            'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
            'public_id' => 'INT(6) NOT NULL UNIQUE',
            'student_id' => 'INT(6) NOT NULL',
            'create_time' => 'datetime NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'date' => 'VARCHAR(10)',
            'amount'=>'VARCHAR(10)',
            'mountly'=>'VARCHAR(20) NOT NULL',
            'list_id'=>'INT(8) NOT NULL',
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

    public function RandomKey($TableName,$Column){
        while(true){
            $RandomKey = rand(1,99999);
            $Count = $this->RowCount("SELECT COUNT(*) FROM $TableName WHERE $Column=:ColumnName",['ColumnName'=>$RandomKey]);
            if($Count == 0){
                break;
            }
        }
        return $RandomKey;
    }
    public function GetSeason(){
        $Array = array();
        $Result = $this->ListData('SELECT season,public_id FROM newnerimanhasim.period');
        if(!empty($Result)){
            for($i=0;$i<count($Result);$i++){
                $Array[$Result[$i]['season']] = $Result[$i]['public_id'];
            }
            return $Array;
        }
    }
    public function GetSingleSeason($Data){
        $Result = array();
        $InfoSeason = $this->ListData("SELECT season,public_id,create_time FROM newnerimanhasim.period WHERE public_id=:ID",[':ID'=>$Data]);
        $InfoClass = $this->ListData("SELECT public_id,class_name FROM newnerimanhasim.class WHERE season_id=:ID ORDER BY class_name ASC",[':ID'=>$Data]);
        $Result['class'] = $InfoClass;
        $Result['seasonName'] = $InfoSeason;
        return $Result;
    }

    public function GetSeasonStudentCount($Data){
        return $this->Counter('SELECT * FROM newnerimanhasim.studentinfo WHERE period_id=?',[$Data]);
    }
    public function GetMonthDues(){
        setlocale(LC_TIME, 'turkish');
        setlocale(LC_ALL,'turkish');
        $Date = strtoupper(strftime('%B'));
        $Count = $this->Counter('SELECT * FROM newnerimanhasim.dues WHERE mountly=? AND amount IS NOT NULL',[$Date]);
        return ['Date'=>$Date,'Count'=>$Count];
    }
}