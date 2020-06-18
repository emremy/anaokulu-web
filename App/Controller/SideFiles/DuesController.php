<?php
require _model.'SideFiles/HomeModels.php';

use \App\Controller\Controller\MainController ;
use \App\Model\SideFiles\HomeModels\DuesModels;

class DuesController extends MainController{
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
        $this->Model = new DuesModels();
    }

    public function index($Data){
        $this->SessionChecker(true,false);
        $Season = $this->GetDataCustom($Data,['s']) == false ? '' : $this->GetDataCustom($Data,['s'])[0][1];
        
    }
}
?>