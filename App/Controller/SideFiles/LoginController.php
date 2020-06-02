<?php 

use \App\Controller\Controller\MainController ;

class LoginController extends MainController{
    /* 
        *    Kullanım öğrneği ;
        *       public function @RouterViewFunction($Data=null){
        *            return self::View('Home.index',['data'=>$Data]);
        *            // İlk değer olarak gitmek istediğin klasör yolunu belirtiyorsun. Eğer klasör içeriğine ulaşacaksan "." işaretini
        *            kullanıyorsun "klasör.renderEtmekİstediğinDosya".
        *       }
    */

    public function login(){
        $this->SessionChecker(false,true);
        return self::View('Home.homePage');
    }

    public function loginCheck($Data){
        if(!empty($Data)){
            $Data = $this->GetDataCustom($Data,'_pass');
            if(md5($Data[1]) == _pass){
                $_SESSION['result'] = 'OK';
                return http_response_code(202);
            }
        }
    }
}



?>