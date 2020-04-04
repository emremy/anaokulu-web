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
        return self::View('InSideHome.index',['Title'=>'Ogrenci Takip Sistemi','Seasons'=>['2019/2020'=>'4312443','2020/2021'=>'43153613']]);
    }

    public function login(){
        $this->SessionChecker(false,true);
        return self::View('Home.homePage');
    }

    public function loginCheck($Data){
        $Data = $this->GetDataCustom($Data,'_password');
        if(md5($Data[1]) == _pass){
            $_SESSION[$Data[0]] = md5($Data[1]);
            echo json_encode($_SESSION);
            return $_SESSION;
        }
    }
}
?>