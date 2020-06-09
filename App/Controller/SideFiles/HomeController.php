<?php
require _model.'SideFiles/HomeModels.php';

use \App\Controller\Controller\MainController ;
use \App\Model\SideFiles\HomeModels\HomeModels;

class HomeController extends MainController{
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
        $this->Model = new HomeModels();
    }

    public function index($Data){
        $this->SessionChecker(true,false);
        $Season = $this->GetDataCustom($Data,['s']) == false ? '' : $this->GetDataCustom($Data,['s'])[0][1];
        $Information = $this->Model->GetSingleSeason($Season);

        $SeasonName = $Information['seasonName'][0]['season'];
        $SeasonID = $Information['seasonName'][0]['public_id'];
        $Classes = $Information['class'];
        return self::View('InSideHome.index',['Title'=>'Ogrenci Takip Sistemi','Seasons'=>$this->Model->GetSeason(),'Season'=>$SeasonName,'Classes'=>$Classes,'SeasonId'=>$SeasonID]);
    }
}
?>