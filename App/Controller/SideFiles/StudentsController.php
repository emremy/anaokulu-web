<?php
require _model.'SideFiles/StudentsModels.php';

use \App\Controller\Controller\MainController ;
use \App\Model\SideFiles\StudentsModels\StudentsModels;

class StudentsController extends MainController{
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
        $this->Model = new StudentsModels();
    }

    public function index($Data){
        $this->SessionChecker(true,false);
        $Data = $this->GetDataCustom($Data,['s','c']);
        $SeasonID = $Data[0][1];
        $ClassID = $Data[1][1];
        $Information = $this->Model->GetSingleSeason($SeasonID);
        $SeasonName = $Information['seasonName'][0]['season'];
        $SeasonID = $Information['seasonName'][0]['public_id'];
        $Classes = $Information['class'];
        $ClassesInfo = $this->Model->GetClasses($ClassID);
        if(!empty($SeasonID)){
            $StudentCounter = $this->Model->GetSeasonStudentCount($SeasonID);
            if(!$StudentCounter){
                $StudentCounter = "0";
            }
        }else{
            $StudentCounter = "0";
        }
        $Analytical = $this->Model->GetMonthDues($SeasonID);
        $ReturnValue = [
            'Title'=>$ClassesInfo['ClassName']." Sınıfı",
            'Seasons'=>$this->Model->GetSeason(),
            'Season'=>$SeasonName,
            'Classes'=>$Classes,
            'SeasonId'=>$SeasonID,
            'ClassName'=>$ClassesInfo['ClassName'],
            'ClassCount'=>$ClassesInfo['ClassCount'],
            'Students'=>$ClassesInfo['Students'],
            'ClassID'=>$ClassID,
            'Change'=>'add',
            'StudentCount'=>$StudentCounter,
            'Date'=>$Analytical['Date'],
            'DateCounter'=>$Analytical['Count']
        ];
        return self::View('Students.index',$ReturnValue);
    }
}
?>