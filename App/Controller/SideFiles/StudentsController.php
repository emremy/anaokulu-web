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
        echo "selam";
        // return self::View('InSideHome.index',['Title'=>'Ogrenci Takip Sistemi','Seasons'=>$this->Model->GetSeason(),'Season'=>$SeasonName,'Classes'=>$Classes,'SeasonId'=>$SeasonID]);
    }
}
?>