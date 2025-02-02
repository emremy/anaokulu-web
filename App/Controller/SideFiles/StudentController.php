<?php
require _model.'SideFiles/StudentModels.php';

use \App\Controller\Controller\MainController ;
use \App\Model\SideFiles\StudentModels\StudentModels;

class StudentController extends MainController{
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
        $this->Model = new StudentModels();
    }

    public function index($Data){
        $this->SessionChecker(true,false);
        if(count($Data) == 1){
            $Data = $this->GetDataCustom($Data,['se']);
        }else{
            $Data = $this->GetDataCustom($Data,['st','se','cl']);
        }
        if(!empty($Data) && count($Data) == 3){
            $Student = $this->Model->GetSingleStudent([$Data[0][1],$Data[1][1],$Data[2][1]]);
            $Analytical = $this->Model->GetMonthDues($Data[1][1]);
            $Information = $this->Model->GetSingleSeason($Data[1][1]);
            $SeasonName = $Information['seasonName'][0]['season'];

            $Dues = $this->Model->GetDues($Data[0][1],$Data[1][1]);

            $StudentCounter = $this->Model->GetSeasonStudentCount($Data[1][1]);
            if(!$StudentCounter){
                $StudentCounter = "0";
            }
            $SeasonId = $Data[1][1];
        }elseif(!empty($Data) && count($Data) == 1){
            $Information = $this->Model->GetSingleSeason($Data[0][1]);
            $SeasonName = $Information['seasonName'][0]['season'];
            $Analytical = $this->Model->GetMonthDues($Data[0][1]);
            $StudentCounter = $this->Model->GetSeasonStudentCount($Data[0][1]);
            if(!$StudentCounter){
                $StudentCounter = "0";
            }
            $SeasonId = $Data[0][1];
        }
        if(empty($Student)){
            $Student = '';
            $Dues = '';
        }
        if(empty($Data)){
            $SeasonName = '';
            $Dues = '';
            $Analytical = $this->Model->GetMonthDues('');
            $StudentCounter='0';
            $SeasonId = '';
        }


        $ReturnValue = [
            'Title'=>"Öğrenci Kontrol Et",
            'Seasons'=>$this->Model->GetSeason(),
            'Change'=>'edit',
            'SingleStudent'=>$Student,
            'Season'=>$SeasonName,
            'Dues'=>$Dues,
            'StudentCount'=>$StudentCounter,
            'Date'=>$Analytical['Date'],
            'DateCounter'=>$Analytical['Count'],
            'SeasonId' => $SeasonId
        ];
        return self::View('Student.index',$ReturnValue);
    }
}
?>