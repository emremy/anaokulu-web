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
            
            $Information = $this->Model->GetSingleSeason($Data[1][1]);
            $SeasonName = $Information['seasonName'][0]['season'];
        }elseif(!empty($Data) && count($Data) == 1){
            $Information = $this->Model->GetSingleSeason($Data[0][1]);
            $SeasonName = $Information['seasonName'][0]['season'];
        }
        if(empty($Student)){
            $Student = '';
            $SeasonName = '';
        }
        $ReturnValue = [
            'Title'=>"Öğrenci Kontrol Et",
            'Seasons'=>$this->Model->GetSeason(),
            'Change'=>'edit',
            'SingleStudent'=>$Student,
            'Season'=>$SeasonName
        ];
        return self::View('Student.index',$ReturnValue);
    }
}
?>