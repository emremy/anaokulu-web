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

        // $ReturnValue = [
        //     'Title'=>$ClassesInfo['ClassName']." Sınıfı",
        //     'Seasons'=>$this->Model->GetSeason(),
        //     'Season'=>$SeasonName,
        //     'Classes'=>$Classes,
        //     'SeasonId'=>$SeasonID,
        //     'ClassName'=>$ClassesInfo['ClassName'],
        //     'ClassCount'=>$ClassesInfo['ClassCount'],
        //     'Students'=>$ClassesInfo['Students'],
        //     'Change'=>'add'
        // ];
        return self::View('Student.index');
    }
}
?>