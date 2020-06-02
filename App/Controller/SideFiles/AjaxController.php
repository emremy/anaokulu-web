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
        $Data = $this->GetDataCustom($Data,'seasonName');
        $Season = $Data[1];
        $Result = $this->Model->SeasonAdd($Season);
        if($Result){
            return http_response_code(202);
        }else{
            return http_response_code(204);
        }
    }
}