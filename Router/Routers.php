<?php 
namespace Router\Routers;


use \App\Controller\Controller;

class Routers {
    public static $MyList = array();

    public static function Router($Path=null,$Controller=null){
        if($Path == '' || $Controller == ''){
            return false;
        }else{
            $MyArray = array($Path => $Controller);
            array_push(self::$MyList,$MyArray);
        }
    }

    public static function ErrorPage($Result=[]){
        if(!$Result['Result']){
            $MainController = new Controller\MainController();
            http_response_code($Result['HttpCode']);
            return $MainController->View('Error.index',$Result);
        }
    }
    public static function Get($URL,$Data=[]){
        require _controller.'Controller.php';
        $PageResult = false;
        for($i=0; $i<count(self::$MyList); $i++){
            if(array_key_exists($URL,self::$MyList[$i])){
                $ArrayController = explode('|',self::$MyList[$i][$URL]);
                $Controller = $ArrayController[0];
                $Function = $ArrayController[1];
                
                $ControllerFile = _controller.'SideFiles/'.$Controller.'Controller.php';

                if(!file_exists($ControllerFile)){
                    $Result = ['Result'=>false,'Message'=>'"'.$Controller.'" controller bulunamadı','Title'=>'404','HttpCode'=>'404'];
                    return self::ErrorPage($Result);
                }

                require $ControllerFile;
                $GetControllerName = $Controller.'Controller';



                $Class = new $GetControllerName();

                if(!method_exists($Class,$Function)){
                    $Result = ['Result'=>false,'Message'=>'Tanımlanmamış fonksiyon {'.$Function.'}','Title'=>'417','HttpCode'=>'417'];
                    return self::ErrorPage($Result);
                }
                
                $Class->$Function($Data);
                $PageResult = true;
            }
        }
        if(!$PageResult){
            $Result = ['Result'=>$PageResult,'Message'=>'Böyle bir sayfa yok','Title'=>'404','HttpCode'=>'404'];
            return self::ErrorPage($Result);
        }
    }

}


?>