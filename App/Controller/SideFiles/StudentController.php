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
        $Data = $this->GetDataCustom($Data,['st','se','cl']);
        if(!empty($Data)){
            $Student = $this->Model->GetSingleStudent([$Data[0][1],$Data[1][1],$Data[2][1]]);

        }else{
            $Student = '';
        }
        
        $ReturnValue = [
            'Title'=>"Öğrenci Kontrol Et",
            'Seasons'=>$this->Model->GetSeason(),
            'Change'=>'edit',
            'SingleStudent'=>$Student
        ];
        return self::View('Student.index',$ReturnValue);
    }
}
?>