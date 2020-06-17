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
            if($DeleteClass){
                $ReturnInfo = $this->RowCount('SELECT * FROM newnerimanhasim.studentinfo WHERE class_id=:ColumnName AND period_id=:SeasonID',[':ColumnName'=>$ClassID,':SeasonID'=>$SeasonID]);
                if($ReturnInfo > 0){
                    $DeleteInfo = $this->DeleteData('DELETE newnerimanhasim.studentinfo,newnerimanhasim.students FROM newnerimanhasim.studentinfo INNER JOIN newnerimanhasim.students WHERE students.public_id=studentinfo.student_id AND (class_id=:PublicID AND period_id=:SeasonID)',[':PublicID'=>$ClassID,':SeasonID'=>$SeasonID]);
                    return $DeleteInfo;
                }else{
                    return true;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function StudentActivity($Array){

        if($Array['Activity'] == 'add'){
            
            $CheckStudent = $this->RowCount('SELECT * FROM newnerimanhasim.students WHERE name=:CName AND tcno=:TC',[':CName'=>$Array['Name'],':TC'=>$Array['Tc']]);
            if($CheckStudent > 0){
                $Result = $this->ListData('SELECT public_id FROM newnerimanhasim.students WHERE name=:CName AND surname=:SurName AND tcno=:TC',['CName'=>$Array['name'],'SurName'=>$Array['SurName'],'TC'=>$Array['Tc']]);
                $PublicId = $Result[0]['public_id'];

            }else{
                $PublicId = $this->RandomKey('newnerimanhasim.students','public_id');
            }
            $CheckTc = $this->RowCount('SELECT * FROM newnerimanhasim.students WHERE tcno=:TC',[':TC'=>$Array['Tc']]);
            if($CheckTc > 0){
                return false;
            }
            $StundetInfo = $this->RandomKey('newnerimanhasim.studentinfo','public_id');
            $ClassId = $Array['ClassId'];
            $SeasonId = $Array['SeasonId'];
            $InsertStudentInfo = $this->AddData('INSERT INTO newnerimanhasim.studentinfo (public_id,student_id,class_id,period_id) VALUES (?,?,?,?)',[$StundetInfo,$PublicId,$ClassId,$SeasonId]);
            if($InsertStudentInfo && $CheckStudent != 1){
                $StudentsAdd = $this->AddData('INSERT INTO newnerimanhasim.students (public_id,name,surname,tcno,mtname,mtnumber,ftname,ftnumber,othername,othernumber) VALUES (?,?,?,?,?,?,?,?,?,?)',[$PublicId,$Array['Name'],$Array['SurName'],$Array['Tc'],$Array['MotherName'],$Array['MotherNumber'],$Array['FatherName'],$Array['FatherNumber'],$Array['OtherNick'],$Array['OtherNumber']]);
                $Months = [
                    'EYLÜL',
                    'EKİM',
                    'KASIM',
                    'ARALIK',
                    'OCAK',
                    'ŞUBAT',
                    'MART',
                    'NİSAN',
                    'MAYIS',
                    'HAZİRAN'
                ];
                $CheckerData = false;
                for($i=0;$i<=9;$i++){
                    $DuesID = $this->RandomKey('newnerimanhasim.dues','public_id');
                    $DuesAdd = $this->AddData('INSERT INTO newnerimanhasim.dues (public_id,student_id,mountly) VALUES (?,?,?)',[$DuesID,$PublicId,$Months[$i]]);
                    if(!$DuesAdd){
                        $CheckerData = true;
                    }
                }
                if($CheckerData){
                    $this->DeleteData('DELETE FROM newnerimanhasim.students WHERE public_id=?',[$PublicId]);
                    $this->DeleteData('DELETE FROM newnerimanhasim.stundetinfo WHERE stundet_id=?',[$PublicId]);
                    $CheckDues = $this->RowCount('SELECT * FROM newnerimanhasim.dues WHERE stundet_id=?',[$PublicId]);
                    if($CheckDues > 0){
                        $this->DeleteData('DELETE FROM newnerimanhasim.dues WHERE stundet_id=?',[$PublicId]);
                    }
                    return true;
                }else{
                    if($DuesAdd){
                        return true;
                    }else{
                        return false;
                    }
                }
            }else{
                return $InsertStudentInfo;
            }
        }else if($Array['Activity'] == 'edit'){
            $CheckStudent = $this->RowCount('SELECT * FROM newnerimanhasim.students WHERE public_id=?',[$Array['StudentId']]);
            if($CheckStudent > 0){
                $Data = [$Array['Name'],$Array['SurName'],$Array['Tc'],$Array['MotherName'],$Array['MotherNumber'],$Array['FatherName'],$Array['FatherNumber'],$Array['OtherNick'],$Array['OtherNumber'],$Array['StudentId']];
                return $this->UpdateData('UPDATE newnerimanhasim.students SET name=?,surname=?,tcno=?,mtname=?,mtnumber=?,ftname=?,ftnumber=?,othername=?,othernumber=? WHERE public_id=?',$Data);
            }
        }
    }

    public function LikeStudentName($Key,$SeasonId){
        if(is_numeric($Key)){
            $Key = intval($Key);
            $ListStudentInfo = $this->ListData('SELECT st.* FROM newnerimanhasim.students AS st RIGHT JOIN newnerimanhasim.studentinfo AS sti ON st.public_id = sti.student_id WHERE sti.period_id=? AND tcno LIKE ?',[$SeasonId,"%$Key%"]);
            if($ListStudentInfo){
                for ($i=0; $i < count($ListStudentInfo); $i++) {
                    $ListStudentInfo[$i]['class_id'] = $this->ListData('SELECT class_id FROM newnerimanhasim.studentinfo WHERE period_id=? AND student_id=?',[$SeasonId,$ListStudentInfo[$i]['public_id']])[0]['class_id'];
                }
            }

        }else{
            $ListStudentInfo = $this->ListData('SELECT st.* FROM newnerimanhasim.students AS st RIGHT JOIN newnerimanhasim.studentinfo AS sti ON st.public_id = sti.student_id WHERE sti.period_id=? AND (name LIKE ? OR surname LIKE ?)',[$SeasonId,"%$Key%","%$Key%"]);
            if($ListStudentInfo){
                for ($i=0; $i < count($ListStudentInfo); $i++) {
                    $ListStudentInfo[$i]['class_id'] = $this->ListData('SELECT class_id FROM newnerimanhasim.studentinfo WHERE period_id=? AND student_id=?',[$SeasonId,$ListStudentInfo[$i]['public_id']])[0]['class_id'];
                }
            }
        }
        if($ListStudentInfo != false){

            return $ListStudentInfo;
        }else{
            return $ListStudentInfo;
        }
    }

    public function DeleteStudent($Key){
        $CheckStudent = $this->RowCount('SELECT st.* FROM newnerimanhasim.students AS st RIGHT JOIN newnerimanhasim.studentinfo AS sti ON st.public_id = sti.student_id WHERE sti.student_id=?',[$Key]);
        if($CheckStudent > 0){
            $DeleteData = $this->DeleteData('DELETE newnerimanhasim.studentinfo,newnerimanhasim.students FROM newnerimanhasim.studentinfo INNER JOIN newnerimanhasim.students WHERE students.public_id=studentinfo.student_id AND studentinfo.student_id=?',[$Key]);
            return $DeleteData;
        }
    }

    public function AddDues($Array){
        $CheckAmount = $this->RowCount('SELECT * FROM newnerimanhasim.dues WHERE student_id=? AND mountly=?',[$Array['StudentId'],$Array['Mountly']]);
        if($CheckAmount > 0){
            return $this->UpdateData('UPDATE newnerimanhasim.dues SET date=?,amount=? WHERE student_id=?',[$Array['Date'],$Array['Amount'],$Array['StudentId']]);
        }else{
            $DuesRandomId = $this->RandomKey('newnerimanhasim.dues','public_id');
            return $this->AddData('INSERT INTO newnerimanhasim.dues (public_id,student_id,date,amount,mountly) VALUES (?,?,?,?,?)',[$DuesRandomId,$Array['StudentId'],$Array['Date'],$Array['Amount'],$Array['Mountly']]);
        }
    }
}