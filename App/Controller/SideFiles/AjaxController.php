<?php
require _model.'SideFiles/AjaxModels.php';

use \App\Controller\Controller\MainController ;
use \App\Model\SideFiles\AjaxModels\AjaxModels;

class AjaxController extends MainController{
    /*
        *    Kullanım öğrneği ;
        *       public function @RouterViewFunction($Data=null){
        *            return self::View('Home.index',['data'=>$Data]);
        *            // İlk değer olarak gitmek istediğin klasör yolunu belirtiyorsun. Eğer klasör içeriğine ulaşacaksan "." işaretini
        *            kullanıyorsun "klasör.renderEtmekİstediğinDosya".
        *       }
    */
    public $Model;
    public function __construct(){
        $this->Model = new AjaxModels();
    }

    public function AddSeason($Data){
        $Data = $this->GetDataCustom($Data,['seasonName']);
        $Season = $Data[0][1];
        $Result = $this->Model->SeasonAdd($Season);
        if($Result){
            return http_response_code(202);
        }else{
            return http_response_code(204);
        }
    }

    public function AddClass($Data){
        $Data = $this->GetDataCustom($Data,['ClassName','seasonID']);
        $ClassName = $Data[0][1];
        $SeasonID = $Data[1][1];
        $Result = $this->Model->ClassAdd($SeasonID,$ClassName);
        if($Result){
            return http_response_code(202);
        }else{
            return http_response_code(204);
        }
    }

    public function DeleteClass($Data){
        $Data = $this->GetDataCustom($Data,['classID','seasonID']);
        
        $SeasonID = $Data[1][1];
        $ClassID = $Data[0][1];
        $ResultData = $this->Model->ClassDelete($ClassID,$SeasonID);
        if($ResultData){
            return http_response_code(202);
        }else{
            return http_response_code(204);
        }
    }

    public function AddStudent($Data){
        $Data = $this->GetDataCustom($Data,['Change','ClassID','SeasonID','StudentName','StudentSurname','StudentTc','StudentMtName','StudentMtNumber','StudentFtName','StudentFtNumber','StudentOName','StudentONumber']); 
        $CustomArray = [
            'Activity' => $Data[0][1],
            'ClassId' => intval($Data[1][1]),
            'SeasonId'=> intval($Data[2][1]),
            'Name'=>$Data[3][1],
            'SurName'=>$Data[4][1],
            'Tc'=>intval($Data[5][1]),
            'MotherName'=>$Data[6][1],
            'MotherNumber'=>intval($Data[7][1]),
            'FatherName'=>$Data[8][1],
            'FatherNumber'=>intval($Data[9][1]),
            'OtherNick'=>$Data[10][1],
            'OtherNumber'=>intval($Data[11][1])
        ];
        $Result = $this->Model->StudentActivity($CustomArray);
        if($Result){
            return http_response_code(202);
        }else{
            return http_response_code(204);
        }
    }

    public function SearchStudent($Data){
        $Data = $this->GetDataCustom($Data,['keyValue','seasonValue']);
        $Result = $this->Model->LikeStudentName($Data[0][1],$Data[1][1]);
        // var_dump($Result);
        echo json_encode($Result);
    }

    public function EditStudent($Data){
        $Data = $this->GetDataCustom($Data,['Change','StudentID','SeasonID','StudentName','StudentSurname','StudentTc','StudentMtName','StudentMtNumber','StudentFtName','StudentFtNumber','StudentOName','StudentONumber']); 
        $CustomArray = [
            'Activity' => $Data[0][1],
            'StudentId'=>$Data[1][1],
            'SeasonId'=> intval($Data[2][1]),
            'Name'=>$Data[3][1],
            'SurName'=>$Data[4][1],
            'Tc'=>intval($Data[5][1]),
            'MotherName'=>$Data[6][1],
            'MotherNumber'=>intval($Data[7][1]),
            'FatherName'=>$Data[8][1],
            'FatherNumber'=>intval($Data[9][1]),
            'OtherNick'=>$Data[10][1],
            'OtherNumber'=>intval($Data[11][1])
        ];
        $Result = $this->Model->StudentActivity($CustomArray);
        if($Result){
            return http_response_code(202);
        }else{
            return http_response_code(204);
        }
    }

    public function DeleteStudent($Data){
        $Data = $this->GetDataCustom($Data,['s']);
        if(!empty($Data)){
            $Result = $this->Model->DeleteStudent($Data[0][1]);
            if($Result){
                return http_response_code(202);
            }else{
                return http_response_code(204);
            }
        }else{
            return http_response_code(204);
        }
    }

    public function AddDues($Data){
        $Data = $this->GetDataCustom($Data,['st','amo','da','id']);
        $Data[1][1] = intval($Data[1][1]);
        if(!empty($Data)){
            $Result = $this->Model->AddDues(['StudentId'=>$Data[0][1],'Amount'=>$Data[1][1],'Date'=>$Data[2][1],'Id'=>$Data[3][1]]);
            if($Result){
                return http_response_code(202);
            }else{
                return http_response_code(204);
            }
        }else{
            return http_response_code(204);
        }
    }
}