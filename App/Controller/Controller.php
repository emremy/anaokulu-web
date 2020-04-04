<?php
namespace App\Controller\Controller;

require _plugin.'Blade/lib/BladeOne.php';
//require _model.'MainModels.php';
use eftec\bladeone;
//use \App\Model\MainModel\MainModels as MainModels;

class MainController{

    public function ClearData($Data){
        for($i=0;$i<count($Data);$i++){
            $Data[$i] = htmlentities(htmlspecialchars(trim($Data[0])));
        }
        return $Data;
    }

    public function GetDataCustom($Data,$Charset){
        for($i=0;$i<count($Data);$i++) {
            foreach ($Data[$i] as $Key => $Value) {
                if ($Key == $Charset) {
                    $Array = [$Key,$Value];

                    return $this->ClearData($Array);
                }
            }
        }
    }


    public function GetUrl($Url){
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
            $link = "https";
        }else {
            $link = "http";
        }
        $link .= $_SERVER['HTTP_HOST'];
        $link .= $_SERVER['REQUEST_URI'];

        $link .= $Url;
        echo $link;
    }

    public function Redirect($Url,$StatuscCode){
        header('Location: '.$Url,true,$StatusCode);
        die();
    }

    public function SessionChecker($Login=true,$Return=true,$Redirect=true){
        if($Redirect == false){
            return false;
        }
        if(empty($_SESSION)){
            if($Login == false){
                return false;
            }
            return $this->Redirect('/login',302);
        }else{
            if($Return == false){
                return false;
            }
            return $this->Redirect('/',200);
        }
    }

    public function View($Path,$Data=null){
        $ViewFile = _view;
        $CompiledFolder = _core.'/Cache';
        $Blade = new bladeone\BladeOne($ViewFile,$CompiledFolder);
        if($Data == null){
            echo $Blade->run($Path);
        }else{
            echo $Blade->run($Path, $Data);
        }

    }

}



?>